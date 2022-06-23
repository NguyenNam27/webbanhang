<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderDetails extends Model
{
    public $timestamp = false;
    protected $fillable = [
        'order_code','product_id','product_name','product_price','product_sales_quantity','product_coupon',
        'product_feeship','created_at'
    ];
}
