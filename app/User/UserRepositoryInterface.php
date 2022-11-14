<?php

namespace App\User;

use App\Driver\MySQL\UserItem;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

interface UserRepositoryInterface
{
    public function getAllUsers(): Collection;

    public function getUsernameById(string $id): UserItem;

    public function store(array $attributes): void;

}
