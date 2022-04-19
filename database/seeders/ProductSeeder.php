<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;


class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $title = 'The Seeds of Disaster. The Development of French Army Doctrine, 1919-39';

        Product::factory([
            'category_id' => Category::where('name','Història')->first()->id,
            'title' => $title,
            'slug' => Str::slug($title),
            'author' => 'Robert A. Doughty',
            'highlighted' => true,
            'year' => 1985,
            'publisher' => 'Stackpole Books',
            'place' => "Estats Units d'Amèrica",
            'isbn' => '9780811714600',
            'series' => 'Stackpole Military History Series',
        ])->create();

        Product::factory()
            ->count(20)
            ->state(new Sequence(['category_id' => Category::all()->random()->id]))
            ->create();
    }
}
