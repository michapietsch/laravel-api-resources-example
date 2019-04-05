<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Flight extends Model
{
    public function passengers()
    {
        return $this->hasMany(Passenger::class);
    }
}
