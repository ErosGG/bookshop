<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        $name = $this->faker->unique()->sentence(1, true);

        return [
            'name' => $name,
            'slug' => Str::slug($name),
            'image' => 'https://picsum.photos/175/225',
            'description' => $this->faker->paragraph(1, true),
            'highlighted' => $this->faker->boolean(5),
        ];
    }
}
