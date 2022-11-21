<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use App\Models\ContinentalTournaments;


class ContinentalTournamentsController extends Controller
{
    //
    public function index(){
        $tournament=ContinentalTournaments::with('confederation:id,confederation_name')
        ->with('division:id,division_name')
        ->get();
        return $tournament;
    }
    public function continentalTournamentsByConfederation($id){
        $tournament=ContinentalTournaments::where('confederation_id',$id)
        ->select('id','tournament_name AS name')
        ->get();
        return $tournament;
    }
    public function store(Request $request){

        try{
            $request->validate([
                'tournament_name'=>'required',
                'division_id'=>'required',
                'cup'=>'required',
                'tournament_logo'=>'required'
                

            ]);
            $tournament=ContinentalTournaments::create($request->all());
            return  $respuesta=["respuesta"=> "Envío Exitoso!"];
        }catch(Exception $err){
            return  $respuesta=["respuesta"=> "Error!"];
        }
        

    }

}
