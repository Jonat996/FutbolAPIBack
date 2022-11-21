<?php

namespace App\Models;

use App\Models\Leagues;
use App\Models\ChampionshipsHistory;
use App\Models\ContinentalTournaments;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Teams extends Model
{
    use HasFactory;
    protected $fillable=[
        'team_name',
        'international_id',
        'league_id',
        'team_logo'
    ];
public function league(){
    return $this->belongsTo(Leagues::class,'league_id','id');
}
public function international(){
    return $this->belongsTo(ContinentalTournaments::class,'international_id','id');
}
public function championships(){
    return $this->hasMany(ChampionshipsHistory::class,'champion_id');
}
public function subChampionships(){
    return $this->hasMany(ChampionshipsHistory::class,'oponent_id');
}
}
