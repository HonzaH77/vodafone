<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use App\Models\Project;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Support\Responsable;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class NotificationServe extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  Project $project
     * @return Application|RedirectResponse|Redirector
     */
    public function __invoke($project): Application|RedirectResponse|Redirector
    {
        Notification::create(['user_id' => Auth::id(), 'project_id' => $project]);
        return redirect('/projects');
    }
}
