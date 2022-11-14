<?php

namespace App\Attachment;

interface AttachmentItemInterface
{
    public function getId(): string;
    public function getFilePath(): string;
    public function getFileName(): string;
    public function getCreatedAt(): string;
}
