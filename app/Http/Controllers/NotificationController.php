<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Notifications\DatabaseNotification;

class NotificationController extends Controller
{
    public function read(DatabaseNotification $notification)
    {
        $notification->markAsRead();

        return redirect($notification->data['url']);
    }
    
    public function readAll(DatabaseNotification $notification)
    {
        auth()->user()->unreadNotifications->markAsRead();

        return redirect(route('notifications.index'));
    }
    
}
