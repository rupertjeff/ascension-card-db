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

Route::get('cards', ['uses' => 'CardController@index', 'as' => 'cards.index']);
Route::get('cards/{uuid}', ['uses' => 'CardController@show', 'as' => 'cards.show']);
Route::get('expansions', ['uses' => 'ExpansionController@index', 'as' => 'expansions.index']);
Route::get('expansions/{uuid}', ['uses' => 'ExpansionController@show', 'as' => 'expansions.show']);

Route::get('/', function () {
    return view('welcome');
});
