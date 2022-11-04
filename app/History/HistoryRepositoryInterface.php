<?php

namespace App\History;

use Illuminate\Support\Collection;

interface HistoryRepositoryInterface
{
function getHistoryByTaskId(int $id): Collection;
}
