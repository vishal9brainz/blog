<?php
  
namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class InvoicePaid extends Notification
{


    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct()
    {
      
        //$this->toMail($user);
        // 
        
       // $this->email=$data['email'];
        //$this->name=$data['name'];
        //$this->link=$data['link'];
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
                    ->subject('check')  //passing subject
                     /*->attach(public_path('pdf').'/er.pdf', 
                        [
            'as' => 'vishal.pdf',                //senf pdf file
            'mime' => 'application/pdf'
                     ])*/
                    ->line('Hello')
                    ->action('Notification Action',url('/'))
                    ->line('Thank you for using our application testing!');
                   
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
           
        ];
    }
}
