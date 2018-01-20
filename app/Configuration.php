<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Configuration extends Model
{
    protected $fillable = ['price_hh', 'iva','comision_tdd','comision_tdc', 'text_email_order','text_email_notification'];

}
