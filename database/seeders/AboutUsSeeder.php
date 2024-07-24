<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\AboutUs;

class AboutUsSeeder extends Seeder
{
    public function run()
    {
        // 創建 10 條 about_us 記錄
        AboutUs::factory()->count(1)->create();
    }
}