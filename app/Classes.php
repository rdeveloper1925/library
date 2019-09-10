<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Classes extends Model
{
    function users(){
        return $this->hasMany(User::class);
    }
}
