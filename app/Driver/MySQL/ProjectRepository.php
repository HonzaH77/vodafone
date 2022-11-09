<?php

namespace App\Driver\MySQL;


use App\Project\ProjectRepositoryInterface;
use Illuminate\Support\Carbon;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
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
            ->select('projects.id', 'projects.name', 'projects.description', 'projects.created_at AS createdAt', 'projects.user_id AS authorId');

        if (isset($projectFilter["search"]))

        {
            $projects
                ->where('projects.name', 'like', '%' . $projectFilter['search'] . '%')
                ->orWhere('projects.description', 'like', '%' . $projectFilter['search'] . '%');
        }
        return collect($projects->get())->map(function ($project) {
            return new ProjectItem($project->id, $project->name, $project->description, $project->createdAt, $project->authorId);
        });
    }

    /**
     * Funkce vrátí projekt s $id.
     *
     * @param int $projectId
     * @return ProjectItem
     */
    function getProjectById(int $projectId): ProjectItem
    {
        if (Cache::has($projectId))
        {
            return Cache::get($projectId);
        }
        $project = DB::table('projects')
            ->select('projects.id', 'projects.name', 'projects.description', 'projects.created_at', 'projects.user_id AS authorId')
            ->where('projects.id', '=', $projectId)
            ->get()->first();

        $projectItem = new ProjectItem($project->id, $project->name, $project->description, $project->created_at, $project->authorId);
        Cache::add($projectId, $projectItem, Carbon::now()->addSeconds(60));
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
        $project = new ProjectItem($id, $attributes["name"], $attributes["description"], Carbon::now(), Auth::id());
        $project->save();
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

        $project = new ProjectItem(0, $attributes["name"], $attributes["description"], Carbon::now(), $attributes["user_id"]);
        $project->save();
    }

}
