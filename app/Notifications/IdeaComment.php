<?php

namespace App\Notifications;

use App\Models\IdeaComments;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class IdeaComment extends Notification
{
    use Queueable;
    
    private IdeaComments $ideacomments;

    /**
     * Create a new notification instance.
     */
    public function __construct(IdeaComments $ideacomments)
    {
        $this->ideacomments = $ideacomments;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['database'];
    }

    /**
     * Get the mail representation of the notification.
     */
    

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            'date' => $this->ideacomments->created_at,
            'idea_id' => $this->ideacomments->idea_id,
            'user_id' => $this->ideacomments->user_id,
            'user_name' => $this->ideacomments->user->name,
            'url' => route('idea.show', ['idea' => $this->ideacomments->idea_id])
        ];
    }
}
