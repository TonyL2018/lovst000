<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $table = 'course_question';

    protected $fillable = [
      'course_id', 'question_name', 'question_subtext', 'new_flg'
    ];
}
