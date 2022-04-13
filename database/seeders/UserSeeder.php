<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory([
            'name' => 'admin',
            'email' => 'admin@llibreria.cat',
            'email_verified_at' => now(),
            'password' => Hash::make('1234'), // password
            'admin' => true,
            'remember_token' => Str::random(10),
        ])->create();

        User::factory([
            'name' => 'eros',
            'email' => 'eros.gonzalez@inslapineda.cat',
            'password' => Hash::make('1234'), // password
        ])->create();

        User::factory()
            ->count(10)
            ->create();
    }
}
