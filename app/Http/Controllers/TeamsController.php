<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Teams;
use Illuminate\Http\Request;

class TeamsController extends Controller
{
    //
    public function index(){
        $teams=Teams::all();
        return $teams;
    }
    public function obtenerEquipoByName($name){
        $teams=Teams::where('team_name','like','%'.$name.'%')
        ->get();
        return $teams;
    }
    public function obtenerEquipoById($id){
        $team=Teams::where('id',$id)
        ->with(['league'=>function($query){
            $query->with('country');
        } ])
        ->with(['international'=>function($query){
            $query->with('confederation');
        }
        ])
        ->with(['championships'=>function($query){
            $query->with('nationalTournament');
            $query->with('continentalTournament');
        }])
        ->with('subChampionships')
        ->first();
        return $team;
    }
    public function store(Request $request){
        try{
            $request->validate([
                'team_name'=>'required',
                'league_id'=>'required',
                'team_logo'=>'required'
            ]);

            $team=Teams::create($request->all());
            return  $respuesta=["respuesta"=> "Envío Exitoso!"];
        }catch(Exception $err){
            return  $respuesta=["respuesta"=> "Error!"];
        }
    }
}
