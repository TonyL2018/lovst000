<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'product';

    public function prices()
    {
      return $this->hasMany('App\Price', 'product_id', 'product_id');
    }

    protected $fillable = [
      'productId',
      'categoryId',
      'productCode',
      'productName',
      'productKana',
      'price',
      'size',
    ];
}
