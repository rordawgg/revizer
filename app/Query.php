<?php

namespace App;

use DB;

class Query
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

    public function where($field, $operator, $value)
    {
        $this->where[] = [
            "field" => $field,
            "operator" => $operator,
            "value" => $value
        ];

        return $this;
    }

    /**
     *  Search model and its fields with keyword.
     */
    public function search()
    {
        $this->result = $this->model;

        $this->result = $this->result->where(function ($query) {
            foreach ($this->fields as $field) {
                $query->orWhere($field, "LIKE", "%$this->keyword%");
            }
        });

        $this->handleWhere();

        $result = $this->result->get();
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

    private function handleWhere()
    {
        if (count($this->where) !== 0) {
            foreach ($this->where as $cond) {
                $this->result->where($cond["field"], $cond["operator"], $cond["value"]);
            }
        }

        $this->where = [];

        return $this->result;
    }
}
