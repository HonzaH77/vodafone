<?php

namespace App\Attachment;

interface AttachmentItemInterface
{
    function getId(): string;
    function getFilePath(): string;
    function getFileName(): string;
    function getCreatedAt(): string;
}
