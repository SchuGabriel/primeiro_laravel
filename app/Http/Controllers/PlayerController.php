<?php

namespace App\Http\Controllers;

use App\Models\Player;
use Illuminate\Http\Request;

class PlayerController extends Controller
{
    public function index(){
        $players = Player::all();

        return view("players", [
            "players" => $players,
        ]);
    }

    public function create(){
        $player = new Player();
        return view("player", [
            "player" => $player,
        ]);
    }

    public function store(Request $request){
        $player = New Player();

        $player->name = $request->input("name");
        $player->ability = $request->input("ability");
        $player->save();

        return redirect()->route("players.index");
    }

    public function edit($id){
        $player = Player::find($id);

        return view("player", [
            "player" => $player,
        ]);
    }

    public function update($id, Request $request){
        $player = Player::find($id);
        $player->name = $request->input("name");
        $player->ability = $request->input("ability");
        $player->save();

        return redirect()->route("players.index");
    }

    public function destroy($id){
        $player = Player::find($id);
        $player->delete();

        return redirect()->route("players.index");
    }
}
