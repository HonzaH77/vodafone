<?php

namespace App\Project;

use App\Driver\MySQL\ProjectItem;
use Illuminate\Support\Collection;

interface ProjectRepositoryInterface
{
    function getAllProjects(array $projectFilter): Collection;

    function getProjectById(int $id): ProjectItem;

    function updateProject(int $id, array $attributes): void;

    function deleteProject(int $id): void;

    function createProject(array $attributes): void;
}
