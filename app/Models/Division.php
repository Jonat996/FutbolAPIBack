<?php

namespace App\Models;

use App\Models\Leagues;
use App\Models\ContinentalTournaments;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Division extends Model
{
    protected $fillable=[
        'division_name'
    ];
    public function continentalTournaments(){
        return $this->hasMany(ContinentalTournaments::class,'division_id');
    }
    public function leagues(){
        return $this->hasMany(Leagues::class,'division_id');
    }
}
