<?php

namespace App\Providers;

use App\Driver\MySQL\TaskRepository;
use App\SearchQueryBuilder\TaskSearchQueryBuilder;
use App\SearchQueryBuilder\TaskSearchQueryBuilderInterface;
use App\Task\TaskRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class TaskSearchQueryBuilderServiceProvider extends ServiceProvider
{
    /**
     * Register tasks search builder services.
     *
     * @return void
     */
    public function register()
    {
        include_once __DIR__ . '/../Helpers/TaskHelper.php';
        $this->app->bind(TaskSearchQueryBuilderInterface::class, TaskSearchQueryBuilder::class);
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
