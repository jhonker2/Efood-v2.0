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



/*
RUTAS PARA EL LOGIN 
*/

Route::group(['middleware' => ['web']], function () {
	Route::get('/', function () {
	if (Auth::guest()){
			 return view('welcome');
    	}else{
    		 return Redirect::to('home');
    	}
    });
	Route::post('logeo',array('as'=>'login', 'uses'=>'LoginController@store'));
	Route::get('logout','LoginController@logout');
	Route::resource('home','HomerController');

	Route::resource('usuario','UsuariosController');
	Route::resource('producto','ProductoController');

});


Route::get('/lista_usuarios','UsuariosController@lista');