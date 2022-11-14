<?php

namespace App\Presenters;


class CommentItemPresenter implements CommentItemPresenterInterface
{
    /**
     * Funkce vratí datum publikování komentáře obalené "Zveřejněno - $date".
     *
     * @param string $date
     * @return string
     */
    public static function getPublishedDate(string $date): string
    {
        return __('messages.published') . ' - ' . $date;
    }
}
