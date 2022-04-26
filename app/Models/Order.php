<?php

namespace App\Models;

use Barryvdh\LaravelIdeHelper\Eloquent;
use Database\Factories\OrderFactory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;


/**
 * App\Models\Order
 *
 * @property int $id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static OrderFactory factory(...$parameters)
 * @method static Builder|Order newModelQuery()
 * @method static Builder|Order newQuery()
 * @method static Builder|Order query()
 * @method static Builder|Order whereCreatedAt($value)
 * @method static Builder|Order whereId($value)
 * @method static Builder|Order whereUpdatedAt($value)
 * @mixin Eloquent
 */
class Order extends Model
{
    use HasFactory;


    protected $fillable = [
        'user_id',
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }


    public function products()
    {
        return $this->belongsToMany(Product::class, 'order_product')
            ->using(OrderProduct::class)
            ->withPivot('quantity', 'price')
            ->withTimestamps();
    }
}
