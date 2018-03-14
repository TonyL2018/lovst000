<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Occupation extends Model
{
    protected $table = 'occupation';

    protected $fillable = [
      'name', 'delete_flg',
    ];

    public static function available()
    {
      return Occupation::where('delete_flg', '!=', 1)->get();
    }
}
