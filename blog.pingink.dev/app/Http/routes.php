<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', 'Front\IndexController@index');
Route::get('article', 'Front\IndexController@article');



Route::group(['middleware' => 'Master'], function()
{
    Route::get('edit', 'Front\IndexController@edit');
    Route::post('save', 'Front\IndexController@save');

});



//Route::get('imglist', 'Front\QnController@imglist');