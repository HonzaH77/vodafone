<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;


class ProjectFactory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public static function make(int $max, int $userId)
    {
        $projectId = [];
        for ($i = 0; $i < $max; $i++) {
            $projectId[] = DB::table('projects')->insertGetId([
                'user_id' => $userId,
                'name' => fake()->realText(50),
                'description' => fake()->realTextBetween(20, 50)
            ]);
        }

        return $projectId;
    }
}
