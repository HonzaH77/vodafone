<?php

namespace App\User;

use App\Driver\MySQL\CommentItem;
use Illuminate\Support\Collection;

interface UserRepositoryInterface
{
    function getAllUsers(): Collection;
}
