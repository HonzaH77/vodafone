<?php

namespace App\Driver\MySQL;

use App\HIstory\HistoryItemInterface;

class HistoryItem implements HistoryItemInterface
{
    protected string $id;
    protected string $state;
    protected string $comment;
    protected string $createdAt;

    public function __construct(string $id, string $state, string $comment, string $createdAt)
    {
        $this->id = $id;
        $this->state = $state;
        $this->comment = $comment;
        $this->createdAt = $createdAt;
    }

    function getState(): string
    {
        return $this->state;
    }

    function getId(): string
    {
        return $this->id;
    }

    function getComment(): string
    {
        return $this->comment;
    }

    function getCreatedAt(): string
    {
        return $this->createdAt;
    }
}
