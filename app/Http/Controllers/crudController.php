<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Modelos\ClientesModelo;
use Illuminate\Pagination\Paginator;

class crudController extends Controller
{
    public function gestionar_clientes(){
        $cli = ClientesModelo::paginate("3");
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
        $cli->cli_nom=$request->get("nombre");
        $cli->usu_id=$request->get("usuario");
        $cli->cli_ap_paterno=$request->get("appaterno");
        $cli->cli_ap_materno=$request->get("apmaterno");
        $cli->cli_fecha_nac=$request->get("fnac");
        $cli->cli_curp=$request->get("curp");
        $cli->cli_rfc=$request->get("rfc");
        $cli->save();
        return redirect("/gestionar_clientes");
    }
    public function gestionar(){
        $cli = ClientesModelo::Where('cli_status','=','amarillo')->orWhere('cli_status','=','rojo')->get();
        return view("gestion_de_cobranza/gestionar",compact('cli'));
    }
    
}
