<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;


class UserFactory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public static function make(int $max)
    {
        $usersId = [];
        for ($i = 0; $i < $max; $i++)
        {
            $usersId[] = DB::table('users')->insertGetId([
                'username' => fake()->name(),
                'email' => fake()->unique()->safeEmail(),
                'password' => fake()->password(),
            ]);
        }

        return $usersId;
    }
}

;
