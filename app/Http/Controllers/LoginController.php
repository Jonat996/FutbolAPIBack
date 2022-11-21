<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    //
    public function autenticar(Request $request){


        try{
            $auth=auth()->attempt(['email' => $request->email, 'password' => $request->password]);
            /* return auth()->user(); */
            if($auth){
                $accessToken=auth()->user()->createToken('authToken')->accessToken;
                return  $respuesta=[ "respuesta"=>['user'=>auth()->user(), 'token'=>$accessToken,'message'=>"Sesión Iniciada!"] ]; /* $respuesta=["respuesta"=>  auth()->user()]; */
            }else{
                return  $respuesta=["respuesta"=> ["message"=> "revisa las credenciales...",'token'=>"null"]];
            }

        }catch(Exception $err){
             return  $respuesta=["respuesta"=> $err];
        }
    }
    public function validar(){
        $auth=auth()->user();
        
        return $auth;
    }
}
