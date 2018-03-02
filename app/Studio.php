<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Studio extends Model
{
    protected $table = "studio";

    protected $fillable = [
      'name', 'detail', 'store_id'
    ];

    public function schedules()
    {
      return $this->hasMany('App\Schedule', 'studio_id', 'id');
    }
}
