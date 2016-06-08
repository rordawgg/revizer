<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cat extends Model
{
	protected $fillable = ["name"];
	
	/**
	 * Get all docs on the current category
	 */
    public function docs()
    {
    	return $this->hasMany("App\Doc")->orderBy('updated_at', 'desc');
    }
}
