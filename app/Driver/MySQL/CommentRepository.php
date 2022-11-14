<?php

namespace App\Driver\MySQL;

use App\Comment\CommentRepositoryInterface;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class CommentRepository implements CommentRepositoryInterface
{

    /**
     * Funkce vrátí kolekci všech komentářů patřících k projektu $id.
     *
     * @param int $id
     * @return Collection
     */
    public function getCommentByProjectId(int $id): Collection
    {
        $comments =  DB::table('comments')
            ->select('comments.id', 'comments.text', 'comments.created_at AS createdAt', 'users.username AS author')
            ->join('users', 'comments.user_id', '=', 'users.id')
            ->where('comments.project_id', '=', $id);

        return collect($comments->get())->map(function ($comment){
            return new CommentItem($comment->id, $comment->text, $comment->author, $comment->createdAt);
        });
    }
}
