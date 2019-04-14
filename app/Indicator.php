<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Indicator extends Model
{
    public function user()
    {
        return $this->belongsTo('App\Station');
    }
}
