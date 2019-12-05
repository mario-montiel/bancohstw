<?php

namespace App\Modelos;

use Illuminate\Database\Eloquent\Model;

class tipos_tarjetas_deb_cred extends Model
{
    Protected $primaryKey='tipo_tarjeta_deb_cred_id';
    Protected $table='tipos_tarjetas_deb_cred';
    Protected $fillable = ['tipo_tarjeta_deb_cred_id','tipo_tarjeto_cd_nombre'];
    public $timestamps=false;
}