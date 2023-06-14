<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ContactForm extends Notification
{
    use Queueable;

    private $request;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($request)
    {
        $this->request = $request;
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
            ->subject('Pedido de contacto')
            ->greeting('O seguinte cliente pediu um contacto.')
            ->line('<strong>Nome: </strong> ' . $this->request->name)
            ->line('<strong>Email: </strong> ' . $this->request->email)
            ->line('<strong>Telefone: </strong> ' . $this->request->phone)
            ->line('<strong>Endereço: </strong> ' . $this->request->address)
            ->line('<strong>Tipo de prestação de serviços: </strong> ' . $this->request->type)
            ->line('<strong>Assunto: </strong> ' . $this->request->subject);
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