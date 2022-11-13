<?php

namespace App\Driver\MySQL;

use App\Comment\CommentItemInterface;
use App\Presenters\CommentItemPresenter;

class CommentItem implements CommentItemInterface
{
    protected string $id;
    protected string $text;
    protected string $author;
    protected string $createdAt;
    protected string $commentPresenter = CommentItemPresenter::class;

    public function __construct(string $id, string $text, string $author, string $createdAt)
    {
        $this->id = $id;
        $this->text = $text;
        $this->author = $author;
        $this->createdAt = $createdAt;
    }

    function getId(): string
    {
        return $this->id;
    }

    function getText(): string
    {
        return $this->text;
    }

    function getAuthor(): string
    {
        return $this->author;
    }

    function getCreatedAt(): string
    {
        return $this->commentPresenter::getPublishedDate($this->createdAt);
    }
}
