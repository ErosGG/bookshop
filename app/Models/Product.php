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


    /**
     * @var string[]
     */
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


    /**
     * @var string[]
     */
    protected $casts = [
        'highlighted' => 'bool',
    ];


    /**
     * @return BelongsTo
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }


    /**
     * @param Builder $query
     *
     * @return Builder
     */
    public function scopeFilterBy(Builder $query): Builder
    {
        $productFilter = new ProductFilter();

        $fields = [
            'title', 'author', 'price', 'stock',
            'highlighted', 'year', 'publisher',
            'place', 'isbn', 'series', 'description'
        ];

        $data = request()->only($fields);

        return $productFilter->applyTo($query, $data);
    }
}
