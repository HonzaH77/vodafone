<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Notifications\ProjectNotification;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;
use function App\Helpers\attachmentRepository;
use function App\Helpers\commentRepository;
use function App\Helpers\projectRepository;
use function App\Helpers\taskRepository;
use function App\Helpers\userRepository;


class ProjectController extends Controller
{

    /**
     * Funkce zobrazí veškeré informace k projektu s ID = $projectId.
     *
     * @param $projectId
     * @return Application|Factory|View
     */
    public function index($projectId): Application|Factory|View
    {
        $project = projectRepository()->getProjectById($projectId);
        $comment = commentRepository()->getCommentByProjectId($projectId);
        $attachment = attachmentRepository()->getAttachmentByProjectId($projectId);
        $task = taskRepository()->getTaskByProjectId($projectId);
        return view('project.layout.index', ['project' => $project, 'comments' => $comment, 'attachments' => $attachment, 'tasks' => $task]);
    }

    /**
     * Funkce zobrazí souhrné informace ke všem projektům podle zadané paginace.
     *
     * @return Application|Factory|View
     */
    public function all(): Application|Factory|View
    {
        $projects = projectRepository()->getAllProjects(request(['search']))->paginate(10);
        $projects->map(function ($project) {$project->setAuthor(userRepository()->getUsernameById($project->getAuthorId())->getUsername());});
        $projectIDs = $projects->map(function ($project) {return $project->getId();});
        $taskStatuses = taskRepository()->getTaskStatusAndTypeByProjectId($projectIDs->all());
        return view('project.layout.all', [
            'projects' => $projects,
            'mistakes' => $this->getCountTaskStatuses($projects, $taskStatuses, 'mistake'),
            'requirements' => $this->getCountTaskStatuses($projects, $taskStatuses, 'requirement'),

        ]);
    }

    /**
     * Funkce ke každému projektu z $projects vrátí pole, které obsahuje projectID a počty stavů jednotlivých úkolů.
     *
     * @param $projects
     * @param $tasksl
     * @param string $type
     * @return mixed
     */
    public function getCountTaskStatuses($projects, $tasks, string $type)
    {
        return $projects->map(function ($project) use ($type, $tasks) {
            $projectsTasksStatus = $tasks->filter(function ($tasks) use ($project, $type) {
                return $tasks->project_id == $project->getId() && $tasks->type == $type;
            });
            return [
                'projectId' => $project->getId(),
                'status' => [
                    'new' => $projectsTasksStatus->filter(function ($task) {
                        return $task->state == 'new';
                    })->count(),
                    'in process' => $projectsTasksStatus->filter(function ($task) {
                        return $task->state == 'in process';
                    })->count(),
                    'denied' => $projectsTasksStatus->filter(function ($task) {
                        return $task->state == 'denied';
                    })->count(),
                    'done' => $projectsTasksStatus->filter(function ($task) {
                        return $task->state == 'done';
                    })->count(),
                ]];
        })->collect();
    }

    /**
     * Funkce zajišťuje vytvoření nového projektu.
     *
     * @return Application|RedirectResponse|Redirector
     */
    public function store(): Application|RedirectResponse|Redirector
    {
        $attributes = \request()->validate([
            'name' => ['required', 'max:100', 'min:3'],
            'description' => ['required', 'max:250'],
        ]);
        $attributes['user_id'] = Auth::id();
        projectRepository()->createProject($attributes);
        return redirect('/projects');
    }

    /**
     * Funkce zajituje úpravu projektu $project.
     *
     * @param Project $project
     * @return Application|RedirectResponse|Redirector
     */
    public function edit(Project $project): Application|RedirectResponse|Redirector
    {
        if (Auth::id() == $project->user_id)
        {
            $attributes = \request()->validate([
                'name' => ['required', 'max:80', 'min:3'],
                'description' => ['required']
            ]);

            $notifiedUsers = $project->notification();
            $notification = new ProjectNotification($project);
            foreach ($notifiedUsers as $notifyUser)
            {
                $notifyUser->user->notify($notification);
            }

            projectRepository()->updateProject($project->id, $attributes);
            return redirect('/projects/' . $project->id);
        }
        return redirect('/projects');
    }

    /**
     * Funkce zajišťuje odstarenění projektu $project.
     *
     * @param Project $project
     * @return Application|RedirectResponse|Redirector
     */
    public function delete(Project $project): Application|RedirectResponse|Redirector
    {
        projectRepository()->deleteProject($project->id);
        return redirect('/projects');
    }
}
