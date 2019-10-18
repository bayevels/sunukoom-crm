<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Point extends Model
{
    public function employees(){
            return $this->hasMany('App\Employee');
    }
}
