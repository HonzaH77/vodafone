<?php

namespace App\Providers;

use App\Comment\CommentRepositoryInterface;
use App\Driver\MySQL\CommentRepository;
use Illuminate\Support\ServiceProvider;

class CommentRepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register comments services.
     *
     * @return void
     */
    public function register()
    {
        include_once __DIR__ . '/../Helpers/CommentHelper.php';
        $this->app->bind(CommentRepositoryInterface::class, CommentRepository::class);
    }

    /**
     * Bootstrap any comments services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
