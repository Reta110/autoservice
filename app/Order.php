<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['title', 'user_id', 'vehicle_id', 'total_cost','neto', 'iva', 'total', 'status', 'start_date', 'ended_date'];


    public function products()
    {
        return $this->belongsToMany('App\Product')->withPivot('price', 'quantity');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function services()
    {
        return $this->belongsToMany('App\Service');
    }

    public function vehicle()
    {
        return $this->belongsTo('App\Vehicle');
    }

    public function getStartDateAttribute($date)
    {
        return $date = \Carbon\Carbon::parse($date)->format('d-m-Y');
    }

    public function getCreatedAtAttribute($date)
    {
        return $date = \Carbon\Carbon::parse($date)->format('d-m-Y');
    }
}
