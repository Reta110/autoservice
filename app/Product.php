<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['code', 'name', 'cost', 'price', 'stock','brand','model','category_id','tags'];


    public function orders()
    {
        return $this->belongsToMany('App\Order');
    }

    public function category()
    {
        return $this->belongsTo('App\ProductCategory');
    }
}
