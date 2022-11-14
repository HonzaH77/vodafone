<?php

namespace App\Driver\MySQL;

use App\Driver\MySQL\NotificationItem;
use App\Notifications\NotificationRepositoryInterface;
use Illuminate\Support\Facades\DB;
use \Illuminate\Support\Collection;

class NotificationRepository implements NotificationRepositoryInterface
{

    public function store(array $attributes): void
    {
        DB::table('notifications')->insert($attributes);
    }

    public function getNotificationById(int $id): NotificationItem
    {
        $notification = DB::table('notifications')
            ->select('notifications.id', 'notifications.user_id AS userId', 'notifications.project_id AS projectId', 'notifications.created_at AS createdAt')
            ->where('notifications.id', '=', $id)->get();
        return new NotificationItem($notification->id, $notification->userId, $notification->projectId, $notification->createdAt);
    }

    public function getAllNotificationByProjectId(int $id): Collection
    {
        $notifications = DB::table('histories')
            ->select('notifications.id', 'notifications.user_id AS userId', 'notifications.project_id AS projectId', 'notifications.created_at AS createdAt')
            ->where('notifications.project_id', '=', $id);

        return collect($notifications->get())->map(function ($notification){
            return new NotificationItem($notification->id, $notification->userId, $notification->projectId, $notification->createdAt);
        });
    }
}
