<?php

namespace App\Driver\MySQL;

use App\Attachment\AttachmentItemInterface;

class AttachmentItem implements AttachmentItemInterface
{
    protected string $id;
    protected string $fileName;
    protected string $filePath;
    protected string $createdAt;

    public function __construct(string $id, string $fileName, string $filePath, string $createdAt)
    {
        $this->id = $id;
        $this->filePath = $filePath;
        $this->fileName = $fileName;
        $this->createdAt = $createdAt;
    }

    function getId(): string
    {
        return $this->id;
    }

    function getFilePath(): string
    {
        return $this->filePath;
    }

    function getFileName(): string
    {
        return $this->fileName;
    }

    function getCreatedAt(): string
    {
        return $this->createdAt;
    }
}
