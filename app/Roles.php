<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Roles extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'name'
    ];
    public function admin(){
        return $this->belongsTo('App\Admin');
    }
}
