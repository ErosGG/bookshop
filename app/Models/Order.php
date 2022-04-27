<?php

namespace App\Models;

use App\Filters\CategoryFilter;
use App\Filters\OrderFilter;
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


    private static array $statuses = [
        'pending' => 'pendent',
        'processing' => 'en procés',
        'completed' => 'completada',
        'shipped' => 'enviada',
        'cancelled' => 'cancel·lada',
    ];

    protected $fillable = [
        'user_id',
        'status',
    ];


    public static function getStatuses(): array
    {
        return self::$statuses;
    }


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


    /**
     * @param Builder $query
     *
     * @return Builder
     */
    public function scopeFilterBy(Builder $query): Builder
    {
        $orderFilter = new OrderFilter();

        $fields = ['status', 'email', 'id', 'created_at', 'updated_at'];

        $data = request()->only($fields);

        return $orderFilter->applyTo($query, $data);
    }
}
