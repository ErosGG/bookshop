<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;


class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $name = 'Història';

        Category::factory([
            'name' => $name,
            'slug' => Str::slug($name),
            'description' => 'Llibres de temàtica històrica',
            'highlighted' => true,
        ])->create();

        Category::factory()
            ->count(15)
            ->create();
    }
}
