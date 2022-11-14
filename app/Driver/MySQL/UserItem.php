<?php

namespace App\Driver\MySQL;

use App\User\UserItemInterface;

class UserItem implements UserItemInterface
{
    protected string $id;
    protected string $username;
    protected string $email;

    /**
     * Funkce vytvoří UserItem se zadanými parametry.
     *
     * @param string $id
     * @param string $username
     * @param string $email
     */
    public function __construct(string $id, string $username, string $email)
    {
        $this->id = $id;
        $this->username = $username;
        $this->email = $email;
    }

    /**
     * Funkce vrátí id.
     *
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * Funkce vrátí username.
     *
     * @return string
     */
    public function getUsername(): string
    {
        return $this->username;
    }

    /**
     * Funkce vrátí e-mail.
     *
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }
}
