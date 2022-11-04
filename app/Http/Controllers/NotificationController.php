<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    public function store($project)
    {
        if (Auth::check()) {
            Notification::create(['user_id' => Auth::id(), 'project_id' => $project]);
            return redirect('/projects');
        }
        return redirect('/login');
    }
}
