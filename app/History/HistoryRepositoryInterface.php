<?php

namespace App\History;

use Illuminate\Support\Collection;

interface HistoryRepositoryInterface
{
    public function getHistoryByTaskId(int $id): Collection;

    public function store(array $attributes): void;

}
