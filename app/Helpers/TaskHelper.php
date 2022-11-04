<?php

namespace App\Helpers;
use App\Task\TaskRepositoryInterface;

if (!function_exists(__NAMESPACE__ . 'TaskRepository')) {
    /**
     * Helper, ktery vraci instanci repositare taskRepository.
     *
     * @return TaskRepositoryInterface
     */
    function taskRepository(): TaskRepositoryInterface
    {
        static $taskRepository = null;

        if (null === $taskRepository) {
            $taskRepository = app(TaskRepositoryInterface::class);
        }

        return $taskRepository;
    }
}
