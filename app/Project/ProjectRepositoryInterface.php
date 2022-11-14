<?php

namespace App\Project;

use App\Driver\MySQL\ProjectItem;
use Illuminate\Support\Collection;

interface ProjectRepositoryInterface
{
    public function getAllProjects(array $projectFilter): Collection;

    public function getProjectById(int $id): ProjectItem;

    public function updateProject(int $id, array $attributes): void;

    public function deleteProject(int $id): void;

    public function createProject(array $attributes): void;
}
