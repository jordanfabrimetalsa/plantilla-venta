<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function index(){
        $titulo = "Login de Usuario";
        return view('modules.auth.login', compact("titulo"));
    }

    public function logear(Request $request){
        //Validar datos de las credenciales
        $credenciales = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        //Buscar el email
        $user = User::where('email', $request->email)->first();

        //Validar usuario y contraseña
        if(!$user || !Hash::check($request->password, $user->password)){
            return back()->withErrors(['email' => 'Credecial Incorrecta'])->withInput();
        }

        //Validar si esta activo
        if(!$user->activo){
            return back()->withErrors(['email' => 'Tu cuenta esta inactiva!']);
        }

        //Crear la sesión de usuario
        Auth::login($user);
        $request->session()->regenerate();

        return to_route('home');
    }

    public function crearAdmin(){
        //crear directamente un admin
        User::create(
            [
                'name' => 'Jordan',
                'email' => 'aguilerajordan2@gmail.com',
                'password' => Hash::make('admin'),
                'activo' => true,
                'rol' => 'admin'
            ]
        );

        return "Admin creado";
    }

    public function logout(){
        Auth::logout();

        return to_route('login');
    }
}
