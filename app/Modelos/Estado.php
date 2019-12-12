<?php

namespace App\Modelos;

use Illuminate\Database\Eloquent\Model;
use App\Modelos\Pais;
use App\Modelos\Ciudad;

class Estado extends Model
{
    Protected $primaryKey='estado_id';
    Protected $table='estados';
    Protected $fillable = ['estado_id','estado_nom',"pais_id"];
    public $timestamps=false;

    public function paises()
        {
            return $this->hasMany(Pais::Class, 'pais_id', 'pais_id');
        }

    public function ciudades(){
        return $this->hasMany('App\Modelos\Ciudad','estado_id','estado_id');
    }
}
