<?php

namespace App\Filters;

use JetBrains\PhpStorm\ArrayShape;


class OrderFilter extends QueryFilter
{
    /**
     * @return string[]
     */
    #[ArrayShape(['status' => "string"])]
    public function rules(): array
    {
        return [
            'status' => ''
        ];
    }


    public function filterByStatus($query, $status)
    {
        return $query->where('status', "$status");
    }
}
