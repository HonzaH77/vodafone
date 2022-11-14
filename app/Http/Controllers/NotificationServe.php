<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Support\Responsable;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use function App\Helpers\notificationRepository;
use function App\Helpers\projectRepository;

class NotificationServe extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param int $projectId
     * @return Application|RedirectResponse|Redirector
     */
    public function __invoke(int $projectId): Application|RedirectResponse|Redirector
    {
        $project = projectRepository()->getProjectById($projectId);
        notificationRepository()->store(['user_id' => Auth::id(), 'project_id' => $project->getId(), 'created_at' => now(), 'updated_at' => now()]);
        return redirect('/projects');
    }
}
