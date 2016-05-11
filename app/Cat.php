<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cat extends Model
{
	protected $fillable = ['name'];
	
    public function docs()
    {
    	return $this->hasMany('App\Doc');
    }
}
