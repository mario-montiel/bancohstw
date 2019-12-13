<?php

namespace App;
use App\Modelos\Estado;
use Illuminate\Database\Eloquent\Model;

class Pais extends Model
{
    Protected $primaryKey='pais_id';
    Protected $table='paises';
    Protected $fillable = ['pais_id','pais_nombre'];
    public $timestamps=false;

    public function estados()
        {
            return $this->belongsTo(Estado::class, 'pais_id', 'pais_id');
        }
}
