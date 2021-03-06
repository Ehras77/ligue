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

Route::get('/','HomeController@index');

//calendrier match saison pour ligue
Route::get('/calendrier/{season}','SeasonController@show');

//classements equipes ligue avec stats
Route::get('/league/teams','LeagueController@showTeamStats');
//Route::get('/classement/equipe/{league_id}/{team_id}','StatsController@showStatsTeam');

//joueur ligue classement stats
Route::get('/league/players','LeagueController@showPlayersStats');

//Route::get('/classement/joueur/{league_id}/{player_id}','StatsController@showstatsPlayer');

//page profil joueur, avec stats courantes, toutes les saisons
Route::get('/joueur/{player}','PlayerController@show');

//page profile equipe, resume stats saison actuelle, choix changer saison
Route::get('/equipe/{team}','TeamController@show');

//interface gestion team admin qui permet d'effacter et d'ajouter des joueurs a son equipe (middleware et policy), changer nom equipe
Route::get('/edit/{team_id}','TeamController@edit');

//interface gestion admin site (ajouter/supprimer) joueur, ligue,saison,equipe (middleware et policy)
Route::get('/admin','AdminController@index');

//voir stats d'un match (feuille match)
Route::get('/match/{match}','MatchController@show');

//filtrer classemeent eqeuipes par ligue et saison
Route::get('/classement','StatsController@Show'); //queryString de league, equipe et saison et joueur
//filtrer classement joueur par ligue et saison


//filtrer calendrier match par equipe
Route::get('/calendrier/{team_id}/{match_id}','MatchController@calendrier');

//(HTTP) seuls eles teamadmin doivent avoir acces aux routes pour modifier les joueurs de leur equipe
//seul les admins peuvent avoir acces aux routes pour dediter les equipes les saisons et les ligues
//POLICY ET MIDDLEWARE

//Create routes
Route::get('/create/user','UserController@create');
Route::post('/create/user','UserController@store');

Route::get('/create/team','TeamController@create');
Route::post('/create/team','TeamController@store');

Route::get('/create/joueur','PlayerController@create');
Route::post('/create/joueur','PlayerController@addPlayer');

Route::get('/create/league','LeagueController@create');
Route::post('/create/league','LeagueController@store');

Route::get('/create/season','SeasonController@create');
Route::post('/create/season','SeasonController@store');

Route::get('/create/match','MatchController@create');
Route::post('/create/match','MatchController@store');

//Edit routes
Route::get('/edit/user/{user_id}','UserController@create');
Route::post('/edit/user/{user_id}','UserController@update');

Route::get('/edit/team/{team}','TeamController@editForm');
Route::post('/edit/team/{team}','TeamController@store');

Route::get('/edit/joueur/{joueur_id}','PlayerController@create');
Route::post('/edit/joueur/{joueur_id}','PlayerController@update');

Route::get('/edit/league/{league_id}','LeagueController@create');
Route::post('/edit/league/{league_id}','LeagueController@update');

Route::get('/edit/season/{season_id}','SeasonController@create');
Route::post('/edit/season/{season_id}','SeasonController@update');

Route::get('/edit/match','MatchController@create');
Route::post('/edit/match','MatchController@update');

//Delete routed test caliss de criss

Route::post('/delete/user/{user_id}','UserController@destroy');

Route::post('/delete/team/{team_id}','TeamController@destroy');

Route::post('/delete/joueur/{player_id}','PlayerController@destroy');

Route::post('/delete/league/{league_id}','LeagueController@destroy');

Route::post('/delete/season/{season_id}','SeasonController@destroy');

Route::post('/delete/match/{match_id}','MatchController@destroy');

//Marquer un match

$api = app('Dingo\Api\Routing\Router');

$api->version('v1', function ($api) {

    $api->get('users', 'App\API\V1\Controllers\MarquerMatchController@getUsers');
    $api->get('marquer/{match_id}','App\API\V1\Controllers\MarquerMatchController@show');
});

Auth::routes();

Route::get('/home', 'HomeController@index');
