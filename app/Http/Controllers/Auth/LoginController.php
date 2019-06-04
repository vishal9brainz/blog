<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Socialite;
use App\User;
use Auth;
class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:web')->except('logout');
    }

    public function logout(Request $request)
    {


        $this->guard()->logout();

       // $request->session()->invalidate();

        return redirect('/');
    }


    public function redirectToProvider()
    {
       // return Socialite::driver('google')->redirect();
        return Socialite::driver('facebook')->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallback()
    {
        //$user = Socialite::driver('google')->user();
         $user = Socialite::driver('facebook')->user();
         dd($user);
       /*
       dd($user);*/
    }


    private function findOrCreateUser($facebookuser)
    {
        $authUser = User::where('facebook_id', $facebookuser->id)->first();

        if ($authUser){
            return $authUser;
        }

        return User::create([
            'name' => $facebookuser->name,
            'email' => $facebookuser->email,
            'facebook_id' => $facebookuser->id,
            'password' =>bcrypt('1234')//you can generate random for user as you wiss to next time login
        ]);
    }



}
