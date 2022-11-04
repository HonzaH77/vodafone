<?php

namespace App\Providers;

use App\Attachment\AttachmentRepositoryInterface;
use App\Driver\MySQL\AttachmentRepository;
use Illuminate\Support\ServiceProvider;

class AttachmentRepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register attachments services.
     *
     * @return void
     */
    public function register()
    {
        include_once __DIR__ . '/../Helpers/AttachmentHelper.php';
        $this->app->bind(AttachmentRepositoryInterface::class, AttachmentRepository::class);
    }

    /**
     * Bootstrap any attachments services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
