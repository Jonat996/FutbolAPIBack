<?php

namespace App\Http\Controllers;

use stdClass;
use GuzzleHttp\Client;
use App\Models\Country;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    //
    public function index(){
        $country=Country::get();
        return $country;
    }
    public function obtenerPaises(){
        $client = new Client();
        $url="https://restcountries.com/v2/all";
        $res= $client -> request( 'get' ,  $url );
        $paises=$res->getBody();
        $paises=json_decode($paises);
        $nombres=array();
        $request = new stdClass();
        foreach($paises as $pais){
        $continente=$this->validarRegion($pais->region,$pais->subregion);
        
        $country=Country::create(array("country_name"=>$pais->translations->es,
        "country_logo"=>$pais->flag,
        "continent_id"=>$continente,
        "confederation_id"=>$this->validarConfederacion($continente)));
        }
         return $country; 
        
    }
    public function obtenerPaisByName($name){
        $pais=Country::where('country_name','like','%'.$name.'%')->get();
        return $pais;
    }
    public function obtenerPaisById($id){
        $pais=Country::where('id',$id)
        ->with('leagues')
        ->with('continent')
        ->with('confederation')
        ->get();
        return $pais;
    }


    //generar países 
      public function validarRegion($region,$subRegion){
        $retorno=0; 
        switch ($region) {
            case 'Americas':
                if($subRegion=="South America"){
                    $retorno=3;
                }elseif($subRegion=="Northern America"){
                    $retorno=1;
                }else{
                    $retorno=2;
                };
                break;
            case 'Europe':
                $retorno=4;
                break;
            case 'Africa':
                $retorno=5;
                break;
            case 'Asia':
                $retorno=6;
                break;
            case 'Oceania':
                $retorno=7;
                break;
            default:
                $retorno=1;
                break;
        }
        return $retorno;

    }
    public function validarConfederacion($id){
        $retorno=0;
        switch ($id) {
            case 1:
            # code...
            $retorno= 2;
            break;
            case 2:
            # code...
             $retorno= 2;
             break;
            case 3:
            $retorno= 1;
            break;
            case 4:
                $retorno= 3;
                break;
            case 5:
                $retorno= 4;
                break;
            case 6:
                $retorno= 5;
                break;
            case 7:
                $retorno= 6;
                break;
                        
        }
        return $retorno;
    }
    public function store(Request $request){
        $country=Country::create($request->all());
        return $country;
    }
}