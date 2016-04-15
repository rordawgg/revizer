<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Doc extends Model
{
    protected $fillable = [
    	"body",
    	"title",
    	"description",
    	"criteria"
    ];

    public function user()
    {
    	return $this->belongsTo("App\User");
    }
}
