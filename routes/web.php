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

// remove register route
Auth::routes(['register' => false]);

// Front controller for guest users
Route::get('/', 'FrontendController@index')->name('home');
Route::get('/team/{id}/players', 'FrontendController@getPlayers')->name('getPlayers');
Route::get('/player/{id}/team', 'FrontendController@getPlayer')->name('getPlayer');

Route::group(['prefix' => 'admin', 'middleware' => ['auth:web']], function () {
    Route::get('/', 'AdminController@show');
    Route::get('teams', 'AdminController@teams')->name('adminTeams');
    Route::get('team/add', 'AdminController@addTeam')->name('addTeam');
    Route::get('/team/{id}/edit', 'AdminController@editTeam')->name('editTeam');

    Route::get('players', 'AdminController@players')->name('adminPlayers');
    Route::get('player/add', 'AdminController@addPlayer')->name('addPlayer');
    Route::get('player/edit/{id}', 'AdminController@editPlayer')->name('editPlayer');
});

