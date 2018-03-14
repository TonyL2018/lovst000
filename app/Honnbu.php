<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Honnbu extends Model
{
    protected $table = "fc_honnbu";

    protected $fillable = [
        'name', 'detail', 'start_date', 'duration', 'corporation', 'representative', 'signer',
        'capital', 'tele_kaisya', 'tele_kojin', 'adress', 'detail'
    ];

    public function studios()
    {
        return $this->hasManyThrough(
            'App\Shop',
            'App\Studio',
            'store_id',
            'fc_id',
            'id',
            'id'
        )->where('delete_flg','!=', 1);
    }

    public function shops()
    {
        return $this->hasMany(
            'App\Shop',
            'fc_id'
        )->where('delete_flg','!=', 1);
    }

    public static function available()
    {
      return Honnbu::where('delete_flg', '!=', 1)->get();
    }

}
