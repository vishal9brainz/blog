<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use OneSignal;

use App\Http\Requests\Validate_data;


class mycontroller extends Controller
{
  public function index()
  {
  	$userId='51812297-1504-4cd5-90cc-f9d5628ce88f';
  	return OneSignal::sendNotificationToUser("Hello", $userId, $url = null, $data = null);
	/*return view('reg');*/
  }

  public function check_data(Validate_data $request)
  {
	return $data=$request->get('hobby');
  }
}
