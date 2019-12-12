<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Modelos\Estado;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $estado = Estado::get();
        dd($estado);
        return view('welcome');
    }

    public function prueba()
    {
        $estado = Estado::get();
        dd($estado);
    }
}
