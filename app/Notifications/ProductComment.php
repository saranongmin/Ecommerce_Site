<?php

namespace App\Notifications;

use App\Product;
use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ProductComment extends Notification
{
    use Queueable;

    public $user;
    public $product;
    public $body;
    /**
     * Create a new notification instance.
     *
     * @return void
     */

    public function __construct(Product $product, User $user, $body)
    {
        $this->product = $product;
        $this->user = $user;
        $this->body = $body;
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
                    ->line('Product notification.')
                    ->action('Notification Action', route('products.show', $this->product->id))
                    ->line('Product : '. $this->product->title)
                    ->line('Commented By : '. $this->user->name)
                    ->line('Comment : '. $this->body);
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
            'product_id' => $this->product->id,
            'commented_by' => $this->user->id,
            'body' => $this->body,
            ''
        ];
    }
}
