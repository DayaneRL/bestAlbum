<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Album;

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
        // $albums = $this->album->paginate(5);
        // return view('album.index', compact('albums'));
        return view('album.index');
    }

    public function create()
    {
        // $user = Auth::user();
        // return view('album.create', compact('user',''));
        return view('album.create');
    }

    public function store(Request $request)
    {
        try {
            $album = new Album;
            DB::beginTransaction();
            //

            DB::commit();
            return redirect()->route('album.index')->with('success', "Album cadastrado com sucesso" );
        }  catch (ModelNotFoundException $exception) {
            return back()->withError($exception->getMessage())->withInput();
        }
    }

    public function edit($id)
    {
        $album = $this->album->find($id);
        return view('album.create', compact('album'));
    }

    public function update(Request $request)
    {
        try {
            $album = new Album;
            DB::beginTransaction();
            //

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
}
