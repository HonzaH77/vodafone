<?php

namespace App\Http\Controllers;

use App\Models\Attachment;
use App\Models\Project;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\StreamedResponse;
use App\Traits\AttachmentTrait;


class AttachmentController extends Controller
{
    use AttachmentTrait;

    /**
     * Funkce zajišŤuje stažení souboru $sttachment přiložené k projektu $project.
     *
     * @param Project $project
     * @param Attachment $attachment
     * @return StreamedResponse
     */
    public function download(Project $project, Attachment $attachment): StreamedResponse
    {
        return Storage::download($attachment->file_path);
    }

    /**
     * Funkce zajišťuje uložení přílohy k projektu $project.
     *
     * @param Project $project
     * @return Application|RedirectResponse|Redirector
     */
    public function store(Project $project): Application|RedirectResponse|Redirector
    {

        $file = $this->verifyAndUpload(\request());
        Attachment::create(['user_id' => Auth::id(), 'project_id' => $project->id,
            'file_name' => $file['name'], 'file_path' => $file['path']]);
        return redirect('/projects/' . $project->id);
    }
}
