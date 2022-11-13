<?php

namespace App\Http\Controllers;

use App\Models\History;
use App\Models\Project;
use App\Models\Task;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;
use Ramsey\Collection\Collection;
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
     * @return Application|Factory|View
     */
    public function all(): Application|Factory|View
    {
        $tasks = taskRepository()->getAllTasks(request(['search', 'type', 'state']))->paginate(10);
        $tasks->map(function ($task) {$task->setProjectName(projectRepository()->getProjectById($task->getProjectId())->getName());});
        return view('task.layout.all', ['tasks' => $tasks]);
    }

    /**
     * @param Project $project
     * @return Application|RedirectResponse|Redirector
     */
    public function store(Project $project): Application|RedirectResponse|Redirector
    {
        $attributes = \request()->validate([
            'name' => ['required', 'max:80', 'min:3'],
            'endDate' => ['required', 'date'],
            'type' => ['required'],
        ]);

        taskRepository()->createTask(['state' => 'new', 'user_id' => Auth::id(), 'project_id' => $project->id] + $attributes);
        return redirect('/projects/' . $project->id);
    }

    /**
     * @param Task $task
     * @return Application|RedirectResponse|Redirector
     */
    public function edit(Task $task): Application|RedirectResponse|Redirector
    {
        $task = taskRepository()->getTaskById($task->id);
        if (Auth::id() == $task->getAuthorId()) {
            $attributes = \request()->validate([
                'name' => ['required', 'max:80', 'min:3'],
                'endDate' => ['required', 'date'],
                'type' => ['required'],
                'state' => ['required'],
            ]);
            $task->setName($attributes['name']);
            $task->setEndDate($attributes['endDate']);
            $task->setType($attributes['type']);
        }
        else
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

        History::create(['task_id' => $task->getId()] + $attributes);
        return redirect('/tasks/' . $task->getId());
    }

    /**
     * @param Task $task
     * @return Application|RedirectResponse|Redirector
     */
    public function delete(Task $task): Application|RedirectResponse|Redirector
    {
        taskRepository()->deleteTask($task->id);
        return redirect('/tasks');
    }

}
