<?php

namespace App\User;

interface UserItemInterface
{
    public function getId(): string;

    public function getUsername(): string;

    public function getEmail(): string;
}
