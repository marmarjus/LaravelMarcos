<?php

/**
 * Archivo de rutas
 *
 * Este archivo permite a la aplicación acceder a las vistas
 * mediante rutas que crea.
 * Incluye las rutas a métodos CRUD de controladores y
 * a métodos independientes.
 *
 * @author Marcos Martínez Justicia
 *
 * @version 1.0
 */

use App\Http\Controllers\EventsController;
use App\Http\Controllers\MessagesController;
use App\Http\Controllers\PlayersController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MiscellaneousController;
use App\Http\Controllers\ProductsController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



Route::get('/', [MiscellaneousController::class, 'index'])
    ->name('index');

Route::get('location', [MiscellaneousController::class, 'location'])
    ->name('location.index');

Route::get('cookiesPolicy', [MiscellaneousController::class, 'cookiesPolicy'])
    ->name('cookies.policy');

Route::get('cookiesSettings', [MiscellaneousController::class, 'cookiesSettings'])
    ->name('cookies.settings');

Route::get('privacyPolicy', [MiscellaneousController::class, 'privacyPolicy'])
    ->name('privacy.policy');

Route::get('terms', [MiscellaneousController::class, 'terms'])
    ->name('privacy.terms');



Route::get('signup', [LoginController::class, 'signupForm'])->name('signupForm');
Route::post('signup', [LoginController::class, 'signup'])->name('signup');
Route::get('login', [LoginController::class, 'loginForm'])->name('loginForm');
Route::post('login', [LoginController::class, 'login'])->name('login');
Route::get('logout', [LoginController::class, 'logout'])->name('logout');



Route::post('messages/read', [MessagesController::class, 'toggleRead'])->name('messages.read');

Route::post('events/like/{event}', [EventsController::class, 'toggleLike'])->name('events.like');

Route::delete('events/dislike/{event}', [EventsController::class, 'toggleDislike'])->name('events.dislike');



Route::resource('events', EventsController::class);

Route::resource('players', PlayersController::class);

Route::resource('messages', MessagesController::class);

Route::resource('products', ProductsController::class);

Route::resource('user', UsersController::class);



Route::resource('/players', PlayersController::class)
    ->only('show')->middleware('auth');

Route::resource('/events', EventsController::class)
    ->only(['show', 'edit'])->middleware('auth');

Route::resource('/messages', MessagesController::class)
    ->only('index')->middleware('auth');

Route::get('/account', function () {
    return view('users.account');
})->name('users.account')
    ->middleware('auth');
