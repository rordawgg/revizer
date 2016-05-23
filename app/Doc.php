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

    /**
     * @return current doc's related user
     */
    public function user()
    {
    	return $this->belongsTo("App\User");
    }

    /**
     * @return current Doc's related revisions
     */
    public function revisions()
    {
        return $this->hasMany("App\Revision")->orderBy('updated_at', 'desc');
    }

    /**
     * @return a accepted revision on current Doc.
     */
    public function hasAcceptedRevision()
    {
        return $this->revisions()->where("doc_id", "=", $this->id)
                                            ->where("accepted", "=", 1)
                                            ->orderBy("created_at", "DESC")
                                            ->first();
    }     

    /**
     * @return remove unaccepted revisions on current Doc
     */
    public function removeUnaccepted()
    {
        $this->revisions()->where("accepted", "!=", 1)->where("id", "!=", $this->id)->delete();
    }

    /**
     * @return current documents category
     */
    public function cat()
    {
        return $this->belongsTo("App\Cat");
    }
}
