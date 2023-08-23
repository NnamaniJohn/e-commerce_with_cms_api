<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Product;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        \App\Models\User::create([
            'name' => 'Admin User',
            'email' => 'admin@admin.com',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'role' => 'admin',
        ]);

        \App\Models\User::create([
            'name' => 'User',
            'email' => 'user@admin.com',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'role' => 'user',
        ]);

        Product::create([
            "name" => "Book",
            "price" => 999,
            "description"=> "You can read it!"
        ]);
        Product::create([
            "name" => "Headphones",
            "price" => 578,
            "description"=> "Listen to stuff!"
        ]);
        Product::create([
            "name" => "Backpack",
            "price" => 679,
            "description"=> "Carry things around town!"
        ]);
        Product::create([
            "name" => "Glasses",
            "price" => 954,
            "description"=> "Now you can see!"
        ]);

        $this->call([
            UserSeeder::class,
            ProductSeeder::class,
            PageSeeder::class,
        ]);
    }
}
