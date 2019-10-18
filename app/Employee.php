<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = [
        'user_id','job','point_id'
    ];
    public function point()
    {
        return $this->belongsTo('App\Point');
    }
    public function user(){
        return $this->belongsTo('App\User');
    }
}
