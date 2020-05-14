<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

use Goutte\Client;

use App\Product;
use App\Price;

class ProductsController extends Controller {
  public function loadAll() {
    $products = Product::all();
    return view('list', ['products' => $products]);
  }

  public function getProduct($productId, Request $req) {
    $product = Product::find($productId);
    // dd($product);
    return view('detail', ['product' => $product, 'prices' => $product->prices]);
  }

  private function getApi($productId) {
    $resp = Http::get("https://fabelio.com/insider/data/product/id/{$productId}");
    $resp = $resp->json()['product'];
    return $resp;
  }

  private function addNewPrice($product, $unitPrice, $unitSalePrice) {
    $price = new Price([
      'unit_price' => $unitPrice,
      'unit_sale_price' => $unitSalePrice
    ]);
    $product->prices()->save($price);
  }

  public function getUpdate($id = null) {
    if (!$id) {
      $products = Product::all();
      foreach($products as $product) {
        $resp = $this->getApi($product->product_id);
        $this->addNewPrice($product, $resp['unit_price'], $resp['unit_sale_price']);
      }
    } else {
      $product = Product::find($id);
      if ($product) {
        $resp = $this->getApi($product->product_id);
        $this->addNewPrice($product, $resp['unit_price'], $resp['unit_sale_price']);
      }
    }
    return json_encode(["OK"]);
  }

  public function list(Request $req) {
    $req = $req->input('url');
    try {
      $client = new Client();
      $crawler = $client->request('GET', $req);
      // $html = file_get_contents($req);
      // preg_match('/<input type="hidden"[^>]*value=[\'"]([^\'"]+)[\'"][^>]*>/i', $html, $matches);
      $productId = $crawler->filter('#productId')->attr('value');
      // dd($productId);
      // $productId = $matches[1];
      // preg_match('/<div id="description"><p>(.|\s)*<\/p>/i', $html, $matches);
      // $desc = strip_tags($matches[0]);
      $desc = $crawler->filter('#description p')->each(function ($node) {
        return $node->text();
      });
      $desc = implode(" ", $desc);
      if ($productId && !empty($productId)) {
        $resp = $this->getApi($productId);
        $product = Product::where('product_id', $productId)->first();
        // dd($product);
        if (!$product) {
          $product = Product::create([
            'product_id' => $productId,
            'product_url' => $resp['url'],
            'product_name' => $resp['name'],
            'description' => $desc,
            'imageUrl' => $resp['product_image_url']
          ]);
          $this->addNewPrice($product, $resp['unit_price'], $resp['unit_sale_price']);
        }
      }
    } catch (Exception $e) {

    }
    return redirect('/list');
  }
}
