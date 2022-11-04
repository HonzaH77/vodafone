<?php

namespace App\Http\Controllers;

use App\Models\History;
use App\Models\Project;
use App\Models\Task;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    public function index()
    {
        return view('tasks', [
            'tasks' => Task::latest()
                ->filter(request(['search']))
                ->filter(request(['type']))
                ->filter(request(['state']))
                ->paginate()
        ]);
    }

    public function store(Project $project)
    {
        if (Auth::check())
        {
            $attributes = \request()->validate([
                'name' => ['required', 'max:80', 'min:3'],
                'endDate' => ['required', 'date'],
                'type' => ['required'],
            ]);


            Task::create(['state' => 'new', 'user_id' => Auth::id(), 'project_id' => $project->id] + $attributes);
            return redirect('/projects/' . $project->id);
        }
        return redirect('/login');
    }

    public function edit(Task $task)
    {
        if (Auth::id() == $task->user_id)
        {
            $attributes = \request()->validate([
                'name' => ['required', 'max:80', 'min:3'],
                'endDate' => ['required', 'date'],
                'type' => ['required'],
                'state' => ['required'],
            ]);

            Task::where('id', $task->id)->update($attributes);

        }
        $attributes = \request()->validate([
            'state' => ['required'],
            'comment' => ['max:150']
        ]);

        History::create(['task_id' => $task->id] + $attributes);
        return redirect('/tasks/' . $task->id);
    }

    public function delete(Task $task)
    {
        Task::where('id', $task->id)->delete();
        return redirect('/tasks');
    }
}
