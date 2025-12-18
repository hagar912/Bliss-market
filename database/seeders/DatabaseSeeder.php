<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Product;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        DB::table('Categories')->insert([
            'name' => 'Electronics seeders',
            'description' => 'Electronic gadgets and devices',
            'image_path' => 'imgs/electronics.jpg',
        ]);

        Product::create([
            'name' => 'Smartphone seeders',
            'description' => 'Latest model smartphone with advanced features',
            'price' => 699.99,
            'image_path' => 'imgs/smartphone.jpg',
        ]);

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
    }
}
