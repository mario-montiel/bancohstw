<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;
use App\Modelos\ClientesModelo;
use App\Modelos\Usuario;
use Illuminate\Pagination\Paginator;
use DB;
class crudController extends Controller
{
    public function gestionar_clientes(){
        // $cli = ClientesModelo::all()->inner jo;
        // $cli = ClientesModelo::with('user')->get();
        $cli = DB::table("clientes")
        ->select("clientes.cliente_id", "clientes.cli_nom", "clientes.user_id", "clientes.cli_ap_paterno", "clientes.cli_ap_materno","clientes.cli_fecha_nac","clientes.cli_curp","clientes.cli_rfc","users.name")
        ->join("users","clientes.user_id", "=", "users.id")
        ->get();
        return view('crud/insertar',compact('cli'));
    }
    
    public function crear_cliente(Request $request){
        $cli=new ClientesModelo();
        // $cli->cliente_id=$request->get("clid");
        $cli->cli_nom=$request->get("nombre");
        $cli->user_id=$request->get("usuario");
        $cli->cli_ap_paterno=$request->get("appaterno");
        $cli->cli_ap_materno=$request->get("apmaterno");
        $cli->cli_fecha_nac=$request->get("fnac");
        $cli->cli_curp=$request->get("curp");
        $cli->cli_rfc=$request->get("rfc");
        $cli->save();
        return redirect("/gestionar_clientes");
    }
    public function eliminar($id)
    {
        ClientesModelo::destroy($id);
        return redirect("/gestionar_clientes");
    }
    public function editar(Request $request, $id){
        
        $id = $request->get("id");
        $cli =  ClientesModelo::findOrFail($id);
        $user = Usuario::all();
        $cli->cli_nom=$request->get("nombre");
        $user->name=$request->get("usuario");
        $cli->cli_ap_paterno=$request->get("appaterno");
        $cli->cli_ap_materno=$request->get("apmaterno");
        $cli->cli_fecha_nac=$request->get("fnac");
        $cli->cli_curp=$request->get("curp");
        $cli->cli_rfc=$request->get("rfc");
        $cli->save();
        return redirect("/gestionar_clientes");
    }
    public function gestionar(){
        $cli = DB::table("clientes")
        ->select("clientes.cliente_id", "clientes.cli_nom", "clientes.user_id", "clientes.cli_ap_paterno", "clientes.cli_ap_materno","clientes.cli_fecha_nac","clientes.cli_curp","clientes.cli_rfc","users.name","clientes.cli_status")
        ->join("users","clientes.user_id", "=", "users.id")
        ->get();
        return view("gestion_de_cobranza/gestionar",compact('cli'));
    }
    
}
