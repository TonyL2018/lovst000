<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Template extends Model
{
    protected $table = 'email_template';

    protected $fillable = [
      'name', 'title', 'content', 'status', 'owner_id',
    ];

    public function _status()
    {
      return $this->belongsTo('App\Status', 'status');
    }

    public function owner()
    {
      return $this->belongsTo('App\User', 'owner_id');
    }
}
