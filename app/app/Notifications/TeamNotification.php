<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class TeamNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public function __construct($userTeam, $team_id, $users, $user,$dateEtHeure)
    {
        $this->userTeam = $userTeam;
        $this->team_id = $team_id;
        $this->users = $users;
        $this->user = $user;
        $this->dateEtHeure = $dateEtHeure;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail', 'database'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->line($this->users->name."".__('notifications.add_name'))
            ->line(__('notifications.who_add')."".$this->user->name)
            ->line(__('notifications.hours')."".$this->dateEtHeure);
    }
    
    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            "nameadd" => $this->users->name,   
            "whoadd" => $this->user->name,
            "created_at" => $this->dateEtHeure
        ];
    }
}
