<?php

namespace App\User;

use App\Driver\MySQL\UserItem;
use Illuminate\Support\Collection;

interface UserRepositoryInterface
{
    function getAllUsers(): Collection;

    function getUsernameById(string $id): UserItem;
}
