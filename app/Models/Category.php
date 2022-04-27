<?php

namespace App\Models;

use App\Filters\CategoryFilter;
use App\Filters\ProductFilter;
use Barryvdh\LaravelIdeHelper\Eloquent;
use Database\Factories\CategoryFactory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Carbon;


/**
 * App\Models\Category
 *
 * @property int $id
 * @property string $name
 * @property string $slug
 * @property string|null $description
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read Collection|Product[] $products
 * @property-read int|null $products_count
 * @method static CategoryFactory factory(...$parameters)
 * @method static Builder|Category newModelQuery()
 * @method static Builder|Category newQuery()
 * @method static Builder|Category query()
 * @method static Builder|Category whereCreatedAt($value)
 * @method static Builder|Category whereDescription($value)
 * @method static Builder|Category whereId($value)
 * @method static Builder|Category whereName($value)
 * @method static Builder|Category whereSlug($value)
 * @method static Builder|Category whereUpdatedAt($value)
 * @mixin Eloquent
 */
class Category extends Model
{
    use HasFactory;


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'description',
        'slug',
        'image',
    ];


    /**
     * @var string[]
     */
    protected $casts = [
        'highlighted' => 'bool',
    ];


    /**
     * @return HasMany
     */
    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }


    /**
     * @param Builder $query
     *
     * @return Builder
     */
    public function scopeFilterBy(Builder $query): Builder
    {
        $categoryFilter = new CategoryFilter();

        $fields = ['name', 'highlighted', 'description'];

        $data = request()->only($fields);

        $data = collect($data)->whereNotNull()->toArray();

        return $categoryFilter->applyTo($query, $data);
    }
}
