<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class   CategoryProduct extends Model
{
    public $timestamps = false;
    protected $table = 'tbl_category_product';
    protected $primaryKey = 'category_id';
    protected $fillable =[
        'meta_keywords','category_name','slug_category_product','category_desc','category_status'
    ];

     public function Product()
    {

        return $this->hasMany('App\Product');
    }
}
