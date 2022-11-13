<?php

namespace App\Driver\MySQL;

use App\HIstory\HistoryRepositoryInterface;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;

class HistoryRepository implements HistoryRepositoryInterface
{
    public function getHistoryByTaskId(int $id): Collection
    {
        $history = DB::table('histories')
            ->select('histories.id', 'histories.state', 'histories.comment', 'histories.created_at AS createdAt')
            ->where('histories.task_id', '=', $id);
        return collect($history->get())->map(function ($history){
           return new HistoryItem($history->id, $history->state, $history->comment, $history->createdAt);
        });
    }
}
