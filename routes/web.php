<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;

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