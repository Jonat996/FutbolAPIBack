<?php

namespace App\Models;

use App\Models\Leagues;
use App\Models\Continents;
use App\Models\Confederation;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Country extends Model
{
    use HasFactory;
    protected $fillable=[
        'country_name',
        'country_logo',
        'continent_id',
        'confederation_id'
    ];
    public function continent(){
        return $this->belongsTo(Continents::class,'continent_id','id');
    }

    public function confederation(){
        return $this->belongsTo(Confederation::class,'confederation_id','id');
    }
    public function leagues(){
        return $this->hasMany(Leagues::class,'country_id');
    }
}
