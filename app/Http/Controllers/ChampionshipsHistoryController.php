<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use App\Models\ChampionshipsHistory;

class ChampionshipsHistoryController extends Controller
{
    //
    public function index(){
        $torneos=ChampionshipsHistory::with('nationalTournament')
        ->with('continentalTournament')
        ->with('champion')
        ->with('subChampion')
        ->get();
        return $torneos;
    }
    public function store(Request $request){
        try{
            $request->validate([
                'champion_id'=>'required',
                'oponent_id'=>'required',
                'year'=>'required'
            ]);
            $History=ChampionshipsHistory::create($request->all());
            return  $respuesta=["respuesta"=> "Envío Exitoso!"];
            
        }catch(Exception $err){
            return  $respuesta=["respuesta"=> "Error!"];
        }
    }
}
