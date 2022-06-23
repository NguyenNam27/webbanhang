<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    public $timestamp = false;
    protected $fillable = [
        'name_quanhuyen','type','matp'
    ];
}
