<?php

namespace App\Notifications;

use App\Models\Comment\Comment;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class CommentNotification extends Notification
{
    use Queueable;

    private $comment,$article;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Comment $comment,$article)
    {
        $this->comment = $comment;
        $this->article = $article;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database', 'broadcast'];

    }

    public function toArray($notifiable)
    {
        return \Mirovit\NovaNotifications\Notification::make()
            ->info('A new Comment From '.$this->comment->user->name .' .')
            ->subtitle('There is a new comment On   - ' . $this->article . ' Article!')
            ->routeDetail('comments', $this->comment->id)
            ->toArray();


    }
}
