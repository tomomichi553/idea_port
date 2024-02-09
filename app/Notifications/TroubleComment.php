<?php

namespace App\Notifications;

use App\Models\TroubleComments;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class TroubleComment extends Notification
{
    use Queueable;
    
    private TroubleComments $troublecomments;

    /**
     * Create a new notification instance.
     */
    public function __construct(TroubleComments $troublecomments)
    {
        $this->troublecomments = $troublecomments;
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
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            'date' => $this->troublecomments->created_at,
            'idea_id' => $this->troublecomments->trouble_id,
            'user_id' => $this->troublecomments->user_id,
            'user_name' => $this->troublecomments->user->name,
            'url' => route('trouble.show', ['trouble' => $this->troublecomments->trouble_id])
        ];
    }
}
