<?php

namespace App\Notifications;

use App\Room;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class RoomEdited extends Notification
{
    use Queueable;

    public $room;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Room $room)
    {
        $this->room = $room;
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
        ->subject('Notification: Room Edited - ' . $this->room->name)
        ->greeting('Great News!')
        ->line($this->room->name.' room has been edited.')
        ->action('Room Info', url('/rooms/'. $this->room->slug))
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
            'room'  =>  $this->room
        ];
    }
}
