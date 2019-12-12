<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Direccion extends Model
{
    Protected $primaryKey='direccion_id';
    Protected $table='direcciones';
    Protected $fillable = ['direccion_id','ciudad_id','direccion_colonia','direccion_calle','direccion_codigo_postal','direccion_num_exterior','direccion_num_interior','direccion_entre_calles'];
    public $timestamps=false;

    function cliente() {
        return $this->belongsToMany(ClienteModelo::class, '', '');
    }
}

