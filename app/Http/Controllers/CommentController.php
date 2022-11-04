<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Project;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(Project $project)
    {

        if (Auth::check())
        {
            $attributes = \request()->validate([
                'text' => ['required', 'max:500', 'min:3']
            ]);

            Comment::create(['user_id' => Auth::id(), 'project_id' => $project->id] + $attributes);
            return redirect('/projects/' . $project->id);
        }
        return redirect('/login');

    }
}
