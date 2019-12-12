<?php

namespace App\Modelos;
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
        return $this->belongsTo('App\Modelos\Estado', 'estado_id', 'estado_id');
    }
    public static function ciudad($id){
        return Ciudad::where("estado_id", '=', $id)->get();
    }
}
