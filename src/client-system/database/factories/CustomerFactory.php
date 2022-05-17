<?php

namespace Database\Factories;

use App\Models\Customer;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Customer>
 */
class CustomerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'shop_id' => random_int(1, 3),  // ショップIDは１が本店、２が名古屋、３が大阪 。
            'name' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'postal' => $this->faker->postcode,
            'address' => $this->faker->address,
            'birthdate' => $this->faker->dateTimeBetween('-90 years', '-18 years'),// 18歳から90歳までの誕生日を生成
            'phone' => $this->faker->phoneNumber,
            'kramer_flag' => 0,  // クレーマーフラグ とりあえず全員 0 にしておく
        ];
    }
}
