<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Modelos\ClientesModelo;
class prestamos_controller extends Controller
{
    public function ver_prestamos_view(){
        return view('pdf');
    }

    public function ver_prestamos_view_lista(){
        return view('ver_prestamos');
    }

}
