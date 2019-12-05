<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use App\Modelos\login_model;
class login_a_controller extends Controller
{
    public function login_view(){

        return view('login_axel');
        
    }

    public function log_home($usu_nom,$usu_pass){


        $usuario = login_model::where('usu_nom', $usu_nom)->where('usu_pass',$usu_pass)->first();
        if($usuario == null){
            return view('login_axel');
            } else {
            $data['usu_id'] = $usuario;
            return view('home_axel',$data);
        }
        
    }

    

}