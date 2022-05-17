<?php

namespace Database\Factories;

use App\Models\CustomerLog;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CustomerLog>
 */
class CustomerLogFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'customer_id' => random_int(1, 30),
            'user_id' => random_int(1, 4),
            'log' => $this->faker->sentence(40),
        ];
    }
}
