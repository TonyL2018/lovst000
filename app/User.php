<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Notifications\ResetPasswordNotification as RestPasswordNotification;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use Notifiable;
    use HasRoles;

    public static $rules = array(

        'name'=>'required|alpha|min:2',

        'password'=>'required|alpha_num|between:6,12'

    );

    protected $table = 'user';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'staff_id', 'last_name_kanji', 'first_name_kanji', 'last_name_kana', 'first_name_kana', 'fc_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        //'password',
        'remember_token',
    ];

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new RestPasswordNotification($token));
    }

    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = bcrypt($password);
    }

    public function honnbu()
    {
      return $this->belongsTo('App\Honnbu', 'fc_id');
    }

    public function shop()
    {
      return $this->belongsTo('App\Shop', 'store_id');
    }

}
