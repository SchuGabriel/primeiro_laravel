<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;

use App\Http\Controllers\TeamsController;

/*Route::get('/', [HomeController::class, "index"]);

Route::get("carros/{carro}", [HomeController::class, "show"]);*/

Route::prefix("teams")->group(function () {

    Route::get('', [TeamsController::class, "index"])->name("teams.index");
    Route::get('new', [TeamsController::class, "create"])->name("teams.create");

    Route::post('', [TeamsController::class, "store"])->name("teams.store");

    Route::get('{id}', [TeamsController::class, "edit"])->name("teams.edit");

});