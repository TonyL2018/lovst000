<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    protected $table = "studio_schedule";

    protected $fillable = [
      'studio_id',
      'start_date',
      'end_date',
      'coma_1',
      'coma_2',
      'coma_3',
      'coma_4',
      'coma_5',
      'coma_6',
      'coma_7',
      'coma_8',
      'coma_9',
      'coma_10',
    ];
}
