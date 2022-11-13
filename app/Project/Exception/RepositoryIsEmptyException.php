<?php

namespace App\Project\Exception;

use Exception;

class RepositoryIsEmptyException extends Exception
{
    /**
     * Get the exception's context information.
     *
     * @return string
     */
    public function context(): string
    {
        return 'ProjectID is not in the database';
    }
}
