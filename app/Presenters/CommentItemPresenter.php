<?php

namespace App\Presenters;


class CommentItemPresenter implements CommentItemPresenterInterface
{
    public static function getPublishedDate(string $date): string
    {
        return __('messages.published') . '-' . $date;
    }
}
