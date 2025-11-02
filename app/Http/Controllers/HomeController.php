<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;

class HomeController extends Controller
{
    public function index()
    {

        $posts = Post::all();
        return view('home.home', ['posts' => $posts]);
    }
}
