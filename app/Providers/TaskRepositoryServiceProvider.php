<?php

namespace App\Providers;

use App\Driver\MySQL\TaskRepository;
use App\Task\TaskRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class TaskRepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register tasks services.
     *
     * @return void
     */
    public function register()
    {
        include_once __DIR__ . '/../Helpers/TaskHelper.php';
        $this->app->bind(TaskRepositoryInterface::class, TaskRepository::class);
    }

    /**
     * Bootstrap any tasks services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
