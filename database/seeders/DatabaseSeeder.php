<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            AboutUsSeeder::class,
            UserSeeder::class,
            ArticleSeeder::class,
            GoodsSeeder::class,
            OrderSeeder::class,
            TotalSeeder::class,
            MessageSeeder::class,
        ]);
    }
}
