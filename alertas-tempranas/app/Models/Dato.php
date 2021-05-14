<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dato extends Model
{
    use HasFactory;
    //relacion de uno a muchos
    public function plantas(){
        return $this->hasMany('App\Models\Planta');
    }
    //relacion de uno a muchos(inversa)
    public function monitoreo(){
        return $this->belongsTo('App\Models\Monitoreo');
    }
}
