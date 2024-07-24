<?php
namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Order;
use App\Models\User; // 引入 User 模型

class OrderFactory extends Factory
{
    protected $model = Order::class;

    public function definition()
    {
        return [
            'quantity' => $this->faker->numberBetween(1, 10),
            'customer_acc' => User::inRandomOrder()->first()->acc, 
            'product_id' => \App\Models\Good::factory(),
        ];
    }
}