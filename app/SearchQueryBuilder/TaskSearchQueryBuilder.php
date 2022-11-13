<?php

namespace App\SearchQueryBuilder;

use Illuminate\Database\Query\Builder;
use Illuminate\Support\Facades\DB;

class TaskSearchQueryBuilder implements TaskSearchQueryBuilderInterface
{
    public static function search(array $filter): Builder
    {
        $tasks = DB::table('tasks')->select('tasks.id', 'tasks.name', 'tasks.state', 'tasks.type', 'tasks.user_id AS authorId',
            'tasks.created_at AS createdAt', 'tasks.endDate', 'tasks.project_id as projectId', 'projects.name')
            ->join('projects', 'tasks.project_id', '=', 'projects.id');
        if (isset($filter["search"]))
        {
            $tasks->where('projects.name', 'like', '%' . $filter['search'] . '%');

        }
        if (isset($filter["type"]))
        {
            $tasks->where('tasks.type', '=', $filter['type']);
        }
        if (isset($taskFilter["state"]))
        {
            $tasks->where('state.type', '=', $filter['type']);
        }
        return $tasks;
    }

}
