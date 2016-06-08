<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * @return Doc's of the current User.
     */
    public function docs()
    {
        return $this->hasMany("App\Doc")->orderBy('updated_at', 'desc');
    }

    /**
     * @return Profile of the current User.
     */
    public function profile()
    {
        return $this->hasOne("App\Profile");
    }
}
