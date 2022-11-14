<?php

namespace App\Notifications;

use App\Driver\MySQL\ProjectItem;
use App\Models\Project;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use function App\Helpers\projectRepository;

class ProjectNotification extends Notification
{
    use Queueable;

    protected ProjectItem $project;

    /**
     *Create a new notification instance.
     *
     * @param int $projectId
     * @return void
     */
    public function __construct(int $projectId)
    {

        $this->project = projectRepository()->getProjectById($projectId);
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param mixed $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param mixed $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable): MailMessage
    {
        return (new MailMessage)
            ->line('Project' . $this->project->getName() . 'has been changed!')
            ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param mixed $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
