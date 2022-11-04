<?php

namespace App\Helpers;
use App\Attachment\AttachmentRepositoryInterface;

if (!function_exists(__NAMESPACE__ . 'AttachmentRepository')) {
    /**
     * Helper, ktery vraci instanci repositare attachmentRepository.
     *
     * @return AttachmentRepositoryInterface
     */
    function attachmentRepository(): AttachmentRepositoryInterface
    {
        static $attachmentRepository = null;

        if (null === $attachmentRepository) {
            $attachmentRepository = app(AttachmentRepositoryInterface::class);
        }

        return $attachmentRepository;
    }
}
