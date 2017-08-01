<?php

namespace Illuminate\Auth\Notifications;

use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;

class ResetPassword extends Notification
{
    /**
     * The password reset token.
     *
     * @var string
     */
    public $token;

    /**
     * Create a notification instance.
     *
     * @param  string  $token
     * @return void
     */
    public function __construct($token)
    {
        $this->token = $token;
    }

    /**
     * Get the notification's channels.
     *
     * @param  mixed  $notifiable
     * @return array|string
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Build the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->line('तपाइले अथवा अरु कसैले पासवर्ड रेसेट गर्नको लागी अनुरोध गरेको हुनाले यो इमेल पाउनु भएको हो l')
            ->action('रिसेट गर्नुहोस', url(config('app.url').route('password.reset', $this->token, false)))
            ->line('यदि तपाइले पासवर्ड रिसेट गर्न अनुरोध नगर्नु भएको भए चिन्ता गर्नुपर्दैन l तपाइको पासवर्ड परिवर्तन हुनेछैन l');
    }
}
