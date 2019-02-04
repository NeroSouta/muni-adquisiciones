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

//Juego con la Documentación de wor
Route::get('create','DocumentController@create'); //Extra
Route::post('store','DocumentController@store');	//Extra
Route::get('generate-docx', 'DocumentController@generateDocx');//Extra
Route::get('generar', 'DocumentController@generar');
Route::get('generarplantilla', 'DocumentController@generarplantilla');
//Extra

//Configuraciones
Route::get('/configuraciones', function () {
    return view('configurations');
});
Route::get('/configuracion-informe', function () {
    return view('configuration');
});
Route::get('/start', 'HomeController@start'); //Extra, para jugar

// El perfil de cada usuario del sistema 
Route::get('/miperfil', 'UserController@miperfil');
Route::post('/miperfil',array('as'=>'mi_update','uses'=>'UserController@miupdate'));



// Todo lo del perfil administrador
Route::group(['middleware' => 'admin', 'namespace' =>'Admin'], function () {
    
    Route::get('/usuarios', 'UserController@index');
    Route::post('/usuarios', 'UserController@store');
	Route::get('/usuario/{id}', 'UserController@edit');
	Route::get('/usuarios', 'UserController@share')->name('buscar');
	Route::post('/usuario/{id}', 'UserController@update');

	Route::get('/usuario/{id}/eliminar', 'UserController@delete');


});
