<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = ['code', 'name', 'hh', 'description'];

    public function orders()
    {
        return $this->belongsToMany('App\Order');
    }

}
