<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudioCourse extends Model
{
    protected $table = 'studio_course';

    protected $fillable = ['studio_id', 'course_id', 'sort_num'];

    public function course()
    {
      return $this->belongsTo('App\Course', 'course_id');
    }
}
