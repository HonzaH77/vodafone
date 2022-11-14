<?php

namespace App\Notifications;

use App\Driver\MySQL\NotificationItem;
use Illuminate\Support\Collection;

interface NotificationRepositoryInterface
{
    public function store(array $attributes): void;

    public function getNotificationById(int $id): NotificationItem;

    public function getAllNotificationByProjectId(int $id): Collection;
}
