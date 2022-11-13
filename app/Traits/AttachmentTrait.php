<?php

namespace App\Traits;

use App\Models\Project;
use Illuminate\Http\Request;


trait AttachmentTrait
{
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
