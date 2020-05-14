<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Price extends Model {
  protected $table = "prices";
  protected $fillable = ['product_id', 'unit_price', 'unit_sale_price'];

  public function product() {
    return $this->belongsTo('App\Product');
  }
}
