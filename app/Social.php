<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Social extends Model
{
    public $timestamps = false;
    protected $fillable = [
          'provider_user_id',  'provider',  'user'
    ];
}
