<?php

namespace App\Http\Controllers;

class NotificationController extends Controller
{
    public function read($id)
    {
        $notification = auth()->user()
            ->notifications()
            ->findOrFail($id);

        $notification->markAsRead();

        return redirect()->route('vacancies.show', [
            'id' => $notification->data['id'],
            'slug' => $notification->data['slug']
        ])->with('toast', [
            'type' => "success",
            'message' => "Notification marked as read"
        ]);
    }

    public function readAll()
    {
        $user = auth()->user();
        $hasUnread = $user->unreadNotifications()->exists();

        if ($hasUnread) {
            $user->unreadNotifications->markAsRead();
        }

        return back()->with('toast', [
            'type' => $hasUnread ? 'success' : 'info',
            'message' => $hasUnread
                ? 'All notifications marked as read'
                : 'No unread notifications',
        ]);
    }

}
