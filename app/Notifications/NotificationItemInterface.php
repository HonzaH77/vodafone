<?php

namespace App\Notifications;

interface NotificationItemInterface
{
    public function getId(): string;

    public function getUserId(): string;

    public function getProjectId(): string;

    public function getCreatedAt(): string;

}
