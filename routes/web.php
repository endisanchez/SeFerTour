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

Route::view('/verify', 'Auth/verify');

Route::view('/reservar', 'reservas')->middleware('auth');

Route::post('/reservar', 'App\Http\Controllers\ReservasController@crearReserva')->name('crearReserva')->middleware('auth');
