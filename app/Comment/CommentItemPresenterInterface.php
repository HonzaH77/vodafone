<?php

namespace App\Comment;

interface CommentItemPresenterInterface
{
    public static function getPublishedDate(string $date): string;
}
