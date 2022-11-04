<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Task;
use App\Notifications\ProjectNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;


class ProjectController extends Controller
{
    public function index()
    {
        return view('projects', [
            'projects' => Project::latest()->filter(request(['search']))->paginate()
        ]);
    }

    public function store()
    {
        if (Auth::check())
        {
            $attributes = \request()->validate([
                'name' => ['required', 'max:100', 'min:3'],
                'description' => ['required', 'max:250'],
            ]);
            $project = Project::create(['user_id' => Auth::id()] + $attributes);
            return redirect('/projects/' . $project->id);
        }

        return redirect('/login');
    }

    public function edit(Project $project)
    {
        if (Auth::id() == $project->user_id)
        {
            $attributes = \request()->validate([
                'name' => ['required', 'max:80', 'min:3'],
                'description' => ['required']
            ]);

            $notifiedUsers = $project->notification();

            $notification = new ProjectNotification($project);
            foreach ($notifiedUsers as $notifyUser)
            {
                $notifyUser->user->notify($notification);
            }

            Project::where('id', $project->id)->update($attributes);
            return redirect('/projects/' . $project->id);
        }
        return redirect('/projects');
    }

    public function delete(Project $project)
    {
        Project::where('id', $project->id)->delete();
        return redirect('/projects');
    }

    public function storeFile(Request $request)
    {
        $path = Storage::putFile('public.files', $request->file('file'));
    }

    public function uploadFile(Request $request)
    {

        // Validation
        $request->validate([
            'file' => 'required|mimes:png,jpg,jpeg,csv,txt,pdf|max:2048'
        ]);

        if ($request->file('file'))
        {
            $file = $request->file('file');
            $filename = time() . '_' . $file->getClientOriginalName();

            // File upload location
            $location = 'files';

            // Upload file
            $file->move($location, $filename);

            Session::flash('message', 'Upload Successfully.');
            Session::flash('alert-class', 'alert-success');
        } else
        {
            Session::flash('message', 'File not uploaded.');
            Session::flash('alert-class', 'alert-danger');
        }

        return redirect('/');
    }
}
