<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model {
  protected $table = "products";
  protected $fillable = ['product_id', 'product_name', 'description', 'product_url', 'imageUrl', 'description', 'unit_price', 'unit_sale_price'];

  public function prices() {
    return $this->hasMany('App\Price');
  }
}
