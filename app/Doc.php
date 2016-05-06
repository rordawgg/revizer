<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Revision;

class Doc extends Model
{
    protected $fillable = [
    	// "body",
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
        return Revision::where("doc_id", "=", $this->id)
                                            ->where("accepted", "=", 1)
                                            ->orderBy("created_at", "DESC")
                                            ->first();
    }     

    public function scopeSearchByKeyword($query, $keyword)
    {
        if ($keyword!='') {
            $query->where(function ($query) use ($keyword) {
                $query->where("title", "LIKE","%$keyword%")
                    ->orWhere("criteria", "LIKE", "%$keyword%")
                    ->orWhere("description", "LIKE", "%$keyword%");
            });
        }
        return $query;
    }

    public function removeUnaccepted()
    {
        $this->revisions()->where("accepted", "!=", 1)->where("id", "!=", $this->id)->delete();
    }

    public function category()
    {
        return $this->belongsTo("App\Category");
    }
}
