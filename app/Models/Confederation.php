<?php

namespace App\Models;

use App\Models\Continents;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Confederation extends Model
{
    use HasFactory;
    protected $fillable=[
        'confederation_name',
        'confederation_logo',
        'continent_id',
        'second_continent'
    ];
    public function continent(){
        return $this->belongsTo(Continents::class,'continent_id','id');
    }

    public function continent_2(){
        return $this->belongsTo(Continents::class,'second_continent','id');
    }
    public function continentalTournament(){
        return $this->hasMany(ContinentalTournaments::class,'confederation_id');
    }
    public function countries(){
        return $this->hasMany(Country::class,'confederation_id');
    }
}
