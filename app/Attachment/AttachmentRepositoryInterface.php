<?php

namespace App\Attachment;

use Illuminate\Support\Collection;

interface AttachmentRepositoryInterface
{
    function getAttachmentByProjectId(int $id): Collection;
}
