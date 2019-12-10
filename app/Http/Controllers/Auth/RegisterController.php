<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Modelos\ClientesModelo;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'cli_nom' => ['required'],
            'cli_ap_paterno' => ['required'],
            'cli_ap_materno' => ['required'],
            'cli_fecha_nac' => ['required'],
            'cli_curp' => ['required'],
            'cli_rfc' => ['required'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        //dd($data);
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

        ClientesModelo::create([
            'cli_nom' => $data['cli_nom'],
            'cli_ap_paterno' => $data['cli_ap_paterno'],
            'cli_ap_materno' => $data['cli_ap_materno'],
            'cli_fecha_nac' => $data['cli_fecha_nac'],
            'cli_curp' => $data['cli_curp'],
            'cli_rfc' => $data['cli_rfc'],
            'user_id' => $user->id
        ]);

        return $user;
    }

}
