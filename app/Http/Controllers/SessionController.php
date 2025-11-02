<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\Request;

class SessionController extends Controller
{

    public function create(){
        return view('auth.login');
    }

    public function store(Request $request){
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if(! Auth::attempt($credentials))
        throw ValidationException::withMessages([
            'email' => 'The provided credentials are incorrect.'
        ]);

        return redirect('/home');
    }

    public function destroy(){
        Auth::logout();
        return redirect('/login');
    }
}
