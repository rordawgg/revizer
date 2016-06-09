<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Query extends Model
{
	public $keyword;
    public $model;
    public $results = [];
    public $where = [];
    private $result;

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
    * Set a where condition for the model being queried.
    */
    public function cond($field, $operator, $value)
    {
        $this->result = $this->model->where($field, $operator, $value);
        return $this;
    }

    /**
     *  Search model and its fields with keyword.
     */
    public function search()
    {
        $this->setResult();

        $this->result = $this->result->where(function ($query) {
            foreach ($this->fields as $field) {
                $query->orWhere($field, "LIKE", "%$this->keyword%");
            }
        });

        $result = $this->result->get();

        $this->result = null;

    	return count($result) > 0 ? $result : null;
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

    /**
    * Set result prop if not set.
    */
    private function setResult()
    {
        if (isset($this->result)) {
            return;
        }

        $this->result = $this->model;

        return $this->result;
    }
}
