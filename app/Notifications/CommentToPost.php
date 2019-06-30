<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\BroadcastMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Carbon\Carbon;
use App\Post;
use App\Comment;
use App\User;

class CommentToPost extends Notification implements ShouldQueue
{
    use Queueable;
    public $comment;
    public $user;
    public $post;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Comment $comment, User $user, Post $post)
    {
        $this->comment = $comment;
        $this->user = $user;
        $this->post = $post;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail','database','broadcast'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->line('The introduction to the notification.')
                    ->action('Check Out Post', url('/post/'.$this->comment->post->id))
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
            'post' => $this->post,
            'comment' => $this->comment,
            'user' => $this->user

        ];
    }

    public function toBroadcast($notifiable)
    {
        return new BroadcastMessage([
            'post' => $this->post,
            'comment' => $this->comment,
            'user' => $this->user
        ]);
    }

    public function toDatabase($notifiable)
    {

        return [
            'post' => $this->post,
            'comment' => $this->comment,
            'user' => $this->user
        ];
    }
}
