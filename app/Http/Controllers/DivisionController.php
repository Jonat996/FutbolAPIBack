<?php

namespace App\Http\Controllers;

use App\Models\Division;
use Illuminate\Http\Request;

class DivisionController extends Controller
{
    //
    public function index(){
     $division=Division::get();
     return $division;   
    }
    public function store(Request $request){
        $division=Division::create($request->all());
        return $division;
    }
}

