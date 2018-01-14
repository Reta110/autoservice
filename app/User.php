<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name','last_name','rut','phone','address', 'email', 'password','role',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function orders()
    {
        return $this->hasMany('App\Order');
    }

    public function vehicles()
    {
        return $this->hasMany('App\Vehicle');
    }

    public function getFullNameAttribute($date)
    {
        return $this->name.' '.$this->last_name;
    }

    public function isAdmin()
    {
        return $this->role == 'admin';
    }
}
