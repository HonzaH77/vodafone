<?php

namespace App\Helpers;
use App\History\HistoryRepositoryInterface;

if (!function_exists(__NAMESPACE__ . 'HistoryRepository')) {
    /**
     * Helper, ktery vraci instanci repositare historyRepository.
     *
     * @return HistoryRepositoryInterface
     */
    function historyRepository(): HistoryRepositoryInterface
    {
        static $historyRepository = null;

        if (null === $historyRepository) {
            $historyRepository = app(HistoryRepositoryInterface::class);
        }

        return $historyRepository;
    }
}
