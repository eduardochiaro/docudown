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
Route::get('/file/{filename}', [
  'uses' => 'FilesController@showSingle',
  'as' => 'file_page'
]);

Route::get('/json/scanfolder/{folder}', [
  'uses' => 'JsonController@scanFolder',
  'as' => 'json_scanfolder'
]);

Route::group(['prefix' => 'api/v1'], function () {
        Route::resource('/file', 'ApiDocumentsController',[
          'only' => ['index', 'show']]);
        Route::get('404', function(){
          var_dump('a');
        });
});
