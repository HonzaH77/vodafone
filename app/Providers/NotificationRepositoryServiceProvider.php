<?php

namespace App\Providers;

use App\Driver\MySQL\HistoryRepository;
use App\Driver\MySQL\NotificationRepository;
use App\History\HistoryRepositoryInterface;
use App\Notifications\NotificationRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class NotificationRepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        include_once __DIR__ . '/../Helpers/HistoryHelper.php';
        $this->app->bind(NotificationRepositoryInterface::class, NotificationRepository::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
