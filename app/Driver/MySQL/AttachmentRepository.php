<?php

namespace App\Driver\MySQL;

use App\Attachment\AttachmentRepositoryInterface;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class AttachmentRepository implements AttachmentRepositoryInterface
{
    /**
     * Funkce vrátí kolekci všech příloh patřících k projektu $id.
     *
     * @param int $id
     * @return Collection
     */
    public function getAttachmentByProjectId(int $id): Collection
    {
        $attachments = DB::table('attachments')
            ->select('attachments.id', 'attachments.file_name AS fileName', 'attachments.file_path AS filePath', 'attachments.created_at AS createdAt')
            ->where('attachments.project_id', '=', $id);

        return collect($attachments->get())->map(function ($attachment) {
            return new AttachmentItem($attachment->id, $attachment->fileName, $attachment->filePath, $attachment->createdAt);
        });
    }
}
