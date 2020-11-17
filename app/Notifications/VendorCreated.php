<?php

namespace App\Notifications;

use App\Models\Vendor;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class VendorCreated extends Notification
{
    use Queueable; //job

    public $vendor;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Vendor $vendor)
    {
        $this -> vendor = $vendor;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        // نطام النرنتفيميشن ايه ؟؟
        //database , sms, slack
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)

    // الايميل الي رح يتبعت فيه

    {
        $subject = sprintf('%s: لقد تم انشاء حسابكم في موقع الامامي %s!', config('app.name'), 'ahmed');
        $greeting = sprintf('مرحبا %s!', $notifiable->name);

        return (new MailMessage)
            ->subject($subject)
            ->greeting($greeting)
            ->salutation('Yours Faithfully')
            ->line('The introduction to the notification.')
            ->action('Notification Action', url('/'))
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
