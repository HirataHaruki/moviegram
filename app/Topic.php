<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    protected $fillable = [
    	'user_id',
    	'title',
    	'content',
    	'grade',
    	'impression',
    ];
}
