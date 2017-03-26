<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
Route::get('/',function (){
    return view('welcome');
});

Route::resource('/discussion','DiscussionsController');


Route::group(['middleware' => ['web']], function () {
    //用户相关路由
    Route::get('user/register','UserController@register');
    Route::post('user/store','UserController@store');
    Route::get('user/login','UserController@login');
});

