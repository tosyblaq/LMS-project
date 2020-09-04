<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class NewQuestionAdded extends Notification implements ShouldQueue
{
    use Queueable;

    public $course;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($c)
    {
        //
        $this->course = $c;
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
                    ->greeting('Hello, From Grey Hat Cyber Solutions')
                    ->line('A new question has been added to your course. Please create a time to reply to it.')
                    ->action('View Question', route('academy.showcourse', ['id' => $this->course->id, 'slug' => $this->course->slug, 'categoryId' => $this->course->category_id]))
                    ->line('Thank you!');
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
