<?php

namespace App\Http\Controllers;
use App\Modelos\Usuario;
use DB;
use Illuminate\Http\Request;

class verificar_buro_controller extends Controller
{
    public function verificar_buro_credito(){
        // dd($usuarios);
        return view('verificar_buro');
    }

    public function buro_credito_busqueda(Request $request){
        // dd($request);
        $usuarios = DB::table('users')
                    ->select('*')
                    ->join('clientes', 'clientes.user_id', '=', 'users.id')
                    ->join('direcciones_has_clientes', 'direcciones_has_clientes.clientes_cliente_id', '=', 'clientes.cliente_id')
                    ->join('direcciones', 'direcciones.direccion_id', '=', 'direcciones_has_clientes.direcciones_direccion_id')
                    ->join('ciudades', 'ciudades.ciudad_id', '=', 'direcciones.ciudad_id')
                    ->leftJoin('estados', 'estados.estado_id', '=', 'ciudades.estado_id')
                    ->leftJoin('paises', 'paises.pais_id', '=', 'estados.pais_id')
                    ->leftJoin('tarjetas', 'tarjetas.cliente_id', '=', 'clientes.cliente_id')
                    ->leftJoin('tipos_tarjetas', 'tipos_tarjetas.tipo_tarjeta_id', '=', 'tarjetas.tipo_tarjeta_id')
                    ->leftJoin('tipos_tarjetas_deb_cred', 'tipos_tarjetas_deb_cred.tipo_tarjeta_deb_cred_id', '=', 'tarjetas.tipo_tarjeta_deb_cred_id')
                    ->orWhere('cli_nom', $request->nombre_cliente)
                    ->orWhere('cli_nom', $request->curp_cliente)
                    ->orWhere('cli_nom', $request->rfc_cliente)
                    ->get();

        // dd($usuarios);
        
        return view('buro_credito', compact('usuarios'))
                ->with('usuario_encontrado', 'hey')
                ->with('usuario_no_encontrado', 'hey');
    }

    public function verVista2(){
        return view('buro_credito');
    }

    public function buscar_clientes(Request $request){
        // return $request;
        $usuario = DB::table('users')
                    ->select('*')
                    ->join('clientes', 'clientes.user_id', '=', 'users.id')
                    ->join('direcciones_has_clientes', 'direcciones_has_clientes.clientes_cliente_id', '=', 'clientes.cliente_id')
                    ->join('direcciones', 'direcciones.direccion_id', '=', 'direcciones_has_clientes.direcciones_direccion_id')
                    ->leftJoin('ciudades', 'ciudades.ciudad_id', '=', 'direcciones.ciudad_id')
                    ->leftJoin('estados', 'estados.estado_id', '=', 'ciudades.estado_id')
                    ->leftJoin('paises', 'paises.pais_id', '=', 'estados.pais_id')
                    ->leftJoin('tarjetas', 'tarjetas.cliente_id', '=', 'clientes.cliente_id')
                    ->leftJoin('tipos_tarjetas', 'tipos_tarjetas.tipo_tarjeta_id', '=', 'tarjetas.tipo_tarjeta_id')
                    ->leftJoin('tipos_tarjetas_deb_cred', 'tipos_tarjetas_deb_cred.tipo_tarjeta_deb_cred_id', '=', 'tarjetas.tipo_tarjeta_deb_cred_id')
                    ->leftJoin('deudas', 'deudas.clientes_cliente_id', '=', 'clientes.cliente_id')
                    ->leftJoin('tienda', 'tienda.tienda_id', '=', 'deudas.tienda_tienda_id')
                    ->where('cli_nom', 'LIKE', '%'.$request->verificar_nom_client.'%')
                    ->get();

        return $usuario;
    }

    public function buscar_clientes_curp(Request $request){
        $usuario = DB::table('users')
                    ->select('*')
                    ->leftJoin('clientes', 'clientes.user_id', '=', 'users.id')
                    ->leftJoin('direcciones_has_clientes', 'direcciones_has_clientes.clientes_cliente_id', '=', 'clientes.cliente_id')
                    ->leftJoin('direcciones', 'direcciones.direccion_id', '=', 'direcciones_has_clientes.direcciones_direccion_id')
                    ->leftJoin('ciudades', 'ciudades.ciudad_id', '=', 'direcciones.ciudad_id')
                    ->leftJoin('estados', 'estados.estado_id', '=', 'ciudades.estado_id')
                    ->leftJoin('paises', 'paises.pais_id', '=', 'estados.pais_id')
                    ->leftJoin('tarjetas', 'tarjetas.cliente_id', '=', 'clientes.cliente_id')
                    ->leftJoin('tipos_tarjetas', 'tipos_tarjetas.tipo_tarjeta_id', '=', 'tarjetas.tipo_tarjeta_id')
                    ->leftJoin('tipos_tarjetas_deb_cred', 'tipos_tarjetas_deb_cred.tipo_tarjeta_deb_cred_id', '=', 'tarjetas.tipo_tarjeta_deb_cred_id')
                    ->leftJoin('deudas', 'deudas.clientes_cliente_id', '=', 'clientes.cliente_id')
                    ->leftJoin('tienda', 'tienda.tienda_id', '=', 'deudas.tienda_tienda_id')
                    ->orWhere('cli_curp', 'LIKE', '%'.$request->buscar_clientes_curp.'%')
                    ->get();

        return $usuario;
    }

    public function buscar_clientes_rfc(Request $request){
        // return $request;
        $usuario = DB::table('users')
                    ->select('*')
                    ->leftJoin('clientes', 'clientes.user_id', '=', 'users.id')
                    ->leftJoin('direcciones_has_clientes', 'direcciones_has_clientes.clientes_cliente_id', '=', 'clientes.cliente_id')
                    ->leftJoin('direcciones', 'direcciones.direccion_id', '=', 'direcciones_has_clientes.direcciones_direccion_id')
                    ->leftJoin('ciudades', 'ciudades.ciudad_id', '=', 'direcciones.ciudad_id')
                    ->leftJoin('estados', 'estados.estado_id', '=', 'ciudades.estado_id')
                    ->leftJoin('paises', 'paises.pais_id', '=', 'estados.pais_id')
                    ->leftJoin('tarjetas', 'tarjetas.cliente_id', '=', 'clientes.cliente_id')
                    ->leftJoin('tipos_tarjetas', 'tipos_tarjetas.tipo_tarjeta_id', '=', 'tarjetas.tipo_tarjeta_id')
                    ->leftJoin('tipos_tarjetas_deb_cred', 'tipos_tarjetas_deb_cred.tipo_tarjeta_deb_cred_id', '=', 'tarjetas.tipo_tarjeta_deb_cred_id')
                    ->leftJoin('deudas', 'deudas.clientes_cliente_id', '=', 'clientes.cliente_id')
                    ->leftJoin('tienda', 'tienda.tienda_id', '=', 'deudas.tienda_tienda_id')
                    ->orWhere('cli_rfc', 'LIKE', '%'.$request->buscar_clientes_rfc.'%')
                    ->get();

        return $usuario;
    }
}
