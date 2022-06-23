<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    public $timestamp = false;
    protected $fillable = [
        'name_city','type'
    ];
}
