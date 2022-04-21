<?php

namespace App\Models;

use App\Filters\ProductFilter;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class Product extends Model
{
    use HasFactory;


    protected $fillable = [
        'category_id',
        'title',
        'slug',
        'author',
        'price',
        'stock',
        'highlighted',
        'year',
        'publisher',
        'place',
        'isbn',
        'series',
        'image',
        'description',
    ];

    protected $casts = [
        'highlighted' => 'bool',
    ];


    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }


    public function scopeFilterBy(Builder $query, ProductFilter $filter)
    {
        $fields = ['title'];

        $data = request()->only($fields);

        return $filter->applyTo($query, $data);
    }
}
