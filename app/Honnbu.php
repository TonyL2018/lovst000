<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Honnbu extends Model
{
    protected $table = "fc_honnbu";

    protected $fillable = [
        'name', 'detail', 'start_date', 'corporation', 'representative', 'capital', 'tele_kaisya', 'tele_kojin', 'adress', 'detail'
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
        );
    }

    public function shops()
    {
        return $this->hasMany(
            'App\Shop',
            'fc_id'
        );
    }

}
