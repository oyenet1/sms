<?php

namespace Database\Factories;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

class TicketFactory extends Factory
{
    public $names = ['football', 'marriage', 'music', 'cinema', 'advert', 'product show'];
    public $status = ['active', 'expired'];
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->names[array_rand($this->names)],
            'amount' => floatval(random_int(1000, 10000)),
            'total' => random_int(150, 300),
            'status' => $this->status[array_rand($this->status)],
            'date' => Carbon::now()->addDays(random_int(1, 4)),
            'time' => Carbon::now()->addHours(random_int(1, 4)),
        ];
    }
}
