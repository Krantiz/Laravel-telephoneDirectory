<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::auth();

//Route to show directory
Route::get('/home', 'ContactsController@show');

//Route to display welcome Image.
Route::get('/', function () {
    return view('welcome');
});

//Route to add contact
Route::get('/add-contacts', function () {
    return view('addContact');
});

//Post call to save entries in DB
Route::post('/add', ['as' => 'add', 'uses' => 'ContactsController@store']);