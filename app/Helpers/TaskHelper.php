<?php

namespace App\Helpers;
use App\SearchQueryBuilder\TaskSearchQueryBuilderInterface;
use App\Task\TaskRepositoryInterface;
use PhpParser\Builder;

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

    function taskSearchQueryBuilder() : TaskSearchQueryBuilderInterface
    {
        static $taskSearchQueryBuilder = null;

        if (null === $taskSearchQueryBuilder) {
            $taskSearchQueryBuilder = app(TaskSearchQueryBuilderInterface::class);
        }

        return $taskSearchQueryBuilder;
    }
}
