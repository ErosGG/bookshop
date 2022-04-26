<?php

namespace App\Models;

use App\Filters\ProductFilter;
use Barryvdh\LaravelIdeHelper\Eloquent;
use Database\Factories\ProductFactory;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Carbon;


/**
 * App\Models\Product
 *
 * @property int $id
 * @property int|null $category_id
 * @property string $title
 * @property string $slug
 * @property string $author
 * @property string $price
 * @property int $stock
 * @property bool $highlighted
 * @property int|null $year
 * @property string|null $publisher
 * @property string|null $place
 * @property string|null $isbn
 * @property string|null $series
 * @property string|null $image
 * @property string|null $description
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read Category|null $category
 * @method static ProductFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Product filterBy()
 * @method static \Illuminate\Database\Eloquent\Builder|Product newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Product newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Product query()
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereAuthor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereHighlighted($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereIsbn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product wherePlace($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product wherePublisher($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereSeries($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereStock($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereYear($value)
 * @mixin Eloquent
 */
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


    public function orders()
    {
        return $this->belongsToMany(Order::class, 'order_product')
            ->withPivot('quantity', 'price')
            ->withTimestamps();
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
