<?php

namespace App\Http\Controllers;

use App\Models\Attachment;
use App\Models\Project;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;


class AttachmentController extends Controller
{
    public function download(Project $project, Attachment $attachment)
    {
        return Storage::download($attachment->file_path);
    }

    public function store(Project $project)
    {
        $fileName = Request::file("file_name")->getClientOriginalName();
        $filePath = Request::file("file_name")->store("public/attachments");

        Attachment::create(['user_id' => Auth::id(), 'project_id' => $project->id,
            'file_name' => $fileName, 'file_path' => $filePath]);
        return redirect('/projects/' . $project->id);

    }
}
