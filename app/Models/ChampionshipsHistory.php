<?php

namespace App\Models;

use App\Models\Teams;
use App\Models\Leagues;
use App\Models\ContinentalTournaments;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ChampionshipsHistory extends Model
{
    use HasFactory;
    protected $fillable=[
        'continental_tournament_id',
        'national_tournament_id',
        'champion_id',
        'oponent_id',
        'year'
    ];
    public function nationalTournament(){
        return $this->belongsTo(Leagues::class,'national_tournament_id','id');
    }
    public function continentalTournament(){
        return $this->belongsTo(ContinentalTournaments::class,'continental_tournament_id','id');
    }
    public function champion(){
        return $this->belongsTo(Teams::class,'champion_id','id');
    }
    public function subChampion(){
        return $this->belongsTo(Teams::class,'oponent_id','id');
    }

}
