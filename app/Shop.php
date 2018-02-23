<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    protected $table = 'shop';

    protected $fillable = [
      'fc_id', 'name', 'post', 'address', 'detail', 'telephone', 'train_station'
    ];

    public function studios()
    {
      return $this->hasMany(
        'App\Studio',
        'store_id'
      );
    }

    public function honnbu()
    {
      return $this->belongsTo('App\Honnbu', 'fc_id');
    }
}
