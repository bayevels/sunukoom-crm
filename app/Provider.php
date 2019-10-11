<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Provider extends Model
{
     public function stands()
     {
         return $this->hasMany('App\Stand');
     }
}
