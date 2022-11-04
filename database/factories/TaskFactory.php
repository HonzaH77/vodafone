<?php

namespace Database\Factories;

use App\Models\Project;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Task>
 */
class TaskFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $type = ['mistake', 'requirement'];
        $state = ['new', 'denied', 'done', 'in process'];
        return [
            'name' => fake()->realText(50),
            'type' => $type[rand(0, 1)],
            'state' => $state[rand(0, 3)],
            'endDate' => fake()->date(),
        ];
    }
}
