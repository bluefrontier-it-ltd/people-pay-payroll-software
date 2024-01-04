<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ClientApprovedPayroll extends Notification
{
    use Queueable;

    private $payrunStatus;

    /**
     * Create a new notification instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {

        // Customize the greeting based on the time of the day
        $greeting = now()->hour < 12 ? 'Good morning' : 'Good afternoon';

        // Customize the payrun status (replace with your logic)
        $payrunStatus = 'In Progress'; // Replace with actual payrun status

        // Customize the ACM details (replace with your ACM details)
        $acmName = 'John Doe'; // Replace with actual ACM name
        $acmContactDetails = 'Email: john.doe@example.com, Phone: +1 123-456-7890'; // Replace with actual ACM contact details

        // Build the mail message
        return (new MailMessage)
            ->greeting("{$greeting}, {$notifiable->first_name}")
            ->line("This email is to notify you that the status for pay run {$notifiable->payrunIdentifier} has changed and is currently:")
            ->line("Payrun Status: {$payrunStatus}")
            ->line("If you have any questions, please contact your account manager, {$acmName}, at {$acmContactDetails}")
            ->line('Best regards,')
            ->line('People Pay Global');

        /* Test for later */
        // $user = User::find(1); // Replace with your user retrieval logic
        // $payrunIdentifier = 'ABC123'; // Replace with the actual payrun identifier
        // $user->notify(new PayRunStatusChanged($payrunIdentifier));
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
