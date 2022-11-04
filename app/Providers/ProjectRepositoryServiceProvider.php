<?php

namespace App\Providers;

use App\Driver\MySQL\ProjectRepository;
use App\Project\ProjectRepositoryInterface;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use Illuminate\Support\ServiceProvider;


class ProjectRepositoryServiceProvider extends ServiceProvider
{

    /**
     * Register projects services.
     *
     * @return void
     */
    public function register(): void
    {
        include_once __DIR__ . '/../Helpers/ProjectHelper.php';
        $this->app->bind(ProjectRepositoryInterface::class, ProjectRepository::class);
    }

    /**
     * Bootstrap any projects services.
     *
     * @return void
     */
    public function boot(): void
    {
        Collection::macro('paginate', function($perPage, $total = null, $page = null, $pageName = 'page') {
            $page = $page ?: LengthAwarePaginator::resolveCurrentPage($pageName);
            return new LengthAwarePaginator(
                $this->forPage($page, $perPage), // $items
                $total ?: $this->count(),                  // $total
                $perPage,
                $page,
                [                                // $options
                    'path' => LengthAwarePaginator::resolveCurrentPath(),
                    'pageName' => $pageName,
                ]
            );
        });
    }
}
