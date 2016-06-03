<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Revision extends Model
{
    protected $fillable = [
    	"body",
    	"description"
    ];

    /**
     * @return the related document to the current revision.
     */
    public function doc()
    {
    	return $this->belongsTo("App\Doc");
    }

    public function user()
    {
        return $this->belongsTo("App\User");
    }
}
