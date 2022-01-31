<?php

namespace Database\Factories;

use App\Models\Sale;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class SaleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    protected $model = Sale::class;

    public function definition()
    {
        return [
            'ticket_id' => random_int(1, 20),
            'reference' => Str::random(10),
            'seat_number' => random_int(1, 300),
            'buyer' => $this->faker->name(),
        ];
    }
}
