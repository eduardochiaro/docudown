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

Route::get('/', [
  'uses' => 'indexController@index',
  'as' => 'index'
]);
Route::get('/{folder}/{reference}', [
  'uses' => 'FilesController@showSingle',
  'as' => 'file_page'
]);
