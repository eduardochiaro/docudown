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
  