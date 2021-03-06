<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    public $timestamps = false; //set time to false
    protected $table = 'tbl_slider';
    protected $primaryKey = "slider_id";
    protected $fillable = [
    	'slider_name', 'slider_image','slider_status','slider_desc'
    ];
}
