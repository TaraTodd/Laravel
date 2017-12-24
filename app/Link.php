<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
    //allow our model assign values to these fields
    
    protected $fillable = [
        'title',
        'url',
        'description'
    ];
}
