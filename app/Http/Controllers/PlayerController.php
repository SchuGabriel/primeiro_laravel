<?php

namespace App\Http\Controllers;

use App\Models\Player;
use App\Models\Team;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class PlayerController extends Controller
{
    public function index()
    {
        $players = Player::all();

        return view("players", [
            "players" => $players,
        ]);
    }

    public function create()
    {
        $player = new Player();

        $teams = Team::all();

        return view("player", [
            "player" => $player,
            "teams"  => $teams,
        ]);
    }

    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            "name" => "required",
            "ability" => "required|integer|between:0,99",
        ], [
            "name.required" => "O nome deve ser preenchido.",
            "ability.required" => "A habilidade deve ser preenchida",
            "ability.integer" => "A habilidade deve ser um numero inteiro",
            "ability.between" => "A habilidade deve estar entre 0 a 99",
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $namefile = uniqid() . "." . $request->file("foto")->extension();
        $request->file("foto")->storeAs("public", $namefile);

        $player = new Player();

        $player->name = $request->input("name");
        $player->ability = $request->input("ability");
        $player->foto = $namefile;
        $player->team_id = $request->input("team_id");
        $player->save();

        return redirect()->route("players.index");
    }

    public function edit($id)
    {
        $player = Player::find($id);

        return view("player", [
            "player" => $player,
        ]);
    }

    public function update($id, Request $request)
    {

        $validator = Validator::make($request->all(), [
            "name" => "required",
            "ability" => "required|integer|between:0,99",
        ], [
            "name.required" => "O nome deve ser preenchido.",
            "ability.required" => "A habilidade deve ser preenchida",
            "ability.integer" => "A habilidade deve ser um numero inteiro",
            "ability.between" => "A habilidade deve estar entre 0 a 99",
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $player = Player::find($id);

        if ($request->hasFile("foto")) {
            $namefile = uniqid() . "." . $request->file("foto")->extension();
            $request->file("foto")->storeAs("public", $namefile);
            $player->foto = $namefile;
        }

        $player->name = $request->input("name");
        $player->ability = $request->input("ability");
        $player->save();

        return redirect()->route("players.index");
    }

    public function destroy($id)
    {
        $player = Player::find($id);
        $player->delete();

        return redirect()->route("players.index");
    }
}
