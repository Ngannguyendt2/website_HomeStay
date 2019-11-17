<?php

namespace App\Notifications;

use App\House;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewHouse extends Notification
{
    use Queueable;

    private $new_house;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(House $new_house)
    {
        $this->new_house = $new_house;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
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
            ->line('Có nhà mới cần phê duyệt sếp ơi ')
            ->action('Phê duyệt nhà mới', route('admin.houses.approve', $this->new_house->id));
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
            //
        ];
    }
}
