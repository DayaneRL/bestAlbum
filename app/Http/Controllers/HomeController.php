<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Album;
use App\User;
use App\Artista;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => [
            'home'
        ]]);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function home(){
        $albuns = Album::limit(3)->get();
        $user = Auth::user()?User::find(Auth::user()->id):'';
        $artistas = Artista::limit(3)->get();
        return view('home.index', compact('albuns','artistas','user'));
    }
}
