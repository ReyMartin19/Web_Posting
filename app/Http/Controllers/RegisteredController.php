<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class RegisteredController extends Controller
{
    public function create(){
        return view('auth.register');
    }

    public function store(Request $request){
        $attributes = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed|min:3'
        ]);

        $user = User::create($attributes);

        Auth::login($user);

        return redirect('/post');
    }
}
