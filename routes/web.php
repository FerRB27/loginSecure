<?php

use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Route::view('registrate', 'registrate')->middleware('guest')->name('registrate');
Route::view('login', 'login')->middleware('guest')->name('login');
/**
 * Refer to: Illuminate\Auth\Middleware\Authenticate class
 * look for "protected function unauthenticated"
 */
Route::view('contenido', 'contenido.contenido')->middleware('auth')->name('contenido');

Route::post('registrate',[LoginController::class, 'registrate'])->name('registrate.registrate');
Route::post('login',[LoginController::class, 'login'])->name('login.login');
Route::get('logout',[LoginController::class, 'destroy'])->name('logout.destroy');