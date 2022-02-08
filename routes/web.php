<?php

use Illuminate\Support\Facades\Route;
use App\Mail\ContactMessage;
use Illuminate\Support\Facades\Mail;


Route::get('/', 'HomeController@index')->name('home');
Route::get('/ticket', 'TicketsController@index')->name('ticket.index');
Route::get('/ticket/{slug}', 'TicketsController@show')->name('ticket.show');
Route::get('/ticket/{slug?}/edit', 'TicketsController@edit')->name('ticket.edit');
Route::put('/update/{slug}','TicketsController@update')->name('ticket.update');
Route::post('/ticket/{slug?}/delete', 'TicketsController@destroy')->name('ticket.delete');
Route::get('/contact', 'TicketsController@create')->name('ticket.create');
Route::post('/contact', 'TicketsController@store')->name('ticket.store');
Route::get('/reload-captcha', 'TicketsController@refreshCaptcha')->name('reload.captcha');

Auth::routes(['register' => false, 'reset' => false, 'verify' => false]);

// Route::get('/info', function() {
// phpinfo();
// });