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

    public function __construct(string $id, string $text, string $author, string $createdAt)
    {
        parent::__construct($id);
        $this->text = $text;
        $this->author = $author;
        $this->createdAt = $createdAt;
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getText(): string
    {
        return $this->text;
    }

    public function getAuthor(): string
    {
        return $this->author;
    }

    public function getCreatedAt(): string
    {
        return $this->commentPresenter::getPublishedDate($this->createdAt);
    }
}
