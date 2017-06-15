<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['title','user_id', 'vehicle_id', 'total_cost', 'iva', 'total','status','start_date','ended_date'];


    public function products()
    {
        return $this->belongsToMany('App\Product');
    }

    public function users()
    {
        return $this->belongsTo('App\User');
    }

    public function services()
    {
        return $this->belongsToMany('App\Service');
    }
}