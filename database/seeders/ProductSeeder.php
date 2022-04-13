<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::factory([
            'title' => 'The Seeds of Disaster. The Development of French Army Doctrine, 1919-39',
            'author' => 'Robert A. Doughty',
            'year' => 1985,
            'publisher' => 'Stackpole Books',
            'place' => "Estats Units d'Amèrica",
            'isbn' => '978-0-8117-1460-0',
            'series' => 'Stackpole Military History Series',
        ])->create();

        Product::factory()
            ->count(20)
            ->create();
    }
}
