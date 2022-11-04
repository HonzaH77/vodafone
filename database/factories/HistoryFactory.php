<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\History>
 */
class HistoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $state = ['new', 'denied', 'done', 'in process'];
        return [
            'state' => $state[rand(0, 3)],
            'comment' => fake()->realTextBetween(20, 50)
        ];
    }

}
