<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Animal extends Model
{
	//todo add protected fillables
	protected $fillable = ['name','date_of_birth', 'description'];
    //
}
