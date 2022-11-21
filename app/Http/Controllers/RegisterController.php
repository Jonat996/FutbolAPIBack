<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class RegisterController extends Controller
{
    //
    public function store(Request $request){

        try{
            $request->validate([
                'name'=>'required',
                'email'=>'required',
                'password'=>'required'
            ]);
    $user=User::create([
        'name'=>$request->name,
        'lastname'=>$request->lastname,
        'email'=>$request->email,
        'password'=>Hash::make($request->password) 
    ]);
    $accessToken=$user->createToken('authToken')->accessToken;
    return  $respuesta=["respuesta"=> ["message"=>"Usuario Registrado!","token"=>$accessToken]];
        }catch(Exception $err){
            return  ["respuesta"=> ["message"=>"Error!","token"=>"null"]];
        }
    }
}
