<?php

namespace App\Providers;

use App\Driver\MySQL\HistoryRepository;
use App\History\HistoryRepositoryInterface;
use Illuminate\Support\ServiceProvider;


class HistoryRepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register Task history services.
     *
     * @return void
     */
    public function register(): void
    {
        include_once __DIR__ . '/../Helpers/HistoryHelper.php';
        $this->app->bind(HistoryRepositoryInterface::class, HistoryRepository::class);
    }

    /**
     * Bootstrap any Task history services.
     *
     * @return void
     */
    public function boot(): void
    {

    }
}
