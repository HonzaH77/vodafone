<?php

namespace App\Jobs;

use App\Models\Project;
use App\Notifications\ProjectNotification;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class ProcessNotification implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected Project $project;

    /**
     * Create a new job instance.
     *
     * @param Project $project
     */
    public function __construct(Project $project)
    {
        $this->project = $project;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(): void
    {
        $notifiedUsers = $this->project->notification();
        $notification = new ProjectNotification($this->project);
        foreach ($notifiedUsers as $notifyUser)
        {
            $notifyUser->user->notify($notification);
        }
    }
}
