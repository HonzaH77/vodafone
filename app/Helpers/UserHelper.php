<?php

namespace App\Helpers;

use App\User\UserRepositoryInterface;

if (!function_exists(__NAMESPACE__ . 'UserRepository')) {
    /**
     * Helper, ktery vraci instanci repositare userRepository.
     *
     * @return UserRepositoryInterface
     */
    function userRepository(): UserRepositoryInterface
    {
        static $userRepository = null;

        if (null === $userRepository) {
            $userRepository = app(UserRepositoryInterface::class);
        }

        return $userRepository;
    }
}
