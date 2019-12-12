<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;
use App\Modelos\ClientesModelo;
use App\Modelos\Estado;
use App\Modelos\Ciudad;
use App\Modelos\Direccion;
use App\Modelos\direcciones_has_clientes;
use Illuminate\Pagination\Paginator;
use DB;
use Illuminate\Support\Facades\Auth;

class crudController extends Controller
{
    public function prueba()
    {
        $estado = Estado::get();
        $estado->load("ciudades");
        return $estado;
    }
    
    public function gestionar_clientes(){
        // $cli = ClientesModelo::all()->inner jo;
        // $cli = ClientesModelo::with('user')->get();
        $query = DB::table("estados")
        ->select("estados.estado_id","estados.estado_nom")
        ->get();

        $cli = DB::table("clientes")
        ->select("clientes.cliente_id", "clientes.cli_nom", "clientes.user_id", "clientes.cli_ap_paterno", "clientes.cli_ap_materno","clientes.cli_fecha_nac","clientes.cli_curp","clientes.cli_rfc",
        "users.name","direcciones.direccion_colonia", "direcciones.direccion_calle","direcciones.direccion_codigo_postal","direcciones.direccion_num_ext",
        "direcciones.direccion_num_int","direcciones.direccion_entre_calles")
        ->join("direcciones_has_clientes","clientes.cliente_id","=","direcciones_has_clientes.clientes_cliente_id")
        ->join("direcciones","direcciones.direccion_id","=","direcciones_has_clientes.direcciones_direccion_id")
        ->join("users","clientes.user_id", "=", "users.id")
        ->get();
        
        return view('crud/insertar',compact('cli','query'));
    }

    public function crear_cliente(Request $request){

        $dir = Direccion::create([
            'ciudad_id' => $request["ciudades"],
            'direccion_calle' => $request['calle'],
            'direccion_colonia' => $request['colonia'],
            'direccion_codigo_postal' => $request['cp'],
            'direccion_num_int' => $request['ni'],
            'direccion_num_ext' => $request['ne'],
            'direccion_entre_calles' => $request['entrecalles']
            
        ]);
        $cli = ClientesModelo::create([
            'cli_nom' => $request['nombre'],
            'cli_ap_paterno' => $request['appaterno'],
            'cli_ap_materno' => $request['apmaterno'],
            'cli_fecha_nac' => $request['fnac'],
            'cli_curp' => $request['curp'],
            'cli_rfc' => $request['rfc']
        ]);
        $dircli = direcciones_has_clientes::create([
            'direcciones_direccion_id' => $dir->direccion_id,
            'clientes_cliente_id' => $cli->cliente_id
        ]);
        return redirect("/gestionar_clientes");
    }
    public function ciudad(Request $r, $id){
        
            $c = Ciudad::ciudad($id);
            return response()->json($c);

    }
    public function eliminar($id)
    {
        ClientesModelo::destroy($id);
        return redirect("/gestionar_clientes");
    }
    public function editar(Request $request, $id){

        $id = $request->get("id");
        $cli =  ClientesModelo::findOrFail($id);
        $dir = Direccion::findOrFail($id);
        $dircli = direcciones_has_clientes::findOrFail($id);
        $usu  = $request->get("usuario");
        $cli->cli_nom=$request->get("nombre");
        $cli->user_id=$y;
        $cli->cli_ap_paterno=$request->get("appaterno");
        $cli->cli_ap_materno=$request->get("apmaterno");
        $cli->cli_fecha_nac=$request->get("fnac");
        $cli->cli_curp=$request->get("curp");
        $cli->cli_rfc=$request->get("rfc");

        $dir->direccion_colonia = $request->get("colonia");
        $dir->direccion_calle = $request->get("calle");
        $dir->direccion_codigo_postal = $request->get("cp");
        $dir->direccion_num_int = $request->get("ni");
        $dir->direccion_num_ext = $request->get("ne");
        $dir->direccion_entre_calles = $request->get("entrecalles");
        // $user = User::findOrFail($y);
        // $user->name = $request->get("ususario");
        $cli->save();
        // $user->save();
        return redirect("/gestionar_clientes");
    }
    public function gestionar(){
        $cli = DB::table("clientes")
        ->select("clientes.cliente_id", "clientes.cli_nom", "clientes.user_id", "clientes.cli_ap_paterno", "clientes.cli_ap_materno","clientes.cli_fecha_nac","clientes.cli_curp","clientes.cli_rfc","users.name","clientes.cli_status")
        ->join("users","clientes.user_id", "=", "users.id")
        ->get();
        return view("gestion_de_cobranza/gestionar",compact('cli'));
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->to(route('home'));
    }

}

