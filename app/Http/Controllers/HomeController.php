<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Mail;
use App\Domain\Admin\Datatables\UserDatatableScope;
use App\Notifications\InvoicePaid;
use Illuminate\Notifications\Notifiable;
use App\Domain\Util\MailUtility;
use Notification;
use Carbon\Carbon;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
   
        $this->middleware('auth:web');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(UserDatatableScope $datatable)
    {
        dd($datatable);
        if (request()->ajax())
         {
            return $datatable->query();
         }
        return view('home',['html'=>$datatable->html(),'user'=>'home']);
    }

}
