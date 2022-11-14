<?php

namespace App\Parser;

interface SearchQueryParserInterface
{
    public static function parseQuery(string $query): array;
}
