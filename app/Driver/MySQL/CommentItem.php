<?php

namespace App\Driver\MySQL;

use App\Comment\CommentItemInterface;
use App\Item\AbstractItem;
use App\Presenters\CommentItemPresenter;

class CommentItem extends AbstractItem implements CommentItemInterface
{
    protected string $id;
    protected string $text;
    protected string $author;
    protected string $createdAt;
    protected string $commentPresenter = CommentItemPresenter::class;

    /**
     * Vytvoří nový CommentItem.
     *
     * @param string $id
     * @param string $text
     * @param string $author
     * @param string $createdAt
     */
    public function __construct(string $id, string $text, string $author, string $createdAt)
    {
        parent::__construct($id);
        $this->text = $text;
        $this->author = $author;
        $this->createdAt = $createdAt;
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
     * FUnkce vrátí text komentáře.
     *
     * @return string
     */
    public function getText(): string
    {
        return $this->text;
    }

    /**
     * Funkce vrátí autora komentáře.
     *
     * @return string
     */
    public function getAuthor(): string
    {
        return $this->author;
    }

    /**
     * Funkce vrátí datum vytvoření komentáře.
     *
     * @return string
     */
    public function getCreatedAt(): string
    {
        return $this->commentPresenter::getPublishedDate($this->createdAt);
    }
}
