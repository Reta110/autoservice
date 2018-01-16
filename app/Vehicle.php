<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{

    protected $fillable = ['brand', 'model', 'vin', 'year','motor','patente','user_id','km'];

    public function users()
    {
        return $this->belongsTo('App\User');
    }

    public function orderS()
    {
        return $this->hasMany('App\Order');

    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function owner()
    {
        return $this->user->name . ' ' . $this->user->last_name;

    }

}
