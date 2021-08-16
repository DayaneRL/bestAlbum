<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Artista;
use App\NotaArtista;
use App\User;

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
        $artistas = $this->artista->paginate(3);
        $user = Auth::user()?User::find(Auth::user()->id):'';
        return view('artista.index', compact('artistas','user'));
    }

    public function indexGenero($genero)
    {
        $artistas = $this->artista->where('genero',$genero)->paginate(3);
        $user = Auth::user()?User::find(Auth::user()->id):'';
        return view('artista.index', compact('artistas','user'));
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
        $user = Auth::user()?User::find(Auth::user()->id):'';
        $media = calculaMediaArtista($artista->id);
        
        if($artista){
            return view('artista.show', compact('artista','user','media'));
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

    public function avaliaArtista($user, $nota, $artista){
        try{
            DB::beginTransaction();
            $nota_artista = NotaArtista::where('artista_id', $artista)->first();
            if(isset($nota_artista->id)){
                $nota_artista->nota = $nota;
                $nota_artista->user_id = $user;
                $nota_artista->artista_id = $artista;
                $nota_artista->update();
            }else{
                $nota_artista = new NotaArtista();
                $nota_artista->nota = $nota;
                $nota_artista->user_id = $user;
                $nota_artista->artista_id = $artista;
                $nota_artista->save();
            }
            DB::commit();
            return ['status'=>1,'mensagem'=>"Nota registrada: $nota", "nota_id"=>$nota_artista->id];
        }catch (ModelNotFoundException $exception) {
             DB::rollBack();
            return ['status'=>0,'mensagem'=>"Não foi possível realizar essa ação!"];
        }
    }

    public function destroyNotaArtista($nota_artista_id){
        try{
            DB::beginTransaction();
            $nota_artista = NotaArtista::find($nota_artista_id);
            $nota_artista->delete();
            DB::commit();
            return ['status'=>1,'mensagem'=>"Nota artista deletada: $nota_artista_id"];
        }catch (ModelNotFoundException $exception) {
             DB::rollBack();
            return ['status'=>0,'mensagem'=>"Não foi possível realizar essa ação!"];
        }
    }
}
