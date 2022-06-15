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




Route::get('/ticket', 'App\Http\Controllers\TicketController@test');

Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('home');
Route::get('/nouveau-ticket', 'App\Http\Controllers\TicketController@create');
Route::post('/nouveau-ticket', 'App\Http\Controllers\TicketController@store');
Route::get('/mes_tickets', 'App\Http\Controllers\TicketController@userTickets');
Route::get('/tickets/{ticket_id}', 'App\Http\Controllers\TicketController@show');
Route::post('/commentaire', 'App\Http\Controllers\CommentaireController@postComment');


Route::group(['prefix' => 'admin', 'middleware' => 'admin'], function (){
    Route::get('/tickets', 'App\Http\Controllers\TicketController@index');
    Route::post('/close_ticket/{ticket_id}', 'App\Http\Controllers\TicketController@close');
});

/*Route::group(['prefix' => 'dev', 'middleware' => 'dev'], function (){
    Route::get('/tickets', 'App\Http\Controllers\TicketController@index');
    Route::post('close_ticket/{ticket_id}', 'App\Http\Controllers\TicketController@close');
});*/

Auth::routes();

Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('home');
