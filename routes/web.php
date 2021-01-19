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

Route::view('/tours', 'tours');

Route::view('/perfil', 'perfil');

Route::view('/admin', 'admin');

Route::view('/verify', 'Auth/verify');

Route::delete('/eliminarUser/{lugar}', '\App\Http\Controllers\adminController@eliminar')->name('verSitio');

Route::post('storage', '\App\Http\Controllers\Auth\RegisterController@save')->name('storage');

Route::post('altaUsuario', '\App\Http\Controllers\adminController@create')->name('altaUsuario');

Route::get('/eliminarFoto', '\App\Http\Controllers\PerfilController@eliminarFoto' )->name('eliminarFoto');

Route::get('/admin', '\App\Http\Controllers\adminController@mostrarAdminBlade' )->middleware('auth');

Route::delete('/eliminarUser/{id}', '\App\Http\Controllers\adminController@eliminar')->name('eliminarUsuario');

Route::delete('/eliminar/{id}', '\App\Http\Controllers\adminController@eliminarTour')->name('eliminarTour');

Route::get('/editar/{id}', '\App\Http\Controllers\adminController@editarUsuario')->name('editarUsuario');

Route::post('/nuevaFoto', '\App\Http\Controllers\PerfilController@nuevaFoto')->name('nuevaFoto');

Route::view('/reservar', 'reservas')->middleware('auth');

Route::post('/reservar', 'App\Http\Controllers\ReservasController@crearReserva')->name('crearReserva')->middleware('auth');

Route::get('/reservar', 'App\Http\Controllers\ReservasController@verReservas')->middleware('auth');

Route::get('/cancelarReserva/{id}', 'App\Http\Controllers\ReservasController@cancelarReserva')->name('cancelarReserva')->middleware('auth');
