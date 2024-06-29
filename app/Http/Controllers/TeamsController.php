<?php

namespace App\Http\Controllers;

use App\Models\Team;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class TeamsController extends Controller
{
    public function index()
    {
        $teams = Team::all();
        #Mostra o valor da variavel e da die no codigo;
        #dd($teams);

        return view('teams', [
            "teams" => $teams,
        ]);
    }

    public function create()
    {
        $team = new Team();
        return view("team", [
            "team" => $team,
        ]);
    }

    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            "name" => "required|min:2",
            "country" => "required",
        ], [
            "name.required" => "O campo nome deve ser preenchido",
            "name.min" => "O campo nome deve ter ao menos 2 caracteres",
            "country.required" => "O campo pais deve ser preenchido",
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $namefile = uniqid() . "." . $request->file("logo")->extension();
        $request->file("logo")->storeAs("public", $namefile);

        $team = new Team();

        $team->name = $request->input("name");
        $team->country = $request->input("country");
        $team->logo = $namefile;
        $team->save();

        return redirect()->route("teams.index");
    }

    public function edit($id)
    {
        $team = Team::find($id);

        return view('team', [
            "team" => $team,
        ]);
    }

    public function update($id, Request $request)
    {

        $validator = Validator::make($request->all(), [
            "name" => "required|min:2",
            "country" => "required",
        ], [
            "name.required" => "O campo nome deve ser preenchido",
            "name.min" => "O campo nome deve ter ao menos 2 caracteres",
            "country.required" => "O campo pais deve ser preenchido",
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        
        $team = Team::find($id);
        if ($request->hasFile("logo")) {
            $namefile = uniqid() . "." . $request->file("logo")->extension();
            $request->file("logo")->storeAs("public", $namefile);
            $team->logo = $namefile;
        }
        $team->name = $request->input("name");
        $team->country = $request->input("country");
        $team->save();

        return redirect()->route("teams.index");
    }

    public function destroy($id)
    {
        $team = Team::find($id);
        $team->delete();

        return redirect()->route("teams.index");
    }
}
