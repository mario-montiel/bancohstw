<?php

namespace App;
use App\Modelos\Pais;
use Illuminate\Database\Eloquent\Model;

class Estado extends Model
{
    Protected $primaryKey='estado_id';
    Protected $table='estados';
    Protected $fillable = ['estado_id','estado_nom',"pais_id"];
    public $timestamps=false;
    
    public function paises()
        {
            return $this->hasMany(Pais::Class, 'pais_id');
        }

}
