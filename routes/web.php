<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PlayerController;
use App\Http\Controllers\TeamsController;

/*Route::get('/', [HomeController::class, "index"]);

Route::get("carros/{carro}", [HomeController::class, "show"]);*/

Route::get('/', [HomeController::class, "index"])->name("home.index");

Route::prefix("teams")->group(function () {
    
    Route::get('/', [TeamsController::class, "index"])->name("teams.index");

    Route::get('new', [TeamsController::class, "create"])->name("teams.create");

    Route::post('', [TeamsController::class, "store"])->name("teams.store");

    Route::get('{id}', [TeamsController::class, "edit"])->name("teams.edit");

    Route::put('{id}', [TeamsController::class, "update"])->name("teams.update");

    Route::delete('{id}', [TeamsController::class, "destroy"])->name("teams.destroy");
});

Route::prefix("players")->group(function() {
    Route::get('/', [PlayerController::class, "index"])->name("players.index");
    Route::get('/new', [PlayerController::class, "create"])->name("players.create");
    Route::post('', [PlayerController::class, "store"])->name("players.store");
    Route::get('{id}', [PlayerController::class, "edit"])->name("players.edit");
    Route::put('{id}', [PlayerController::class, "update"])->name("players.update");
    Route::delete('{id}', [PlayerController::class, "destroy"])->name("players.destroy");
});