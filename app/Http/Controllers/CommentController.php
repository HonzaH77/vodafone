<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;
use function App\Helpers\commentRepository;
use function App\Helpers\projectRepository;

class CommentController extends Controller
{
    /**
     * Funkce zajišťuje vytvoření nového komentáře.
     *
     * @param int $projectId
     * @return Application|RedirectResponse|Redirector
     */
    public function store(int $projectId) : Application|RedirectResponse|Redirector
    {
        $project = projectRepository()->getProjectById($projectId);
        $attributes = \request()->validate([
            'text' => ['required', 'max:500', 'min:3']
        ]);

        $attributes['user_id'] = Auth::id();
        $attributes['project_id'] = $project->getId();

        commentRepository()->store($attributes);

        return redirect('/projects/' . $project->getId());

    }
}
