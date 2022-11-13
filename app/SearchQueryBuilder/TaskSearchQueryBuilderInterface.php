<?php

namespace App\SearchQueryBuilder;

use Illuminate\Database\Query\Builder;

interface TaskSearchQueryBuilderInterface
{
    public static function search(array $filter): Builder;
}
