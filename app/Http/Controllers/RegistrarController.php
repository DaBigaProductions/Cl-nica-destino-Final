<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Auth;
use Illuminate\Support\Facades\Hash;

class RegistrarController extends Controller
{
    public function store(Request $request) {
        $request -> validate ([
            'name' => 'required | string',
            'email' => 'required | string | email | unique:users',
            'password' => 'required | string',
        ]);

        $user = User::create([
            'name' => $request-> name,
            'email' => $request -> email,
            'password' => Hash::make($request->password),
        ]);

        Auth::login($user);

        return redirect()->route('loginpage');
    }



    public function check (Request $request){
        $datos = $request ->validate ([
            'email' => ['required','email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($request->only('email','password'))){
            return redirect()->route('index');
        };

        return back() -> withErrors([
            'email' => 'Credenciales no válidas.'
        ])->onlyInput('email');
    }
}
