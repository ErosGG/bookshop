<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->unique()->sentence(4, true),
            'author' => $this->faker->name(),
            'year' => $this->faker->year(),
            'publisher' => $this->faker->company(),
            'place' => $this->faker->country(),
            'isbn' => $this->faker->unique()->isbn13(),
            'series' => $this->faker->optional(0.2)->sentence(4, true),
            'price' => $this->faker->randomFloat(2, 1, 10),
            'stock' => $this->faker->randomDigit(),
            'highlighted' => $this->faker->boolean(),
        ];
    }
}
