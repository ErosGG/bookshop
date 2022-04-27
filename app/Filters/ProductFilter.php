<?php

namespace App\Filters;


class ProductFilter extends QueryFilter
{
    /**
     * @return string[]
     */
    public function rules(): array
    {
        return [
            'title' => '',
            'author' => '',
            'year' => ''
        ];
    }


    public function filterByTitle($query, $title)
    {
        return $query->where('title', 'like', "%$title%");
    }


    public function filterByAuthor($query, $author)
    {
        return $query->where('author', 'like', "%$author%");
    }


    public function filterByYear($query, $year)
    {
        return $query->where('year', 'like', "%$year%");
    }
}
