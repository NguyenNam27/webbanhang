<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Freeship extends Model
{
    public $timestamp = false;
    protected $fillable = [
        'fee_matp','fee_maqh','fee_xaid','fee_feeship'
    ];
}
