<?php

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('welcome', function () {
    return view('welcome');
});


Route::get('/my', function () {
    return view('welcome');
});

Route::get('/about', function () {
    return view('about');
})->name('about');
Route::get('/contacts', function () {
    return view('contacts');
})->name('contacts');
Route::post('/contact/submit', 'App\Http\Controllers\ContactController@submit')
    ->name('formForContact');
Route::get('/contact/all', 'app\Http\Controllers\ContactController@allMessages')
    ->name('AllContacts');
Route::get('/contact/all/{id}', 'app\Http\Controllers\ContactController@ShowOneMessage')
    ->name('OneContact');
Route::get('/contact/all/{id}/update',
    'app\Http\Controllers\ContactController@UpdateMessage')
    ->name('UpdateContact');
Route::post('/contact/all/{id}/update',
    'app\Http\Controllers\ContactController@UpdateMessageSubmit')
    ->name('UpdateContactSubmit');
Route::get('/contact/all/{id}/delete',
    'app\Http\Controllers\ContactController@DeleteMessage')
    ->name('DeleteContact');

