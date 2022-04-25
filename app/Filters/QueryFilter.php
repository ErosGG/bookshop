<?php

namespace App\Filters;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;


abstract class QueryFilter
{
    protected $valid;


    abstract public function rules(): array;


    public function applyTo($query, array $fields)
    {
        $rules  = $this->rules();

        $validator = Validator::make(array_intersect_key($fields, $rules), $rules);

        $this->valid = $validator->validated();

        foreach ($this->valid as $key => $value) {

            $query = $this->applyFilter($query, $key, $value);
        }

        return $query;
    }


    public function applyFilter($query, $name, $value)
    {
        $method = 'filterBy' . Str::studly($name);

        if (method_exists($this, $method)) {

            return $this->$method($query, $value);
        }

        return $query->where($name, $value);
    }


    public function valid()
    {
        return $this->valid;
    }
}
