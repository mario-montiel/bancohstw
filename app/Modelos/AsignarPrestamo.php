<?php

namespace App\Modelos;

use Illuminate\Database\Eloquent\Model;

class AsignarPrestamo extends Model
{
    protected $table = "prestamos";
    protected $primaryKey = "prest_id";
    public $timestamps = false;
}
