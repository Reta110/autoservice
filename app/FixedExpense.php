<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FixedExpense extends Model
{
    protected $table = 'fixed_expenses';
    protected $fillable = ['name', 'total', 'category','date'];

    public function getDateAttribute($date)
    {
        return $date = \Carbon\Carbon::parse($date)->format('d-m-Y');
    }

    public function setDateAttribute($date)
    {
        $this->attributes['date'] = \Carbon\Carbon::parse($date)->format('Y-m-d');
    }
}
