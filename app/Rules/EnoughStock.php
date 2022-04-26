<?php

namespace App\Rules;

use App\Models\Product;
use Illuminate\Contracts\Validation\Rule;


class EnoughStock implements Rule
{
    private Product $prduct;


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
        $this->prduct = $value->product;

        return $value->product->stock >= $value->quantity;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return "No hi ha prou unitats del producte {$this->prduct->title}. Queden {$this->prduct->stock} unitats";
    }
}
