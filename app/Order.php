<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['title', 'user_id', 'vehicle_id', 'total_cost', 'hh', 'discount', 'neto', 'iva', 'total', 'status', 'observations', 'ot_observations', 'paid', 'type_pay', 'pay_observations', 'pay_fees_quantity', 'km', 'start_date', 'ended_date'];


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
        return $this->belongsToMany('App\Service')->withPivot('hh');
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

    public function getEndedDateAtAttribute($date)
    {
        return $date = \Carbon\Carbon::parse($date)->format('d-m-Y');
    }

    public function scopeEndedPaid($query)
    {
        return $query->where('status', 'ended')
            ->where('paid', 'si')
            ->where('pay_fees_quantity', '>', '0')
            ->orderBy('ended_date', 'DESC');
    }
}
