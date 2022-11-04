<?php

namespace App\User;

interface UserItemInterface
{
    function getId(): string;

    function getUsername(): string;

    function getEmail(): string;
}
