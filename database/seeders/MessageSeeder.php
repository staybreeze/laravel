<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\message;

class MessageSeeder extends Seeder
{
    public function run()
    {
      Message::factory()->count(10)->create();
    }
}