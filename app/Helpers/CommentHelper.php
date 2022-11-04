<?php

namespace App\Helpers;
use App\Comment\CommentRepositoryInterface;

if (!function_exists(__NAMESPACE__ . 'CommentRepository')) {
    /**
     * Helper, ktery vraci instanci repositare commentRepository.
     *
     * @return CommentRepositoryInterface
     */
    function commentRepository(): CommentRepositoryInterface
    {
        static $commentRepository = null;

        if (null === $commentRepository) {
            $commentRepository = app(CommentRepositoryInterface::class);
        }

        return $commentRepository;
    }
}
