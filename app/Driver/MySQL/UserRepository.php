<?php

namespace App\Driver\MySQL;

use App\User\UserRepositoryInterface;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class UserRepository implements UserRepositoryInterface
{
    /**
     * Funkce vrátí kolekci všech uživatelů.
     *
     * @return Collection
     */
    public function getAllUsers(): Collection
    {
        $users = DB::table('users')->select('users.id', 'users.username', 'users.email');
        return collect($users->get())->map(function ($user) {
            return new UserItem($user->id, $user->username, $user->email);
        });
    }

    /**
     * Funkce vrátí uživatele s $id.
     *
     * @param string $id
     * @return UserItem
     */
    public function getUsernameById(string $id): UserItem
    {
        $user = DB::table('users')
            ->select('users.id', 'users.username', 'users.email')
            ->where('users.id', '=', $id)->first();

        return new UserItem($user->id, $user->username, $user->email);
    }

    public function store(array $attributes): void
    {
        DB::table('users')->insert($attributes);
    }
}
