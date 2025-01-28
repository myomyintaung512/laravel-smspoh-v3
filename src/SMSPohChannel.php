<?php

namespace myomyintaung512\LaravelSmspoh;

use Illuminate\Notifications\Notification;

class SMSPohChannel
{
    protected $smspoh;

    public function __construct(SMSPoh $smspoh)
    {
        $this->smspoh = $smspoh;
    }

    public function send($notifiable, Notification $notification)
    {
        if (!method_exists($notification, 'toSMSPoh')) {
            throw new \Exception('Notification class must implement toSMSPoh() method.');
        }

        $message = $notification->toSMSPoh($notifiable);

        if (is_string($message)) {
            $message = ['message' => $message];
        }

        if (!isset($message['to'])) {
            if (!$to = $notifiable->routeNotificationFor('smspoh', $notification)) {
                throw new \Exception('No recipient number provided.');
            }
            $message['to'] = $to;
        }

        return $this->smspoh->send($message['to'], $message['message']);
    }
}
