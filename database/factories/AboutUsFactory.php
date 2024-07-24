<?php
namespace Database\Factories;

use App\Models\AboutUs;
use Illuminate\Database\Eloquent\Factories\Factory;

class AboutUsFactory extends Factory
{
    protected $model = AboutUs::class;

    public function definition()
    {
        return [
            'origin' => $this->faker->sentence,
            'goal' => $this->faker->sentence,
            'cheetos' => $this->faker->sentence,
            'img' => $this->faker->imageUrl(),
        ];
    }
}