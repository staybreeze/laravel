<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Good>
 */
class GoodFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->word, 
            'img' => $this->faker->imageUrl(), 
            'new' => $this->faker->numberBetween(0, 1), 
            'discount' => $this->faker->numberBetween(10, 50),
            'old_price' => $this->faker->numberBetween(1000, 5000), 
            'price' => $this->faker->numberBetween(500, 999), 
            'quantity' => $this->faker->numberBetween(1, 100), 
            'like_item' => $this->faker->numberBetween(0, 1000), 
            'remain' => $this->faker->numberBetween(0, 100), 
        ];
    }
}
