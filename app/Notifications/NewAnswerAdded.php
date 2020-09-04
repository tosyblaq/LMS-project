<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class NewAnswerAdded extends Notification implements ShouldQueue
{
    use Queueable;

    public $question;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($q)
    {
        $this->question = $q;
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
                    ->line('A reply has been added to your question.')
                    ->action('View Reply', route('answer.show', ['questionId' => $this->question->id, 'courseId' => $this->question->course_id, 'categoryId' => $this->question->category_id ]))
                    ->line('Thank you for using our application!');
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
