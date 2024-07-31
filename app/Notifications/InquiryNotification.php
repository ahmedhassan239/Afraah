<?php

namespace App\Notifications;

use App\Models\Inquiry\Inquiry;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class InquiryNotification extends Notification
{
    use Queueable;

    private $inquiry,$model;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Inquiry $inquiry,$article)
    {
        $this->inquiry = $inquiry;
        $this->model = $article;
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
            ->info('A new Inquiry From '.$this->inquiry->user->name.' .')
            ->subtitle('There is a new Inquiry On   - ' . $this->model . ' Model!')
            ->routeDetail('inquiries', $this->inquiry->id)
            ->toArray();


    }
}
