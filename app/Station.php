<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Station extends Model
{
    public function indicators()
    {
        return $this->hasMany('App\Indicator');
    }
}
