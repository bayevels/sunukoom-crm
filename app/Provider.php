<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Provider extends Model
{
    protected $fillable = [
        'user_id','company',
    ];
    
     public function stands()
     {
         return $this->hasMany('App\Stand');
     }

     public function user(){
        return $this->belongsTo('App\User');
     }
}
