<?php

namespace Database\Factories;

use App\Models\Project;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;


class TaskFactory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public static function make(int $max, int $projectId, int $userId)
    {
        $tasksId = [];
        $type = ['mistake', 'requirement'];
        $state = ['new', 'denied', 'done', 'in process'];
        for ($i = 0; $i < $max; $i++) {
            $tasksId[] = DB::table('tasks')->insertGetId([
                'user_id' => $userId,
                'project_id' => $projectId,
                'name' => fake()->realText(50),
                'type' => $type[rand(0, 1)],
                'state' => $state[rand(0, 3)],
                'endDate' => fake()->dateTime,
            ]);
        }

        return $tasksId;
    }
}
