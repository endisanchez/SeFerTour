<?php

use Illuminate\Support\Facades\Route;

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
    return view('index');
})->name('inicio');

Route::group(['middleware' => ['web']], function () {
    Route::get('/', function () {
        return view('index');
    });
    Route::get('lang/{lang}', function ($lang) {
        session(['lang' => $lang]);
        return \Redirect::back();
    })->where([
        'lang' => 'en|es'
    ]);
});

Auth::routes(['verify' => true]);

Route::get('/tours/{provincia}', '\App\Http\Controllers\TourController@toursProvincia')->name('provincia');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::put('/perfil', '\App\Http\Controllers\PerfilController@editarPerfil' )->name('editarPerfil');

Route::put('/admin', '\App\Http\Controllers\adminController@editarPerfilAdmin' )->name('editarperfiladmin')->middleware('administrador');

Route::view('/tours', 'tours');

Route::view('/perfil', 'perfil');

Route::view('/admin', 'admin')->middleware('administrador');

Route::view('/verify', 'auth/verify');

Route::delete('/eliminarUser/{lugar}', '\App\Http\Controllers\adminController@eliminar')->name('verSitio')->middleware('administrador');

Route::post('/recuperarUser', '\App\Http\Controllers\adminController@recuperarUser')->name('recuperarUser')->middleware('administrador');

Route::delete('/eliminar/{id}', '\App\Http\Controllers\adminController@eliminarTour')->name('eliminarTour')->middleware('administrador');

Route::get('/editar/{id}', '\App\Http\Controllers\adminController@editarUsuario')->name('editarUsuario')->middleware('administrador');

Route::post('/nuevaFoto', '\App\Http\Controllers\PerfilController@nuevaFoto')->name('nuevaFoto');

Route::view('/reservar', 'reservas')->middleware('auth')->middleware('email_verificado');

Route::post('altaUsuario', '\App\Http\Controllers\adminController@create')->name('altaUsuario')->middleware('administrador');

Route::get('/eliminarFoto', '\App\Http\Controllers\PerfilController@eliminarFoto' )->name('eliminarFoto');

Route::get('/admin', '\App\Http\Controllers\adminController@mostrarAdminBlade' )->middleware('auth')->middleware('administrador');

Route::delete('/eliminarUser/{id}', '\App\Http\Controllers\adminController@eliminar')->name('eliminarUsuario')->middleware('administrador');

Route::delete('/eliminar/{id}', '\App\Http\Controllers\adminController@eliminarTour')->name('eliminarTour')->middleware('administrador');

Route::get('/editar/{id}', '\App\Http\Controllers\adminController@editarUsuario')->name('editarUsuario')->middleware('administrador');

Route::post('/nuevaFoto', '\App\Http\Controllers\PerfilController@nuevaFoto')->name('nuevaFoto');

Route::view('/reservar', 'reservas')->middleware('auth')->middleware('email_verificado');

Route::post('/reservar', 'App\Http\Controllers\ReservasController@crearReserva')->name('crearReserva')->middleware('auth')->middleware('email_verificado');

Route::get('/reservar', 'App\Http\Controllers\ReservasController@verReservas')->middleware('auth')->middleware('email_verificado');

Route::get('/cancelarReserva/{id}', 'App\Http\Controllers\ReservasController@cancelarReserva')->name('cancelarReserva')->middleware('auth');

Route::post('register', 'App\Http\Controllers\Auth\RegisterController@register');

Route::post('/filtroTours', 'App\Http\Controllers\TourController@filtroTours')->name('filtrar')->middleware('auth')->middleware('email_verificado');

Route::view('/misTours', 'misTours')->middleware('auth');

Route::post('/misTours', 'App\Http\Controllers\TourController@nuevoTour')->middleware('auth')->name('nuevoTour');

Route::get('/misTours', 'App\Http\Controllers\TourController@toursGuia')->middleware('auth');

Route::get('/misTours/{id}', 'App\Http\Controllers\TourController@eliminarTourguia')->middleware('auth')->name('eliminarTourguia');
