<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LogController extends Controller
{
    public function show()
    {
        return view('login.show');
    }

    public function login(Request $request){

        $login = $request->input('email');

        $password = $request->input('password');

        $values = ['email' => $login, 'password' => $password];


        if(Auth::attempt($values)){
            $request->session()->regenerate();
            return redirect()->route('livres.index');
        }

        else{
            return back()->withErrors([
                'email'=>'email ou mot de passe incorrecte'

            ])->onlyInput('email');

        }
    }
    public function logout(Request $request)
{
    Auth::logout();

    $request->session()->invalidate();

    $request->session()->regenerateToken();

    return redirect()->route('login.show');
}


}

