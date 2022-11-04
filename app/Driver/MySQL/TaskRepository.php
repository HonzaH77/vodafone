<?php

namespace App\Driver\MySQL;

use App\Task\TaskRepositoryInterface;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class TaskRepository implements TaskRepositoryInterface
{
    /**
     * Funkce vrátí kolekci všech úkolů patřících k projektu $id.
     *
     * @param int $id
     * @return Collection
     */
    function getTaskByProjectId(int $id): Collection
    {
        return DB::table('tasks')
            ->select('tasks.id', 'tasks.name', 'tasks.state', 'tasks.type', 'tasks.created_at', 'tasks.endDate')
            ->where('tasks.project_id', '=', $id)
            ->get();
    }

    /**
     * Funkce vrátí všechny stavy úkolů všech projektů.
     *
     * @return Collection
     */
    function getTaskStatusAndTypeByProjectId(array $projectIDs): Collection
    {
        return DB::table('tasks')
            ->select('tasks.project_id', 'tasks.state', 'tasks.type')
            ->whereIn('tasks.project_id', $projectIDs)
            ->get();
    }

    function getTaskById(int $id): TaskItem
    {
        $task = DB::table('tasks')
            ->select('tasks.id', 'tasks.name', 'tasks.state', 'tasks.type', 'task.user_id AS authorId',
                'tasks.created_at AS createdAt', 'tasks.endDate', 'tasks.project_id as projectId')
            ->where('tasks.id', '=', $id)
            ->get()->first();

        return new TaskItem($task->id, $task->name, $task->authorId, $task->type, $task->state, $task->endDate,
            $task->createdAt, $task->projectId);
    }

    function getAllTasks(array $taskFilter): Collection
    {
        $tasks = DB::table('tasks')
            ->select('tasks.id', 'tasks.name', 'tasks.state', 'tasks.type', 'tasks.user_id AS authorId',
                'tasks.created_at AS createdAt', 'tasks.endDate', 'tasks.project_id as projectId');

        if (isset($taskFilter["search"]))
        {
            $tasks = DB::table('tasks')
                ->select('tasks.id', 'tasks.name', 'tasks.state', 'tasks.type', 'tasks.user_id AS authorId',
                    'tasks.created_at AS createdAt', 'tasks.endDate', 'tasks.project_id as projectId', 'projects.name')
                ->leftJoin('projects', function ($join) use ($taskFilter) {
                    $join->on('tasks.project_id', '=', 'projects.id');
                })->where('projects.name', 'like', '%' . $taskFilter['search'] . '%');

        }
        if (isset($taskFilter["type"]))
        {
            $tasks
                ->where('tasks.type', '=', $taskFilter['type']);
        }
        if (isset($taskFilter["state"]))
        {
            $tasks
                ->where('state.type', '=', $taskFilter['type']);
        }

        return collect($tasks->get())->map(function ($task) {
            return new TaskItem($task->id, $task->name, $task->authorId, $task->type, $task->state, $task->endDate,
                $task->createdAt, $task->projectId);
        });
    }

    function updateTask(int $id, array $attributes): void
    {
        DB::table('tasks')->where('id', $id)->update($attributes);
    }

    function deleteTask(int $id): void
    {
        DB::table('tasks')->where('id', $id)->delete();
    }

    function createTask(array $attributes): void
    {
        DB::table('tasks')->insert($attributes);
    }
}
