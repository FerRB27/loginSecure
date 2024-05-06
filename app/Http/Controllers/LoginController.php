<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    //
    public function registrate(Request $request){
        /**
         * Validaciones para el form REGISTRATE
         */
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required|confirmed|max:6',
            'password_confirmation' => 'required',
        ]);

        $user = new User();
        
        $user->name = $request->name;
        $user->email = $request->email;
        //ENCRIPCAION DE CONTRASEÑA
        $user->password = Hash::make($request->password);

        $user->save();

        //Generamos un Login para autenticar al usuario, luego redireccionamos al contenido
        Auth::login($user);
        return redirect()->route('contenido');
    }
    public function login(Request $request){
        /**
         * Paso 1: Obtencion de Credenciales
         */
        $credenciales = [
            'email' => $request->email,
            'password' => $request->password,
        ];
        /**
         * Paso 2: Obtenemos la variable "remember" para asegurarse si el check esta marcado o no
         * De estar marcado, devolvera Tre, de lo contrario devolvera False
         */
        $remember = ($request->has('remember') ? true : false);
        /**
         * Paso 3: De estar las credenciales correctas generamos la sesion y 
         * redireccionamos al contenido, caso contrario mostrara el error ocurrido
         */
        if(Auth::attempt($credenciales, $remember)){
            $request->session()->regenerate();

            return redirect()->intended('contenido');
        }else{
            return back()->withErrors([
                'email' => 'Las credenciales ingresadas no son correctas',
            ])->onlyInput('email'); 
        }
        /**
         * Paso 4: Nos dirigimos a la vista del Loin ppara insertar ell codigo de error, 
         * en caso se necesite mostrar algun error ocurrido
         */
    }
    public function destroy(Request $request){
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}
