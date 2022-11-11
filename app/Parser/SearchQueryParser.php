<?php

namespace App\Parser;

use App\Models\Project;

class SearchQueryParser implements SearchQueryParserInterface
{
    protected string $query;

    public function __construct(string $query)
    {
        $this->query = $query;
    }

    function parseQuery(): array
    {
        $query = explode('/',$this->query);
        $parseQuery = array();
        foreach ($query as $q) {
            $parseQuery[] = '%' . $q . '%';
        }
        return $parseQuery;
    }
}
