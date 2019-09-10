<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserDepartments extends Model
{
    function users(){
        return $this->hasMany(User::class);
    }
}
