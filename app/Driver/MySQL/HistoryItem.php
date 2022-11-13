<?php

namespace App\Driver\MySQL;

use App\HIstory\HistoryItemInterface;
use App\Item\AbstractItem;

class HistoryItem extends AbstractItem implements HistoryItemInterface
{
    protected string $id;
    protected string $state;
    protected string $comment;
    protected string $createdAt;

    public function __construct(string $id, string $state, string $comment, string $createdAt)
    {
        parent::__construct($id);
        $this->state = $state;
        $this->comment = $comment;
        $this->createdAt = $createdAt;
    }

    public function getState(): string
    {
        return $this->state;
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getComment(): string
    {
        return $this->comment;
    }

    public function getCreatedAt(): string
    {
        return $this->createdAt;
    }
}
