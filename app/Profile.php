<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
	protected $fillable = [
		"username",
		"first_name",
		"last_name",
		"avatar"
	];

	/**
	 * @return current user.
	 */
    public function user()
    {
    	return $this->hasOne("App\User");
    }
}
