<?php

namespace App\Comment;

use Illuminate\Support\Collection;

interface CommentRepositoryInterface
{
    function getCommentByProjectId(int $id): Collection;
}
