<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Orders>
 */
class OrdersFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'customer_id' => 1,
            'user_id' => 2,
            'name' => fake()->name(),
            'model' => 'samsung '.Str::random(5),
            'phone' => 'Samsung',
            'imei' => Str::random(10),
            'statuscode' => Str::random(15),
            'stock' => Str::random(4),
            'status' => 'repairing',
        ];
    }
}
