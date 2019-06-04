<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use App\Http\Requests\EmailRequest;
use App\User;
use Mail;
use App\Notifications\InvoicePaid;
use Illuminate\Notifications\Notifiable;
use App\Domain\Util\MailUtility;
use Notification;
use Carbon\Carbon;
use App\Jobs\SendReminderEmail;

class ForgotPasswordController extends Controller
{
    
    use Notifiable;

    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    use SendsPasswordResetEmails;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function showLinkRequestForm()
    {
        return view('admin.auth.forgot-password');
    }

    public function sendResetLinkEmail(EmailRequest $request)
    {

     
   //Password Reset code 

     $user =User::whereEmail($request->get('email'))->first();
        $token = str_random(20) . time();
        $user->fill([
            'forgot_password_token' => $token
        ])->save();

        $data = [
            'name' => $user->username,
            'link' => route('admin:reset:password', $token)
        ];
        (new MailUtility())->sendMail('admin.emails.forgot-password', $data, $request->get('email'), 'Forgot Password.');
        session()->flash('success', 'Reset password link sent to your email.');

        

        return "Mail Send successs";//redirect karvu hoy tya

  
      

    //Sending Notifications To Multiple Users 


   /* $job = (new SendReminderEmail())
                    ->delay(Carbon::now()->addSeconds(2));
    dispatch($job);

    return "sending mail successs";*///redirect karvu hoy tya

    
    

    }
}
