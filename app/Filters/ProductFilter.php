<?php

namespace App\Filters;


use JetBrains\PhpStorm\ArrayShape;

class ProductFilter extends QueryFilter
{
    /**
     * @return string[]
     */
    #[ArrayShape(['title' => "string"])]
    public function rules(): array
    {
        return [
            'title' => ''
        ];
    }


    public function filterByTitle($query, $title)
    {
        return $query->where('title', 'like', "%$title%");
    }
}
