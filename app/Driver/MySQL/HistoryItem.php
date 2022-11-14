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

    /**
     * Vytvoří nový HistoryItem.
     *
     * @param string $id
     * @param string $state
     * @param string $comment
     * @param string $createdAt
     */
    public function __construct(string $id, string $state, string $comment, string $createdAt)
    {
        parent::__construct($id);
        $this->state = $state;
        $this->comment = $comment;
        $this->createdAt = $createdAt;
    }

    /**
     * FUnkce vrátí stav úkolu.
     *
     * @return string
     */
    public function getState(): string
    {
        return $this->state;
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

    /**Funkce vrátí komentář.
     *
     *
     * @return string
     */
    public function getComment(): string
    {
        return $this->comment;
    }

    /**
     * Funkce vrátí datum vytvoření.
     *
     * @return string
     */
    public function getCreatedAt(): string
    {
        return $this->createdAt;
    }
}
