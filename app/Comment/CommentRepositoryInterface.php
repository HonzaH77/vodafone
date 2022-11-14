<?php

namespace App\Comment;

use Illuminate\Support\Collection;

interface CommentRepositoryInterface
{
    public function getCommentByProjectId(int $id): Collection;

    public function store(array $attributes): void;
}
