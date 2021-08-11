<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Artista;

class ArtistaController extends Controller
{
    private $artista;

    public function __construct()
    {
        $this->middleware('auth', ['except' => [
            'index', 'show'
        ]]);
        $this->artista = new Artista();
    }

    public function index()
    {
        // $artista = $this->artista->paginate(5);
        // return view('artista.index', compact('artistas'));
        return view('artista.index');
    }

    public function create()
    {
        // $user = Auth::user();
        // return view('artista.create', compact('user',''));
        return view('artista.create');
    }

    public function store(Request $request)
    {
        try {
            $artista = new Artista;
            DB::beginTransaction();
            //

            DB::commit();
            return redirect()->route('artista.index')->with('success', "Artista cadastrado com sucesso" );
        }  catch (ModelNotFoundException $exception) {
            return back()->withError($exception->getMessage())->withInput();
        }
    }

    public function edit($id)
    {
        $artista = $this->artista->find($id);
        return view('artista.create', compact('artista'));
    }

    public function update(Request $request)
    {
        try {
            $artista = new Artista;
            DB::beginTransaction();
            //

            DB::commit();
            return redirect()->route('artista.index')->with('success', "Artista cadastrado com sucesso" );
        }  catch (ModelNotFoundException $exception) {
            return back()->withError($exception->getMessage())->withInput();
        }
    }

    public function destroy($id)
    {
        try{
            $artista = $this->artista->find($id);
            DB::beginTransaction();
    
            $artista->delete();
            DB::commit();
            return redirect()->route('artista.index')->with('success', "Artista deletado com sucesso" );
        }  catch (ModelNotFoundException $exception) {
            return back()->withError($exception->getMessage())->withInput();
        }
    }
}
