<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    public function events()
    {

      return $this->hasMany(Event::class);

    }
}
