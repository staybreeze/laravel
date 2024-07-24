<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Good;

class GoodsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Good::factory()->count(10)->create();
    }
}