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
    Route::get('teams', 'AdminController@teams')->name('admin_teams');
    Route::get('team/add', 'AdminController@addTeam')->name('add_team');
    Route::get('/team/{id}/edit', 'AdminController@editTeam')->name('edit_team');

    Route::get('players', 'AdminController@players')->name('admin_players');
    Route::get('player/add', 'AdminController@addPlayer')->name('add_player');
    Route::get('player/edit/{id}', 'AdminController@editPlayer')->name('edit_player');
});

