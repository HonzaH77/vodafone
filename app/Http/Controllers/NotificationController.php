<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    /**
     * Funkce zajišťuje vytvoření nového požadafku na informace k projektu.
     *
     * @param $project
     * @return Application|RedirectResponse|Redirector
     */
    public function store($project) : Application|RedirectResponse|Redirector
    {
        Notification::create(['user_id' => Auth::id(), 'project_id' => $project]);
        return redirect('/projects');
    }
}
