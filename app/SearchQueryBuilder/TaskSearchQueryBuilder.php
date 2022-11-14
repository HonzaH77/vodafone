<?php

namespace App\SearchQueryBuilder;

use Illuminate\Database\Query\Builder;
use Illuminate\Support\Facades\DB;

class TaskSearchQueryBuilder implements TaskSearchQueryBuilderInterface
{
    /**
     * Builder sloužící pro filtrování úkolů podle zadaných parametrů.
     *
     * @param array $filter
     * @return Builder
     */
    public static function search(array $filter): Builder
    {
        $tasks = DB::table('tasks')->select('tasks.id', 'tasks.name', 'tasks.state', 'tasks.type', 'tasks.user_id AS authorId',
            'tasks.created_at AS createdAt', 'tasks.endDate', 'tasks.project_id as projectId');

        if (isset($filter["search"]))
        {
            $tasks = DB::table('tasks')
                ->select('tasks.id', 'tasks.name', 'tasks.state', 'tasks.type', 'tasks.user_id AS authorId',
                    'tasks.created_at AS createdAt', 'tasks.endDate', 'tasks.project_id as projectId', 'projects.name')
                ->leftJoin('projects', function ($join) use ($filter) {
                    $join->on('tasks.project_id', '=', 'projects.id');
                })->where('projects.name', 'like', '%' . $filter['search'] . '%');

        }
        (isset($filter["type"])) ? $tasks->where('tasks.type', '=', $filter['type']) : '';
        (isset($filter["state"])) ? $tasks->where('tasks.state', '=', $filter['state']) : '';

        return $tasks;
    }

}
