<?php

namespace Database\Seeders;

use App\Models\Order;
use App\Models\Product;
use Doctrine\DBAL\Schema\Sequence;
use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();

        $products = Product::all();

        Order::factory()->count(20)->create();

        $orders = Order::all();

        foreach ($orders as $order) {

            for ($i = 0; $i < rand(1, 10); $i++) {

                $order->products()->attach(
                    $products->random(), [
                        'quantity' => rand(1, 10),
                        'price' => $faker->randomFloat(2, 10, 100),
                    ]
                );
            }
        }
    }
}
