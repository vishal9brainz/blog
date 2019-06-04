<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

/*Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
*/
Route::group(['prefix'=>'users'],function()
{

Route::get('view_all','Usercontroller@index');
Route::get('view_user/{id}','Usercontroller@show');
Route::post('add_user','Usercontroller@store');
Route::post('update_user/{id}','Usercontroller@update');
Route::post('delete/{id}','Usercontroller@destroy');

});