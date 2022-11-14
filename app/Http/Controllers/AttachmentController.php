<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\StreamedResponse;
use App\Traits\AttachmentTrait;
use function App\Helpers\attachmentRepository;
use function App\Helpers\projectRepository;


class AttachmentController extends Controller
{
    use AttachmentTrait;

    /**
     * Funkce zajišŤuje stažení souboru $sttachment přiložené k projektu $project.
     *
     * @param int $projectId
     * @param int $attachmentId
     * @return StreamedResponse
     */
    public function download(int $projectId, int $attachmentId): StreamedResponse
    {
        $attachment = attachmentRepository()->getAttachmentById($attachmentId);
        return Storage::download($attachment->getFilePath());
    }

    /**
     * Funkce zajišťuje uložení přílohy k projektu $project.
     *
     * @param int $projectId
     * @return Application|RedirectResponse|Redirector
     */
    public function store(int $projectId): Application|RedirectResponse|Redirector
    {
        $project = projectRepository()->getProjectById($projectId);
        $file = $this->verifyAndUpload(\request());
        $file['user_id'] = Auth::id();
        $file['project_id'] = $project->getId();
        attachmentRepository()->store($file);
        return redirect('/projects/' . $project->getId());
    }
}
