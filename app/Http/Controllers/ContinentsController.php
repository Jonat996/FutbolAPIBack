<?php

namespace App\Http\Controllers;

use App\Models\Continents;
use Illuminate\Http\Request;

class ContinentsController extends Controller
{
    //
/*     $country=Country::with(['continent'=>function($query){
        $query->select('id','continent_name');
    }]) */
    public function index(){
        $continent=Continents::with('countries:id,country_name,continent_id')
        ->with('confederations')
        ->select('id','continent_name')
        ->get();
        return $continent;
    }
    public function getContinentById($id){
        $continent=Continents::find($id)
        ->with('countries')
        ->with('confederations')
        ->first();
        return $continent;
    }
    public function getContinentByName($name){
        $continent=Continents::where('continent_name',$name)
        ->with('countries:id,country_name')
        ->get();
        return $continent;
    }
    public function getContinents(){
        return Continents::all('id','continent_name');
    }

    public function store(Request $request){
        $continent=Continents::create($request->all());
        return $continent;
    }
}
