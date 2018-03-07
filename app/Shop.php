<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    protected $table = 'shop';

    protected $fillable = [
      'fc_id', 'name', 'post', 'address', 'route', 'detail', 'telephone', 'email', 'train_station'
    ];

    public function studios()
    {
      return $this->hasMany(
        'App\Studio',
        'store_id'
      )->where('delete_flg','!=', 1);
    }

    public function honnbu()
    {
      return $this->belongsTo('App\Honnbu', 'fc_id')->where('delete_flg','!=', 1);
    }
}
