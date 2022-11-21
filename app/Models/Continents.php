<?php

namespace App\Models;

use App\Models\Country;
use App\Models\Confederation;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Continents extends Model
{
    use HasFactory;
    protected $fillable = [
        'continent_name'
    ];

    public function confederations(){
        return $this->hasOne(Confederation::class,'continent_id');
    }
    public function countries(){
        return $this->hasMany(Country::class,'continent_id');
    }
}
