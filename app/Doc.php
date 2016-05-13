<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Doc extends Model
{
    protected $fillable = [
    	"title",
    	"description",
    	"criteria"
    ];

    public function user()
    {
    	return $this->belongsTo("App\User");
    }

    public function revisions()
    {
        return $this->hasMany("App\Revision");
    }

    public function hasAcceptedRevision()
    {
        return $this->revisions()->where("doc_id", "=", $this->id)
                                            ->where("accepted", "=", 1)
                                            ->orderBy("created_at", "DESC")
                                            ->first();
    }     

    public function removeUnaccepted()
    {
        $this->revisions()->where("accepted", "!=", 1)->where("id", "!=", $this->id)->delete();
    }

    public function cat()
    {
        return $this->belongsTo("App\Cat");
    }
}
