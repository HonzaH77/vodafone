<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;


class CommentFactory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public static function make(int $max, int $projectId, int $userId)
    {
        $commentId = [];

        for ($i = 0; $i < $max; $i++) {
            $commentId[] = DB::table('comments')->insertGetId([
                'user_id' => $userId,
                'project_id' => $projectId,
                'text' => fake()->realText(300)
            ]);
        }

        return $commentId;
    }
}
