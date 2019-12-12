<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ciudad extends Model
{
    Protected $primaryKey='ciudad_id';
    Protected $table='ciudades';
    Protected $fillable = ['ciudad_id','ciudad_nom','estado_id'];
    public $timestamps=false;
}
