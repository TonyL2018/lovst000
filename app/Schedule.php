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
      'coma_11',
      'coma_12',
      'coma_13',
      'coma_14',
      'coma_15',
      'coma_16',
      'coma_17',
      'coma_18',
      'coma_19',
      'coma_20',
    ];

    public function studio()
    {
      return $this->belongsTo('App\Studio', 'studio_id');
    }
}
