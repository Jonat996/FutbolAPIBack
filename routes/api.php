<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\TeamsController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\LeaguesController;
use App\Http\Controllers\DivisionController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ContinentsController;
use App\Http\Controllers\ConfederationController;
use App\Http\Controllers\ChampionshipsHistoryController;
use App\Http\Controllers\ContinentalTournamentsController;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('continent',[ContinentsController::class,'index']);
Route::get('continents',[ContinentsController::class,'getContinents']);
Route::get('continent/{id}',[ContinentsController::class,'getContinentById']);
Route::get('continent/name/{name}',[ContinentsController::class,'getContinentByName']);
Route::post('continent',[ContinentsController::class,'store'])->middleware('auth:api');
Route::get('confederation',[ConfederationController::class,'index']);
Route::get('confederations',[ConfederationController::class,'getConfederations']);
Route::get('confederation/{id}',[ConfederationController::class,'getConfederationById']);
Route::post('confederation',[ConfederationController::class,'store'])->middleware('auth:api');
Route::get('division',[DivisionController::class,'index']);
Route::post('division',[DivisionController::class,'store'])->middleware('auth:api');
Route::get('continentaltournament',[ContinentalTournamentsController::class,'index']);
Route::get('continentalTournament/confederation/{id}',[ContinentalTournamentsController::class,'continentalTournamentsByConfederation']);
Route::post('continentaltournament',[ContinentalTournamentsController::class,'store'])->middleware('auth:api');

Route::get('country',[CountryController::class,'index']);
Route::get('country/{name}',[CountryController::class,'obtenerPaisByName']);
Route::get('country/id/{id}',[CountryController::class,'obtenerPaisById']);
Route::get('prueba',[CountryController::class,'obtenerPaises'])->middleware('auth:api');
Route::post('country',[CountryController::class,'store'])->middleware('auth:api');

Route::get('leagues',[LeaguesController::class,'index']);
Route::get('leagues/busqueda/{liga}',[LeaguesController::class,'obtenerLigaBusqueda']);
Route::get('league/{id}',[LeaguesController::class,'obtenerLigaById']);
Route::get('league/country/{id}',[LeaguesController::class,'obtenerLigasByCountry']);
Route::post('leagues',[LeaguesController::class,'store'])->middleware('auth:api');

Route::get('championsHistorial',[ChampionshipsHistoryController::class,'index']);
Route::post('championsHistorial',[ChampionshipsHistoryController::class,'store'])->middleware('auth:api');
Route::get('teams',[TeamsController::class,'index']);
Route::get('teams/name/{name}',[TeamsController::class,'obtenerEquipoByName']);
Route::get('team/{id}',[TeamsController::class,'obtenerEquipoById']);
Route::post('teams',[TeamsController::class,'store'])->middleware('auth:api'); 
Route::post('register',[RegisterController::class,'store'] );
Route::post('login',[LoginController::class,'autenticar'] );
Route::get('login',[LoginController::class,'validar'])->middleware('auth:api');
