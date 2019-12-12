<?php

namespace App;
use App\Modelos\Estado;
use Illuminate\Database\Eloquent\Model;

class Ciudad extends Model
{
    Protected $primaryKey='ciudad_id';
    Protected $table='ciudades';
    Protected $fillable = ['ciudad_id','ciudad_nom','estado_id'];
    public $timestamps=false;

    public function estados()
    {
        return $this->hasMany(Estado::class, '', 'estado_id');
    }
}
