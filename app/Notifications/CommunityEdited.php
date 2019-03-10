<?php

namespace App\Notifications;

use App\Community;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class CommunityEdited extends Notification
{
    use Queueable;

    public $community;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Community $community)
    {
        $this->community = $community;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail', 'database'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
        ->subject('Notification: Community Edited - ' . $this->community->name)
        ->greeting('Great News!')
        ->line($this->community->name .' community has been edited.')
        ->action('Community Info', url('/communities/'. $this->community->slug))
        ->line('Thank you for using our application!')
        ->salutation('Powered by '.config('app.name'));
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            'community'  =>  $this->community
        ];
    }
}
