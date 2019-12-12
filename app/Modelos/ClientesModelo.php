<?php

namespace App\Modelos;

use Illuminate\Database\Eloquent\Model;
class ClientesModelo extends Model
{
    Protected $primaryKey='cliente_id';
    Protected $table='clientes';
    Protected $fillable = ['cliente_id','cli_nom','cli_ap_paterno','cli_ap_materno','cli_fecha_nac','cli_curp','cli_rfc','user_id'];
    public $timestamps=false;

    public function user()
    {
        return $this->hasOne('User', 'id', 'cliente_id');
    }
    function direcciones() {
        return $this->belongsToMany(Direccion::class, '', '', '');
    }
}
 
