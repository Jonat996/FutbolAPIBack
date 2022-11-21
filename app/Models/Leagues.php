<?php

namespace App\Models;

use App\Models\Country;
use App\Models\Division;
use App\Models\ChampionshipsHistory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Leagues extends Model
{
    use HasFactory;
    protected $fillable=[
        'league_name',
        'country_id',
        'division_id',
        'league_logo',
        'cup'
    ];
    public function division(){
        return $this->belongsTo(Division::class,'division_id','id');
    }
    public function country(){
        return $this->belongsTo(Country::class,'country_id','id');
    }
    public function teams(){
        return $this->hasMany(Teams::class,'league_id');
    }
    public function championsHistory(){
        return $this->hasMany(ChampionshipsHistory::class,'national_tournament_id');
    }
    
}
