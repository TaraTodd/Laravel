<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    //query scopes

    public function scopeIncomplete($query)

    //basic query wrapping it in a method //Task::incomplete()

    {

    	return $query->where('completed', 0);

    }
}
