<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    public $timestamps = false;
    protected $table = 'tbl_brand';
    protected $primaryKey = 'brand_id';
    protected $fillable =[
        'brand_name','brand_slug','brand_desc','brand_status','created_at','updated_at'
    ];
    public function Products() {
        return $this->hasMany('App\Product');
    }
}
