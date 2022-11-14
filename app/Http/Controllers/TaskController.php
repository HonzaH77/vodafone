<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;
use function App\Helpers\historyRepository;
use function App\Helpers\projectRepository;
use function App\Helpers\taskRepository;

class TaskController extends Controller
{
    /**
     * Funkce zobrazí veškeré informace k úkolu s ID = $taskId.
     *
     * @param int $taskId
     * @return Application|Factory|View
     */
    public function index(int $taskId): Application|Factory|View
    {
        $task = taskRepository()->getTaskById($taskId);
        $history = historyRepository()->getHistoryByTaskId($taskId);
        return view('task.layout.index', ['task' => $task, 'history' => $history]);
    }

    /**
     * FUnkce zajišťuje zobrazení seznamu všech úkolů.
     *
     * @return Application|Factory|View
     */
    public function all(): Application|Factory|View
    {
        $tasks = taskRepository()->getAllTasks(request(['search', 'type', 'state']))->paginate(10);
        $tasks->map(function ($task) {
            $task->setProjectName(projectRepository()->getProjectById($task->getProjectId())->getName());
        });
        return view('task.layout.all', ['tasks' => $tasks]);
    }

    /**
     * Funkce zajišťuje uložaní úkolu.
     *
     * @param int $projectId
     * @return Application|RedirectResponse|Redirector
     */
    public function store(int $projectId): Application|RedirectResponse|Redirector
    {
        $project = projectRepository()->getProjectById($projectId);
        $attributes = \request()->validate([
            'name' => ['required', 'max:80', 'min:3'],
            'endDate' => ['required', 'date'],
            'type' => ['required'],
        ]);

        taskRepository()->createTask(['state' => 'new', 'user_id' => Auth::id(), 'project_id' => $project->getId()] + $attributes);
        return redirect('/projects/' . $project->getId());
    }

    /**
     * Funkce zajišťuje editaci úkolu.
     *
     * @param int $taskId
     * @return Application|RedirectResponse|Redirector
     */
    public function edit(int $taskId): Application|RedirectResponse|Redirector
    {
        $task = taskRepository()->getTaskById($taskId);
        if (Auth::id() == $task->getAuthorId())
        {
            $attributes = \request()->validate([
                'name' => ['required', 'max:80', 'min:3'],
                'endDate' => ['required', 'date'],
                'type' => ['required'],
                'state' => ['required'],
            ]);
            $task->setName($attributes['name']);
            $task->setEndDate($attributes['endDate']);
            $task->setType($attributes['type']);
        } else
        {
            $attributes = \request()->validate([
                'state' => ['required'],
            ]);
        }
        $task->setState($attributes['state']);
        $task->save();

        $attributes = \request()->validate([
            'state' => ['required'],
            'comment' => ['max:150']
        ]);

        historyRepository()->store(['task_id' => $task->getId()] + $attributes);
        return redirect('/tasks/' . $task->getId());
    }

    /**
     * Funkce zajišťuje odstranění úkolu $task.
     *
     * @param int $taskId
     * @return Application|RedirectResponse|Redirector
     */
    public function delete(int $taskId): Application|RedirectResponse|Redirector
    {
        $task = taskRepository()->getTaskById($taskId);
        taskRepository()->deleteTask($task->getId());
        return redirect('/tasks');
    }

}
