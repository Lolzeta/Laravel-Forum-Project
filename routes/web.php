<?php

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

// Static pages
Route::get('/', 'PagesController@index')->name('root');
Route::get('/contact', 'PagesController@contact')->name('contact');
Route::get('/about', 'PagesController@about')->name('about');

// Routes for Room entities
Route::resource('/rooms', 'RoomsController');

// Route for Message entities
Route::resource('/messages', 'MessagesController');
Route::get('/messages/data/{idMessage}', 'MessagesController@returnMessage');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


// Route for Community entities
Route::resource('/communities', 'CommunitiesController');