<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stand extends Model
{
    public function provider()
    {
        return $this->belongsTo('App\Provider');
    }
    public function event()
    {
        return $this->belongsTo('App\Event');
    }
}
