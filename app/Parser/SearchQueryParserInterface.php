<?php

namespace App\Parser;

interface SearchQueryParserInterface
{
    function parseQuery(): array;
}
