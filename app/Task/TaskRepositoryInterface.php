<?php

namespace App\Task;

use App\Driver\MySQL\TaskItem;
use Illuminate\Support\Collection;

interface TaskRepositoryInterface
{
    function getTaskByProjectId(int $id): Collection;

    function getTaskStatusAndTypeByProjectId(array $projectIDs): Collection;

    function getTaskById(int $id): TaskItem;

    function getAllTasks(array $taskFilter): Collection;

    function deleteTask(int $id): void;

    function updateTask(int $id, array $attributes): void;

    function createTask(array $attributes): void;
}
