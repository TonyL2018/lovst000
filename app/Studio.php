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
      return $this->hasMany('App\Schedule', 'studio_id', 'id')->orderBy('id');
    }

    public function shop()
    {
      return $this->belongsTo('App\Shop', 'store_id');
    }

    public function courses()
    {
      return $this->hasMany('App\StudioCourse', 'studio_id')->where('delete_flg', '!=', 1);
    }
}
