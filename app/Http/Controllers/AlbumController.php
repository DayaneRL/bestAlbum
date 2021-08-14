<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Album;
use App\NotaAlbum;
use App\Artista;

class AlbumController extends Controller
{
    private $album;

    public function __construct()
    {
        $this->middleware('auth', ['except' => [
            'index', 'show'
        ]]);
        $this->album = new Album();
    }

    public function index()
    {
        $albuns = $this->album->paginate(5);
        return view('album.index', compact('albuns'));
    }

    public function create()
    {
        $artistas = Artista::all();
        return view('album.create', compact('artistas'));
    }

    public function store(Request $request)
    {
        try {
            DB::beginTransaction();
            $album = new album($request->album);

             //validacao imagem
             if ($request->hasFile('imagem') && $request->file('imagem')->isValid()) {
                $name = date('HisYmd');
                $extension = $request->imagem->extension();
                $nameFile = "{$name}.{$extension}";
                $request->imagem->storeAs('/public/album', $nameFile);
                $album->imagem = $nameFile;
            }
            // return $album;
            $album->save();

            DB::commit();
            return redirect()->route('album.index')->with('success', "Album cadastrado com sucesso" );
        }  catch (ModelNotFoundException $exception) {
            return back()->withError($exception->getMessage())->withInput();
        }
    }

    public function show($name){
        $nome = UrlToName($name);
        $album = album::where('nome' , '=', $nome)->first();
       
        if($album){
            return view('album.show', compact('album'));
        }else{
            return  redirect()->route('album.index')->with('warning', "Album não encontrado" );
        }
    }

    public function edit($id)
    {
        $album = $this->album->find($id);
        return view('album.create', compact('album'));
    }

    public function update(Request $request, $id)
    {
        try {
            DB::beginTransaction();
            $album = album::find($id);
            $album->fill($request->album);
            
            //validacao imagem
            if ($request->hasFile('imagem') && $request->file('imagem')->isValid()) {
               $name = date('HisYmd');
               $extension = $request->imagem->extension();
               $nameFile = "{$name}.{$extension}";
               $request->imagem->storeAs('/public/album', $nameFile);
               $album->imagem = $nameFile;
               if(isset($album->imagem)){
                    unlink('/public/album'.$nameFile);
               }
           }
           // return $album;
           $album->update();

            DB::commit();
            return redirect()->route('album.index')->with('success', "Album cadastrado com sucesso" );
        }  catch (ModelNotFoundException $exception) {
            return back()->withError($exception->getMessage())->withInput();
        }
    }

    public function destroy($id)
    {
        try{
            $album = $this->album->find($id);
            DB::beginTransaction();
    
            $album->delete();
            DB::commit();
            return redirect()->route('album.index')->with('success', "Album deletado com sucesso" );
        }  catch (ModelNotFoundException $exception) {
            return back()->withError($exception->getMessage())->withInput();
        }
    }

    public function avaliaAlbum($user, $nota, $album){
        try{
            DB::beginTransaction();
            $nota_album = NotaAlbum::where('album_id', $album)->first();
            if(isset($nota_album->id)){
                $nota_album->nota = $nota;
                $nota_album->user_id = $user;
                $nota_album->album_id = $album;
                $nota_album->update();
            }else{
                $notaAlbum = new NotaAlbum();
                $notaAlbum->nota = $nota;
                $notaAlbum->user_id = $user;
                $notaAlbum->album_id = $album;
                $notaAlbum->save();
            }
            DB::commit();
            return ['status'=>1,'mensagem'=>"Nota registrada: $nota"];
        }catch (ModelNotFoundException $exception) {
             DB::rollBack();
            return ['status'=>0,'mensagem'=>"Não foi possível realizar essa ação!"];
        }
    }
}
