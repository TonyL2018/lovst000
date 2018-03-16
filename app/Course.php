<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $table = 'course';

    protected $fillable = [
      'name', 'new_flg', 'owner_id'
    ];

    public function creator()
    {
      return $this->belongsTo('App\User', 'owner_id');
    }

    public function questions()
    {
      return $this->hasMany('App\Question', 'course_id')->where('delete_flg', '!=', 1);
    }

}
