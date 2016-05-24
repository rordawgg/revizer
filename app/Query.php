<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Query extends Model
{
	public $keyword;
    public $model;
    public $results = [];

	public function __construct($keyword)
	{
		$this->keyword = $keyword;
	}

    /**
     * Set model to query.
     */
    public function in($model)
    {
        $this->model = $model;
        return $this;
    }

    /**
     * Set fields to query.
     */
    public function fields($fields)
    {
        $this->fields = $fields;
        return $this;
    }

    /**
     *  Search model and its fields with keyword.
     */
    public function search()
    {
        $result = $this->model;

    	foreach ($this->fields as $field) {
    		$result = $result->orWhere($field, "LIKE", "%$this->keyword%");
    	}

    	return count($result->get()) > 0 ? $result->get() : null;
    }

    /**
     * Search and set result as element of results property.
     */
    public function searchKeep($name)
    {
        $result = $this->search();

        if (!is_null($result)) {
            $this->results[$name] = $result;
        }

        return $this->results;
    }
}
