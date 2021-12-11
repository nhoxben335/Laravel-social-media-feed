<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    // establish relationship with other Model
    protected $guarded = [];

    public function user(){
        return $this->belongsToMany('App\User');
    }
}
