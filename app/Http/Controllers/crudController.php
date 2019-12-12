<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;
use App\Modelos\ClientesModelo;
use Illuminate\Pagination\Paginator;
use DB;
use Illuminate\Support\Facades\Auth;

class crudController extends Controller
{
    public function prueba()
    {
        $estado = Estado::get();
        dd($estado);
    }
    
    public function gestionar_clientes(){
        // $cli = ClientesModelo::all()->inner jo;
        // $cli = ClientesModelo::with('user')->get();
        $query = DB::table("estados")
        ->select("estados.estado_id","estados.estado_nom")
        ->get();
        $cli = DB::table("clientes")
        ->select("clientes.cliente_id", "clientes.cli_nom", "clientes.user_id", "clientes.cli_ap_paterno", "clientes.cli_ap_materno","clientes.cli_fecha_nac","clientes.cli_curp","clientes.cli_rfc","users.name")
        ->join("users","clientes.user_id", "=", "users.id")
        ->get();
        return view('crud/insertar',compact('cli','query'));
    }

    public function crear_cliente(Request $request){
        $cli=new ClientesModelo();
        $dir = new Direcciones();
        // $cli->cliente_id=$request->get("clid");
        $cli->cli_nom=$request->get("nombre");
        $cli->user_id=$request->get("usuario");
        $cli->cli_ap_paterno=$request->get("appaterno");
        $cli->cli_ap_materno=$request->get("apmaterno");
        $cli->cli_fecha_nac=$request->get("fnac");
        $cli->cli_curp=$request->get("curp");
        $cli->cli_rfc=$request->get("rfc");
        $dir->direccion_calle=$request->get("calle");
        $dir->direccion_colonia=$request->get("colonia");
        $dir->direccion_codigo_postal=$request->get("cp");
        $dir->direccion_num_ext=$request->get("ne");
        $dir->direccion_num_int=$request->get("ni");
        $dir->direccion_entre_calles=$request->get("entrecalles");
        $cli->save();
        return redirect("/gestionar_clientes");
    }
    public function paises(){


    }
    public function eliminar($id)
    {
        ClientesModelo::destroy($id);
        return redirect("/gestionar_clientes");
    }
    public function editar(Request $request, $id){

        $id = $request->get("id");
        $cli =  ClientesModelo::findOrFail($id);
        $usu  = $request->get("usuario");
        // $x = DB::table('users')->select('id')->where('name', $usu)->first();
        // $y = json_encode($x->id);
        $x = DB::table('clientes')->select('user_id')->where('cliente_id', $id)->first();
        $y = json_encode($x->user_id);
     // $user = Usuario::all();
        $cli->cli_nom=$request->get("nombre");
        $cli->user_id=$y;
        $cli->cli_ap_paterno=$request->get("appaterno");
        $cli->cli_ap_materno=$request->get("apmaterno");
        $cli->cli_fecha_nac=$request->get("fnac");
        $cli->cli_curp=$request->get("curp");
        $cli->cli_rfc=$request->get("rfc");

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

