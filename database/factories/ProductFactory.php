<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;


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
        $title = $this->faker->unique()->sentence(4, true);

        return [
            'category_id' => Category::all()->random()->id,
            'title' => $title,
            'slug' => Str::slug($title),
            'author' => $this->faker->name(),
            'price' => $this->faker->randomFloat(2, 1, 10),
            'stock' => $this->faker->randomDigit(),
            'highlighted' => $this->faker->boolean(1),
            'year' => $this->faker->year(),
            'publisher' => $this->faker->company(),
            'place' => $this->faker->country(),
            'isbn' => $this->faker->unique()->isbn13(),
            'series' => $this->faker->optional(0.2)->sentence(2, true),
            'description' => $this->faker->paragraph(4, true),
        ];
    }
}
