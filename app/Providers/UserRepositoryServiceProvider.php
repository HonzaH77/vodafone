<?php

namespace App\Providers;

use App\Driver\MySQL\UserRepository;
use App\User\UserRepositoryInterface;
use Carbon\Laravel\ServiceProvider;

class UserRepositoryServiceProvider extends ServiceProvider
{

    /**
     * Register users services.
     *
     * @return void
     */
    public function register()
    {
        include_once __DIR__ . '/../Helpers/UserHelper.php';
        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
    }

    /**
     * Bootstrap any users services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
