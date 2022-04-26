<?php

namespace App\Filters;

use JetBrains\PhpStorm\ArrayShape;


class CategoryFilter extends QueryFilter
{
    /**
     * @return string[]
     */
    #[ArrayShape(['name' => "string"])]
    public function rules(): array
    {
        return [
            'name' => ''
        ];
    }


    public function filterByName($query, $name)
    {
        return $query->where('name', 'like', "%$name%");
    }
}
