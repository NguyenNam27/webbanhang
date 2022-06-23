<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    public $timestamp = false;
    protected $fillable = [
        'customer_name','customer_email','customer_password','customer_phone'
    ];
}
