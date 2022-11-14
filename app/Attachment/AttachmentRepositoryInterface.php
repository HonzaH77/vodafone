<?php

namespace App\Attachment;

use App\Driver\MySQL\AttachmentItem;
use Illuminate\Support\Collection;

interface AttachmentRepositoryInterface
{
    public function getAttachmentByProjectId(int $id): Collection;

    public function getAttachmentById(int $id): AttachmentItem;

    public function store(array $attributes): void;
}
