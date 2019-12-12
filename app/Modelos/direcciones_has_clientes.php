<?php

namespace App\Modelos;

use Illuminate\Database\Eloquent\Model;

class direcciones_has_clientes extends Model
{
    Protected $primaryKey='direcciones_direccion_id';
    Protected $table='direcciones_has_clientes';
    Protected $fillable = ['direcciones_direccion_id','clientes_cliente_id'];
    public $timestamps=false;

    
}
