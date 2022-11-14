<?php

namespace App\Helpers;
use App\Notifications\NotificationRepositoryInterface;

if (!function_exists(__NAMESPACE__ . 'NotificationRepository')) {
    /**
     * Helper, ktery vraci instanci repositare notificationRepository.
     *
     * @return NotificationRepositoryInterface
     */
    function notificationRepository(): NotificationRepositoryInterface
    {
        static $notificationRepository = null;

        if (null === $notificationRepository) {
            $notificationRepository = app(NotificationRepositoryInterface::class);
        }

        return $notificationRepository;
    }
}
