<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Leagues;
use Illuminate\Http\Request;

class LeaguesController extends Controller
{
    //
    public function index(){

        $league=Leagues::with(['country.confederation'=>function($query){
            $query->select('id','confederation_name');
        }])
        ->with('teams')
        ->with('division')
        ->get();
        return $league;
        
    }
public function obtenerLigaBusqueda($liga){
    $league=Leagues::where('league_name','like','%'.$liga.'%')->get();
    return $league;
}
public function obtenerLigaById($id){
    $league=Leagues::where('id',$id)
    ->with('teams')
    ->with('country.confederation')
    ->with('division')
    ->first();
    return $league;
}
public function obtenerLigasByCountry($id){
    $leagues=Leagues::where('country_id',$id)
    ->select(['id','league_name AS name'])
    ->get();
    return $leagues;
}
    public function store(Request $request){
         try {
            $request->validate([
                'league_name'=>'required',
                'division_id'=>'required',
                'cup'=>'required',
                'league_logo'=>'required'
                

            ]);
            $league=Leagues::create($request->all());
            return  $respuesta=["respuesta"=> "Envío Exitoso!"];
         } catch (Exception $err) {
            return  $respuesta=["respuesta"=> "Error!"];
         }
    }
}
