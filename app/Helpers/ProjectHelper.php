<?php

namespace App\Helpers;
use App\Project\ProjectRepositoryInterface;

if (!function_exists(__NAMESPACE__ . 'ProjectRepository')) {
    /**
     * Helper, ktery vraci instanci repositare projectRepository.
     *
     * @return ProjectRepositoryInterface
     */
    function projectRepository(): ProjectRepositoryInterface
    {
        static $projectRepository = null;

        if (null === $projectRepository) {
            $projectRepository = app(ProjectRepositoryInterface::class);
        }

        return $projectRepository;
    }
}
