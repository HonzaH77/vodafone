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
    function getAttachmentByProjectId(int $id): Collection
    {
        return DB::table('attachments')
            ->select('attachments.id', 'attachments.file_name', 'attachments.file_path', 'attachments.created_at')
            ->where('attachments.project_id', '=', $id)
            ->get();
    }
}
