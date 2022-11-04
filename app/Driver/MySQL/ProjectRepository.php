<?php

namespace App\Driver\MySQL;


use App\Project\ProjectRepositoryInterface;
use Illuminate\Support\Carbon;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class ProjectRepository implements ProjectRepositoryInterface
{

    /**
     * Funkce vrátí kolekci všech projektů ProjectItem. V případě, že je zadán parametr $projectFilter,
     * vrátí kolekci projektů vyfiltrovaných podle tohoto parametru.
     *
     * @param array $projectFilter
     * @return Collection
     */
    function getAllProjects(array $projectFilter): Collection
    {
        $projects = DB::table('projects')
            ->select('projects.id', 'projects.name', 'projects.description', 'projects.created_at', 'users.username AS author', 'users.username AS authorId')
            ->join('users', 'projects.user_id', '=', 'users.id');

        if (isset($projectFilter["search"]))
        {
            $projects
                ->where('projects.name', 'like', '%' . $projectFilter['search'] . '%')
                ->orWhere('projects.description', 'like', '%' . $projectFilter['search'] . '%');
        }
        return collect($projects->get())->map(function ($project) {
            return new ProjectItem($project->id, $project->name, $project->description, $project->created_at, $project->author, $project->authorId);
        });
    }

    /**
     * Funkce vrátí projekt s $id.
     *
     * @param int $id
     * @return ProjectItem
     */
    function getProjectById(int $id): ProjectItem
    {
        if (Cache::has($id))
        {
            return Cache::get($id);
        }
        $project = DB::table('projects')
            ->select('projects.id', 'projects.name', 'projects.description', 'projects.created_at', 'users.username AS author', 'users.username AS authorId')
            ->join('users', 'projects.user_id', '=', 'users.id')
            ->where('projects.id', '=', $id)
            ->get()->first();

        $projectItem = new ProjectItem($project->id, $project->name, $project->description, $project->created_at, $project->author, $project->authorId);
        Cache::add($id, $projectItem, Carbon::now()->addSeconds(60));
        return $projectItem;
    }

    /**
     * Funkce upraví projekt $id pomoctí atributů $attributes.
     *
     * @param int $id
     * @param array $attributes
     * @return void
     */
    function updateProject(int $id, array $attributes): void
    {
        DB::table('projects')->where('id', $id)->update($attributes);
    }

    /**
     * Funkce vymaže z databáze projekt s $id.
     *
     * @param int $id
     * @return void
     */
    function deleteProject(int $id): void
    {
        DB::table('projects')->where('id', $id)->delete();
    }

    /**
     * Funkce vytvoří projekt se zadanými atributy $attributes.
     *
     * @param array $attributes
     * @return void
     */
    function createProject(array $attributes): void
    {
        DB::table('projects')->insert($attributes);
    }

}
