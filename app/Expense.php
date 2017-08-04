<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    protected $fillable = ['name', 'quantity', 'total', 'category','date'];

    public function getDateAttribute($date)
    {
        return $date = \Carbon\Carbon::parse($date)->format('d-m-Y');
    }

    public function setDateAttribute($date)
    {
        $this->attributes['date'] = \Carbon\Carbon::parse($date)->format('Y-m-d');
    }
}
