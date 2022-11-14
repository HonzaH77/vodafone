<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;

class HistoryFactory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public static function make(int $max, int $taskId)
    {
        $historyId = [];
        $state = ['new', 'denied', 'done', 'in process'];
        for ($i = 0; $i < $max; $i++) {
            $historyId[] = DB::table('histories')->insertGetId([
                'task_id' => $taskId,
                'state' => $state[rand(0, 3)],
                'comment' => fake()->realTextBetween(20, 50)
            ]);
        }

        return $historyId;
    }

}
