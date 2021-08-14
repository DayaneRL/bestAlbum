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
        $artistas = $this->artista->paginate(5);
        return view('artista.index', compact('artistas'));
    }

    public function create()
    {
        return view('artista.create');
    }

    public function store(Request $request)
    {
        try {
            DB::beginTransaction();

            $artista = new Artista($request->artista);
            $artista['dt_nascimento'] = dateToMySQL($request->artista['dt_nascimento']);
            $artista->save();
            
            DB::commit();
            return redirect()->route('artista.index')->with('success', "Artista cadastrado com sucesso" );
        }  catch (ModelNotFoundException $exception) {
            return back()->withError($exception->getMessage())->withInput();
        }
    }

    public function show($name){
        $nome = UrlToName($name);
        $artista = Artista::where('nome' , '=', $nome)->first();
       
        if($artista){
            return view('artista.show', compact('artista'));
        }else{
            return  redirect()->route('artista.index')->with('warning', "Artista não encontrado" );
        }
    }

    public function edit($id)
    {
        $artista = $this->artista->find($id);
        return view('artista.create', compact('artista'));
    }

    public function update(Request $request, $id)
    {
        try {
            DB::beginTransaction();
            $artista = Artista::find($id);
            $artista->fill($request->artista);
            $artista['dt_nascimento'] = dateToMySQL($request->artista['dt_nascimento']);
            $artista->update();

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
