<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    protected $primaryKey = "usu_id";
    protected $table = 'usuarios';
}
