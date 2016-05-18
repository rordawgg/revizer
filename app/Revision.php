<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Revision extends Model
{
    protected $fillable = [
    	"body",
    	"description"
    ];

    public function doc()
    {
    	return $this->belongsTo("App\Doc");
    }
}
