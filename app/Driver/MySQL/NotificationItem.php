<?php

namespace App\Driver\MySQL;

use App\Notifications\NotificationItemInterface;

class NotificationItem implements NotificationItemInterface
{
    protected string $id;
    protected string $userId;
    protected string $projectId;
    protected string $createdAt;

    public function __construct(string $id, string $userId, string $projectId, string $createdAt){
        $this->id = $id;
        $this->userId = $userId;
        $this->projectId = $projectId;
        $this->createdAt = $createdAt;
    }
    public function getId(): string
    {
        return $this->id;
    }

    public function getUserId(): string
    {
        return $this->userId;
    }

    public function getProjectId(): string
    {
        return $this->projectId;
    }

    public function getCreatedAt(): string
    {
        return $this->createdAt;
    }
}
