<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Project;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    /**
     * Funkce zajišťuje vytvoření nového komentáře.
     *
     * @param Project $project
     * @return Application|RedirectResponse|Redirector
     */
    public function store(Project $project) : Application|RedirectResponse|Redirector
    {
        $attributes = \request()->validate([
            'text' => ['required', 'max:500', 'min:3']
        ]);

        Comment::create(['user_id' => Auth::id(), 'project_id' => $project->id] + $attributes);
        return redirect('/projects/' . $project->id);

    }
}
