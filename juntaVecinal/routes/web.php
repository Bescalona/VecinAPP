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
    //return view('index');
    return redirect()->route('home');
}); 
/*RUTAS GRAFICO ARRIENDO*/
Route::get('/grafArriendo',[
	'uses'=> 'GrafarriendoController@index',
	'as'=> 'grafarriendo.index',
]); 

/*RUTAS INSCRIBIR*/
Route::get('/tallerIns',[
	'uses'=> 'TallerinsController@index',
	'as'=> 'tallerins.index',
]); 

/*RUTAS PDF*/
Route::get('vecino_pdf', 'VecinoController@pdf')->name('vecinos.pdf');
Route::get('arriendo_pdf', 'ArriendoController@pdf')->name('arriendos.pdf');
Route::get('cuota_pdf', 'CuotaController@pdf')->name('cuotas.pdf');
Route::get('servicio_pdf', 'ServicioController@pdf')->name('servicios.pdf');
Route::get('anuncio_pdf', 'AnuncioController@pdf')->name('anuncios.pdf');
Route::get('taller_pdf', 'TallerController@pdf')->name('talleres.pdf');
/*RUTAS VECINO*/ 

Route::get('/vecino',[
	'uses'=> 'VecinoController@index',
	'as'=> 'vecino.index',
]); 

Route::delete('/vecino/{id}', [
	'uses'=> 'VecinoController@destroy',
	'as'=> 'vecino.destroy',
]);

Route::get('/vecino/{id}/edit', [
	'uses'=> 'VecinoController@edit',
	'as'=> 'vecino.edit',
]);

Route::put('/vecino/{id}', [
	'uses'=> 'VecinoController@update',
	'as'=> 'vecino.update',
]);

Route::post('/vecino', 'VecinoController@store');

/*RUTAS ANUNCIO*/

Route::get('/anuncio',[
	'uses'=> 'AnuncioController@index',
	'as'=> 'anuncio.index',
]); 

Route::delete('/anuncio/{id}', [
	'uses'=> 'AnuncioController@destroy',
	'as'=> 'anuncio.destroy',
]);

Route::get('/anuncio/{id}/edit', [
	'uses'=> 'AnuncioController@edit',
	'as'=> 'anuncio.edit',
]);

Route::put('/anuncio/{id}', [
	'uses'=> 'AnuncioController@update',
	'as'=> 'anuncio.update',
]); 

Route::post('/anuncio', 'AnuncioController@store');

/*RUTAS TALLER*/

Route::get('/taller',[
	'uses'=> 'TallerController@index',
	'as'=> 'taller.index',
]); 

Route::delete('/taller/{id}', [
	'uses'=> 'TallerController@destroy',
	'as'=> 'taller.destroy',
]);

Route::get('/taller/{id}/edit', [
	'uses'=> 'TallerController@edit',
	'as'=> 'taller.edit',
]);

Route::put('/taller/{id}', [
	'uses'=> 'TallerController@update',
	'as'=> 'taller.update',
]); 

Route::post('/taller/inscribir', [
	'uses'=> 'TallerController@inscribir',
	'as'=> 'taller.inscribir',
]);

Route::post('/taller', [
	'uses'=> 'TallerController@store',
	'as'=> 'taller.store',
]);

//Route::post('/taller', 'TallerController@store');

/*RUTAS ARRIENDO*/

Route::get('/arriendo',[
	'uses'=> 'ArriendoController@index',
	'as'=> 'arriendo.index',
]); 

Route::delete('/arriendo/{id}', [
	'uses'=> 'ArriendoController@destroy',
	'as'=> 'arriendo.destroy',
]);

Route::get('/arriendo/{id}/edit', [
	'uses'=> 'ArriendoController@edit',
	'as'=> 'arriendo.edit',
]);

Route::put('/arriendo/{id}', [
	'uses'=> 'ArriendoController@update',
	'as'=> 'arriendo.update',
]); 

Route::post('/arriendo', 'ArriendoController@store'); 

/*RUTAS SERVICIO*/

Route::get('/servicio',[
	'uses'=> 'ServicioController@index',
	'as'=> 'servicio.index',
]); 

Route::delete('/servicio/{id}', [
	'uses'=> 'ServicioController@destroy',
	'as'=> 'servicio.destroy',
]);

Route::get('/servicio/{id}/edit', [
	'uses'=> 'ServicioController@edit',
	'as'=> 'servicio.edit',
]);

Route::put('/servicio/{id}', [
	'uses'=> 'ServicioController@update',
	'as'=> 'servicio.update',
]); 

Route::post('/servicio', 'ServicioController@store');

/*RUTAS CUOTA*/

Route::get('/cuota',[
	'uses'=> 'CuotaController@index',
	'as'=> 'cuota.index',
]); 

Route::delete('/cuota/{id}', [
	'uses'=> 'CuotaController@destroy',
	'as'=> 'cuota.destroy',
]);

Route::get('/cuota/{id}/edit', [
	'uses'=> 'CuotaController@edit',
	'as'=> 'cuota.edit',
]);

Route::put('/cuota/{id}', [
	'uses'=> 'CuotaController@update',
	'as'=> 'cuota.update',
]); 

Route::post('/cuota', 'CuotaController@store');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
