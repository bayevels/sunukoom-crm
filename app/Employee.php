<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    public function point()
    {
        return $this->belongsTo('App\Point');
    }
}
