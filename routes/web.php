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
    return view('home');
});

Route::get('/home', function () {
    return view('welcome');
});
Route::get('/welcome', function () {
    return view('welcome');
});




// Rotte PROGETTO
Auth::routes();

Route::get('/progetto'                   ,   'App\Http\Controllers\ProgettoController@index');
Route::get('/progetto/{progetto}/delete',   'App\Http\Controllers\ProgettoController@destroy');
Route::post('/progetto',                         'App\Http\Controllers\ProgettoController@save');
Route::get('/progetto/create',                  'App\Http\Controllers\ProgettoController@create');
Route::get('/progetto/{progetto}/edit',             'App\Http\Controllers\ProgettoController@edit');
Route::patch('/progetto/{progetto}',                  'App\Http\Controllers\ProgettoController@update');

// Rotte USER
Auth::routes();
//Route::resource('user','App\Http\Controllers\UserController')->except('destroy');
Route::get('/user',                         'App\Http\Controllers\UserController@index');
Route::post('/user',                         'App\Http\Controllers\UserController@store');
Route::get('/user/create',                  'App\Http\Controllers\UserController@create');
Route::get('/user/{user}/edit',             'App\Http\Controllers\UserController@edit');
Route::patch('/user/{id}',                  'App\Http\Controllers\UserController@update');
Route::get('/user/{user}/delete',           'App\Http\Controllers\UserController@destroy');

Route::get('/user/ore_spese',               'App\Http\Controllers\UserController@totale')->name('user.totale');
Route::post('/user/cerca',                  'App\Http\Controllers\UserController@cerca')->name('user.cerca');

// Rotte CLIENTE
Auth::routes();
Route::get('/cliente',                      'App\Http\Controllers\ClienteController@index');
Route::get('/cliente/create',               'App\Http\Controllers\ClienteController@create');
Route::get('/cliente/{cliente}/edit',       'App\Http\Controllers\ClienteController@edit');
Route::post('/cliente',                     'App\Http\Controllers\ClienteController@save');
Route::patch('/cliente/{ssid}',             'App\Http\Controllers\ClienteController@update');
Route::get('/cliente/{cliente}/delete',     'App\Http\Controllers\ClienteController@destroy');

Route::get('/cliente/ore_spese',            'App\Http\Controllers\ClienteController@totale')->name('cliente.totale');
Route::post('/cliente/cerca',               'App\Http\Controllers\ClienteController@cerca')->name('cliente.cerca');;

Route::post('/add-cliente',                 'App\Http\Controllers\ClienteController@addCliente')->name('cliente.add');


// Rotte TICKET
Auth::routes();

Route::get('/ticket',                       'App\Http\Controllers\TicketController@index');
Route::get('/ticket/create',                'App\Http\Controllers\TicketController@create');
Route::post('/ticket',                      'App\Http\Controllers\TicketController@save');
Route::get('/ticket/{ticket}/delete',       'App\Http\Controllers\TicketController@destroy');

Route::get('/ticket/ore_spese',             'App\Http\Controllers\TicketController@totale');
Route::post('/ticket/data',                 'App\Http\Controllers\TicketController@data');




// Rotte PROGETTI_UTENTI
Auth::routes();
Route::resource('progetti_utenti',                      'App\Http\Controllers\ProgettiUtentiController')->except('destroy');
Route::get('/progetti_utenti/{progetti_utenti}/delete', 'App\Http\Controllers\ProgettiUtentiController@destroy');
