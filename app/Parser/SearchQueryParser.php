<?php

namespace App\Parser;


class SearchQueryParser implements SearchQueryParserInterface
{
    /**
     * Funkce slouží jako parser, který rozdělý $query pomocí znaku '/' a vrátí pole jednotlivých slov.
     *
     * @param string $query
     * @return array
     */
    public static function parseQuery(string $query): array
    {
        return explode('/',$query);
    }
}
