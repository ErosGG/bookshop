<?php

namespace App\Rules;

use App\Models\Product;
use Illuminate\Contracts\Validation\Rule;


class OrderedQuantity implements Rule
{
    private Product $product;


    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $this->product = $value->product;

        return $value->quantity > 0;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return "La quantitat de l'article {$this->product->title} ha de ser major que 0";
    }
}
