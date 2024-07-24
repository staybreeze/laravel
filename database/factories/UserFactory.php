<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class UserFactory extends Factory
{
    protected $model = User::class;

    public function definition()
    {
        return [
            'acc' => $this->faker->userName,
            'pw' => $this->faker->password,
            'name' => $this->faker->name,
            'address' => $this->faker->address,
            'email' => $this->faker->safeEmail,
        ];
    }

    /**
     * Configure the model factory to automatically create related orders.
     */
    public function configure()
    {
        return $this->afterCreating(function (User $user) {
            \App\Models\Order::factory()->count(rand(1, 5))->create([
                'customer_acc' => $user->acc,
            ]);
        });
    }
}