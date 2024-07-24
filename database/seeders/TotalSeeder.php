<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Total;

class TotalSeeder extends Seeder
{
    public function run()
    {
        Total::create(['total' => 100]); 
    }
}