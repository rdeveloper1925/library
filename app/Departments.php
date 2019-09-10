<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Departments extends Model
{
    function books(){
        return $this->hasMany('App\Books');
    }
}
