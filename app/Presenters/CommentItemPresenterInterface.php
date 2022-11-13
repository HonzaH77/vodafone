<?php

namespace App\Presenters;

interface CommentItemPresenterInterface
{
    public static function getPublishedDate(string $date): string;
}
