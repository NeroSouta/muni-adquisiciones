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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/welcome2', function () {
	return view('welcome_copia');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('create','DocumentController@create'); //Extra
Route::post('store','DocumentController@store');	//Extra
Route::get('generate-docx', 'DocumentController@generateDocx');//Extra

Route::get('/start', 'HomeController@start');//Extra

Route::get('/configuracion-informe', function () {	//Extra
    return view('configuration');
});


Route::group(['middleware' => 'admin', 'namespace' =>'Admin'], function () {
    
    Route::get('/usuarios', 'UserController@index');
    Route::post('/usuarios', 'UserController@store');
	Route::get('/usuario/{id}', 'UserController@edit');

	Route::post('/usuario/{id}', 'UserController@update');

	Route::get('/usuario/{id}/eliminar', 'UserController@delete');


});
