<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Notification;
use App\User;

class SendReminderEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
       
        
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        //Sending Email to Multiple Users 
        $user=User::select('email')->get(); 
       
        Notification::send($user,new InvoicePaid($user));

        
        
    }
}
