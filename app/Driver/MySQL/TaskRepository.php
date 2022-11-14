<?php

namespace App\Driver\MySQL;

use App\Task\TaskRepositoryInterface;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use function App\Helpers\taskSearchQueryBuilder;

class TaskRepository implements TaskRepositoryInterface
{
    /**
     * Funkce vrátí kolekci všech úkolů patřících k projektu $id.
     *
     * @param int $id
     * @return Collection
     */
    public function getTaskByProjectId(int $id): Collection
    {
        return DB::table('tasks')
            ->select('tasks.id', 'tasks.name', 'tasks.state', 'tasks.type', 'tasks.created_at', 'tasks.endDate')
            ->where('tasks.project_id', '=', $id)
            ->get();
    }

    /**
     * Funkce vrátí všechny stavy úkolů projektů s ID, které je v $projectIDs.
     *
     * @return Collection
     */
    public function getTaskStatusAndTypeByProjectId(array $projectIDs): Collection
    {
        return DB::table('tasks')
            ->select('tasks.project_id', 'tasks.state', 'tasks.type')
            ->whereIn('tasks.project_id', $projectIDs)
            ->get();
    }

    /**
     * Funkce vrátí úkol s $id.
     *
     * @param int $id
     * @return TaskItem
     */
    public function getTaskById(int $id): TaskItem
    {
        $task = DB::table('tasks')
            ->select('tasks.id', 'tasks.name', 'tasks.state', 'tasks.type', 'tasks.user_id AS authorId',
                'tasks.created_at AS createdAt', 'tasks.endDate', 'tasks.project_id as projectId')
            ->where('tasks.id', '=', $id)
            ->get()->first();

        return new TaskItem($task->id, $task->name, $task->authorId, $task->type, $task->state, $task->endDate,
            $task->createdAt, $task->projectId);
    }

    /**
     * Funkce vrátí všechny úkoly. Pokud je zvolený nějaký vyhledávací parametr, budou tyto úkoly vyfiltrované podle tohoto parametru.
     *
     * @param array $taskFilter
     * @return Collection
     */
    public function getAllTasks(array $taskFilter): Collection
    {
        $tasks = taskSearchQueryBuilder()->search($taskFilter);
        return collect($tasks->get())->map(function ($task) {
            return new TaskItem($task->id, $task->name, $task->authorId, $task->type, $task->state, $task->endDate,
                $task->createdAt, $task->projectId);
        });
    }

    /**
     * Funkce edituje úkol v databázi.
     *
     * @param int $id
     * @param array $attributes
     * @return void
     */
    public function updateTask(int $id, array $attributes): void
    {
        DB::table('tasks')->where('id', $id)->update($attributes);
    }

    /**
     * Funkce smaže úkol z databáze.
     *
     * @param int $id
     * @return void
     */
    public function deleteTask(int $id): void
    {
        DB::table('tasks')->where('id', $id)->delete();
    }

    /**
     * Funkce vytvorí nový úkol v databázi.
     *
     * @param array $attributes
     * @return void
     */
    public function createTask(array $attributes): void
    {
        $attributes['created_at'] = now();
        $attributes['updated_at'] = now();
        DB::table('tasks')->insert($attributes);
    }
}
