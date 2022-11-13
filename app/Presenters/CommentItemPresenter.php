<?php

namespace App\Presenters;


use App\Comment\CommentItemPresenterInterface;


class CommentItemPresenter implements CommentItemPresenterInterface
{

    public static function getPublishedDate(string $date): string
    {
        return __('messages.published') . '-' . $date;
    }
}
