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
    return view('welcome');
});

Auth::routes();

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';


Route::get('/ticket', 'App\Http\Controllers\TicketController@test');

Route::get('/home', 'HomeController@index')->name('home');
Route::get('new-ticket', 'App\Http\Controllers\TicketController@create');
Route::post('new-ticket', 'App\Http\Controllers\TicketController@store');
Route::get('my_tickets', 'App\Http\Controllers\TicketController@userTickets');
Route::get('tickets/{ticket_id}', 'TicketController@show');
Route::post('comment', 'CommentsController@postComment');


Route::group(['prefix' => 'admin', 'middleware' => 'admin'], function (){
    Route::get('tickets', 'App\Http\Controllers\TicketController@index');
    Route::post('close_ticket/{ticket_id}', 'App\Http\Controllers\TicketController@close');
});

Route::group(['prefix' => 'dev', 'middleware' => 'dev'], function (){
    Route::get('tickets', 'App\Http\Controllers\TicketController@index');
    Route::post('close_ticket/{ticket_id}', 'App\Http\Controllers\TicketController@close');
});
