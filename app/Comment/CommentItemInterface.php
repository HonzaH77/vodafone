<?php

namespace App\Comment;

interface CommentItemInterface
{
    function getId(): string;
    function getText(): string;
    function getAuthor(): string;
    function getCreatedAt(): string;

}
