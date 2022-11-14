<?php

namespace App\Jobs;

use App\Driver\MySQL\ProjectItem;
use App\Models\Project;
use App\Notifications\ProjectNotification;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use function App\Helpers\notificationRepository;
use function App\Helpers\projectRepository;

class ProcessNotification implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected ProjectItem $project;

    /**
     * Create a new job instance.
     *
     * @param int $projectId
     */
    public function __construct(int $projectId)
    {
        $this->project = projectRepository()->getProjectById($projectId);
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(): void
    {

        $notifiedUsers = notificationRepository()->getAllNotificationByProjectId($this->project->getId());
        $notification = new ProjectNotification($this->project);
        foreach ($notifiedUsers as $notifyUser)
        {
            $notifyUser->user->notify($notification);
        }
    }
}
