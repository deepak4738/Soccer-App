<?php


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\EnsureTokenIsValid;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::name('api.')->group(function () {
    Route::get('/teams', 'TeamController@teams')->name('teams');
    Route::get('/team/{id}', 'PlayerController@getPlayers')->name('getPlayers');
    Route::get('/players', 'PlayerController@players')->name('players');
    Route::get('/player/{id}', 'PlayerController@getPlayer')->name('getPlayer');

    Route::middleware([EnsureTokenIsValid::class])->group(function () {
        Route::post('/add/team', 'TeamController@addTeam')->name('addTeam');
        Route::post('/edit/team', 'TeamController@updateTeam')->name('editTeam');
        Route::get('/team-details/{id}', 'TeamController@teamDetail')->name('teamDetail');
        Route::post('/delete/team', 'TeamController@deleteTeam')->name('deleteTeam');
        
        Route::post('/add/player', 'PlayerController@addPlayer')->name('addPlayer');
        Route::post('/edit/player', 'PlayerController@updatePlayer')->name('editPlayer');
        Route::get('/player-details/{id}', 'PlayerController@playerDetail')->name('playerDetail');
        Route::post('/delete/player', 'PlayerController@deletePlayer')->name('deletePlayer');    
    });

});
