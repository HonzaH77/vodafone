<?php

namespace App\Comment;

interface CommentItemInterface
{
    public function getId(): string;
    public function getText(): string;
    public function getAuthor(): string;
    public function getCreatedAt(): string;

}
