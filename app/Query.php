<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Query extends Model
{
	public $keyword;

	public function __construct($keyword)
	{
		$this->keyword = $keyword;
	}

    /**
     *  Search each model and fields with keyword.
     */
    public function searchByKeyword($model, $fields)
    {
    	foreach ($fields as $field) {
    		$model = $model->orWhere($field, "LIKE", "%$this->keyword%");
    	}
            
    	return count($model->get()) > 0 ? $model->get() : null;
    }
}
