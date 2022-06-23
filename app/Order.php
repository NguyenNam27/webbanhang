<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public $timestamp = false;
    protected $fillable = [
        'customer_id','shipping_id','order_status','order_code'
    ];
    public function product(){
        return $this->belongsToMany('App\Product');
    }
}
