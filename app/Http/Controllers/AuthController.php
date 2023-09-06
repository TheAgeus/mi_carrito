<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function register() { 
        return view('register');
    }

    public function registerPost(Request $request) {
        
        // Definir reglas de validción
        $rules = [
            'email' => 'required|unique:users|email',
            'pass' => 'required',
            'name' => 'required'
        ];

        // Mensajes personalizados par alas reglas de validación
        $messages = [
            'email.required' => 'Escribe un correo',
            'email.email' => 'Ingrese un correo váilido',
            'email.unique' => 'Ese correo ya está registrado',

            'pass.required' => 'Escribe una contraseña',
            
            'name.required' => 'Escribe un nombre'
        ];
        
        // Validar los datos
        $validator = Validator::make($request->all(), $rules, $messages);

        // Comprobar si la validación ha fallado
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $user = new User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('pass'));
        $user->save();
        return back()->with('success', 'Register successfully');
    }
}
