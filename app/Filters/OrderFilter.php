<?php

namespace App\Filters;

use Illuminate\Database\Eloquent\Builder;


class OrderFilter extends QueryFilter
{
    /**
     * @return string[]
     */
    public function rules(): array
    {
        return [
            'status' => '',
            'id' => '',
            'email' => '',
            'created_at' => '',
            'updated_at' => '',
        ];
    }


    public function filterByStatus($query, $status)
    {
        return $query->where('status', $status);
    }


    public function filterById($query, $id)
    {
        return $query->where('id', $id);
    }


    public function filterByEmail($query, $email)
    {
        return $query->whereHas('user', function (Builder $query) use ($email) {

            return $query->where('email', 'like', "%$email%");
        });
    }


    public function filterByCreatedAt($query, $created_at)
    {
        return $query->whereDate('created_at',$created_at);
    }


    public function filterByUpdatedAt($query, $updated_at)
    {
        return $query->whereDate('updated_at',$updated_at);
    }
}
