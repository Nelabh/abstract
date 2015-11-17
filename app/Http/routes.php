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

Route::get('buyer',array( 'as'=>'bdc','uses'=>'testing\BDController@home'));
Route::post('request',array( 'before'=>'csrf','uses'=>'testing\BDController@request'));
Route::get('information',array( 'as'=>'info','uses'=>'testing\BDController@info'));
Route::get('detail',array( 'as'=>'pro_detail','uses'=>'testing\ProductController@index'));
