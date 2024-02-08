<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class InformationNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public function __construct()
    {
        $this->information = $information;
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
            'date' => $this->information->date,
            'title' => $this->information->title,
            'content' => $this->information->content,
             //  通知からリンクしたいURLがあれば設定しておくと便利
             'url' => route('/', ['information' => $this->information])
        ];
    }
    
    public function store(Request $request)
    {
        $information = Information::create([
            'date' => $request->get('date'),
            'title' => $request->get('title'),
            'content' => $request->get('content'),
        ]);
        
        $user = User::find($request->get('user_id'));
        $user->notify(
            new InformationNotification($information)
        );
    }
}
