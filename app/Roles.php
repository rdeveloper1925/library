<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Roles extends Model
{
    function users(){
        $this->hasMany(User::class);
    }
}
