<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Confederation;

class ConfederationController extends Controller
{
    //
    public function index(){
        $conf= Confederation::with(['continent'=>function($query){
            $query->select('id','continent_name');
        }])
        ->with('continent_2')
        ->get();
        return json_encode($conf);
    }
    public function getConfederations(){
        $conf=Confederation::all();
        return $conf;
    }
    public function getConfederationById($id){
        $conf=Confederation::where('id',$id)
        ->with('countries')
        ->with('continent')
        ->with('continent_2')
        ->with('continentalTournament')
        ->first();
        return $conf;
    }
    public function store(Request $request){
        $continent= Confederation::create($request->all());
        return $continent;
    }

}
