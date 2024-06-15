<?php

namespace App\Http\Controllers;

use App\Models\Team;
use Illuminate\Http\Request;

class TeamsController extends Controller
{
    public function index(){
        $teams = Team::all();
        #Mostra o valor da variavel e da die no codigo;
        #dd($teams);

        return view('teams', [
            "teams" => $teams,
        ]);
    }

    public function create(){
        $team = new Team();
        return view("team", [
            "team" => $team,
        ]);
    }

    public function store(Request $request){
        $team = New Team();

        $team->name = $request->input("name");
        $team->country = $request->input("country");
        $team->save();

        return redirect()->route("teams.index");
    }

    public function edit($id){
        $team = Team::find($id);

        return view('team', [
            "team" => $team,
        ]);
    }
}

// criar uma pagina index
// css 
