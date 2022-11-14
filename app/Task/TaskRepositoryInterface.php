<?php

namespace App\Task;

use App\Driver\MySQL\TaskItem;
use Illuminate\Support\Collection;

interface TaskRepositoryInterface
{
    public function getTaskByProjectId(int $id): Collection;

    public function getTaskStatusAndTypeByProjectId(array $projectIDs): Collection;

    public function getTaskById(int $id): TaskItem;

    public function getAllTasks(array $taskFilter): Collection;

    public function deleteTask(int $id): void;

    public function updateTask(int $id, array $attributes): void;

    public function createTask(array $attributes): void;
}
