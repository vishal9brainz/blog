<?php
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('signal','mycontroller@index');
Route::get('/login/google', 'Auth\LoginController@redirectToProvider');
Route::get('callback', 'Auth\LoginController@handleProviderCallback');

Route::get('/login/facebook', 'Auth\LoginController@redirectToProvider');
Route::get('callback', 'Auth\LoginController@handleProviderCallback');




Route::any('send','SmsController@sendSms');


//Route::get('userr','mycontroller@index');

//Route::post('check_data','mycontroller@check_data')->name('check_data');




Route::group(['prefix' => 'admin','namespace' => 'Auth'], function ()
 {

 Route::get('password/reset', 'ForgotPasswordController@showLinkRequestForm')->name('admin:forgot:password');

 Route::post('password/email', 'ForgotPasswordController@sendResetLinkEmail')->name('post:admin:forgot:password');

Route::get('password/reset/{token}', 'ResetPasswordController@showResetForm')->name('admin:reset:password');

 Route::post('password/reset/{id}', 'ResetPasswordController@reset')->name('post:admin:reset:password');



 });
Route::get('/',function()
{

	OneSignal::sendNotificationToUser("Some Message", $userId, $url = null, $data = null);
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('admin','AdminController@index')->name('admin');
Route::prefix('admin')->group(function(){

	Route::get('login','Auth\AdminLoginController@showLoginForm');
	Route::post('login','Auth\AdminLoginController@login')->name('admin-login');
	Route::post('logout','Auth\AdminLoginController@logout')->name('admin-logout');


});
