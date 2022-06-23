<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public $timestamp = false;
    protected $table = 'tbl_product';
    protected $primaryKey = 'product_id';
    protected $fillable = [
            'product_name','product_quantity','product_slug','category_id','brand_id','product_desc','product_content',
        'product_price','product_image','product_status',
    ];

    public function category(){
        return $this->belongsTo('App\CategoryProduct','category_id');
    }
    public function Brand(){
        return $this->belongsTo('App\Brand','brand_id');
    }

    public function Order(){
        return $this->belongsToMany('App\Order','App\OrderDetails','product_id','order_code');
    }
}
