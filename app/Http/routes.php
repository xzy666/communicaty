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




Route::group(['middleware' => ['web']], function () {
    //帖子资源路由
    Route::resource('/discussion','DiscussionsController');
    Route::post('/discussion/createDis','DiscussionsController@createDis');
    //用户相关路由
    Route::get('user/register','UserController@register');
    Route::post('user/store','UserController@store');
    Route::get('user/login','UserController@login');
    Route::get('user/logout','UserController@logout');
    Route::post('user/index','UserController@index');
});

