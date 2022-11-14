<?php

namespace App\Traits;

use Illuminate\Http\Request;


trait AttachmentTrait
{
    /**
     * Trait, slouží k validaci a ukládání příloh k projektům.
     *
     * @param Request $request
     * @return array
     */
    public function verifyAndUpload(Request $request): array
    {
        $request->validate([
            'file_name' => ['file', 'max:1500'],
        ]);

        $fileName = $request->file('file_name')->getClientOriginalName();
        $filePath = $request->file('file_name')->store("public/attachments");
        $file = [];
        $file['name'] = $fileName;
        $file['path'] = $filePath;
        return $file;
    }
}
