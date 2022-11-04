<?php

namespace App\Driver\MySQL;

use App\User\UserItemInterface;

class UserItem implements UserItemInterface
{
    protected string $id;
    protected string $username;
    protected string $email;

public function __construct(string $id, string $username, string $email)
{
    $this->id = $id;
    $this->username = $username;
    $this->email = $email;
}

    function getId(): string
    {
        return $this->id;
    }

    function getUsername(): string
    {
        return $this->username;
    }

    function getEmail(): string
    {
        return $this->email;
    }
}
