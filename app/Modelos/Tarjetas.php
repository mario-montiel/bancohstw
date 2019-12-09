<?php

namespace App\Modelos;

use Illuminate\Database\Eloquent\Model;

class Tarjetas extends Model
{
    Protected $primaryKey='tarjeta_id';
    Protected $table='tarjetas';
    Protected $fillable = ['cliente_id', 'tipo_tarjeta_id', 'tipo_tarjeta_deb_cred_id', 'tarjeta_numero', 'tarjeta_fecha_venc'];
    public $timestamps=false;
}