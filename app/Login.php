<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Login extends Model
{
    public $timestamp = false;
    protected $fillable = [
        'admin_email','admin_password','admin_name','admin_phone'
    ];
}
