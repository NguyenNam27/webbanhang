<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    public $timestamps = false;
    protected $table = 'tbl_contacts';
    protected $fillable = ['name','phone','email','content','create_at'];
}
