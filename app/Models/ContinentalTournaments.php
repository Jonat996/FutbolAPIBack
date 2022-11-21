<?php

namespace App\Models;

use App\Models\Division;
use App\Models\Confederation;
use App\Models\ChampionshipsHistory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ContinentalTournaments extends Model
{
    use HasFactory;
    protected $fillable=[
    'tournament_name',
    'division_id',
    'confederation_id',
    'tournament_logo',
    'cup'
    ];
    
    public function division(){
        return $this->belongsTo(Division::class,'division_id','id');
    }
    public function confederation(){
        return $this->belongsTo(Confederation::class,'confederation_id','id');
    }
    public function championsHistory(){
        return $this->hasMany(ChampionshipsHistory::class,'continental_tournament_id');
    }
}
