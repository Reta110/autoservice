<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{

    protected $fillable = ['brand', 'model', 'vin', 'year','motor','patente'];

    public function users()
    {
        return $this->belongsTo('App\User');
    }
}
