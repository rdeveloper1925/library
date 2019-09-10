<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Books extends Model
{
    function departments(){
        return $this->belongsTo('App\Departments');
    }
}
