<?php

use Illuminate\Support\Facades\Route;
use App\Mail\ContactMessage;
use Illuminate\Support\Facades\Mail;

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

Route::get('/', 'PagesController@index')->name('home');
Route::get('/ticket', 'TicketsController@index')->name('ticket.index');
Route::get('/ticket/{slug}', 'TicketsController@show')->name('ticket.show');
Route::get('/ticket/{slug?}/edit', 'TicketsController@edit')->name('ticket.edit');
Route::put('/update/{slug}','TicketsController@update')->name('ticket.update');
Route::post('/ticket/{slug?}/delete', 'TicketsController@destroy')->name('ticket.delete');
Route::get('/contact', 'TicketsController@create')->name('ticket.create');
Route::post('/contact', 'TicketsController@store')->name('ticket.store');
Route::get('/reload-captcha', 'TicketsController@refreshCaptcha')->name('reload.captcha');

// Route::get('/send-mail', function () {
//     Mail::to('newuser@example.com')->send(new ContactMessage());
//     return 'A message has been sent to Mailtrap!';
// });