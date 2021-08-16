<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\NotaAlbum;
use App\NotaArtista;

class UserController extends Controller
{
    private $user;

    public function __construct()
    {
        $this->user = new User();
        $this->middleware('auth');
    }

    public function show($id)
    {
        $user = User::find($id);
        $notasArtista = NotaArtista::where('user_id', $user->id)->get();
        $notasAlbum = NotaAlbum::where('user_id', $user->id)->get();
        
        return view('users.show', compact('user','notasArtista','notasAlbum'));
    }

    public function edit($id)
    {
        $user = $this->user->find($id);
        return view('users.create', compact('user'));
    }

    public function update(Request $request, $id)
    {
        try {
            DB::beginTransaction();

            if(($request->user['password'] && $request->user['password_confirmar']) 
                && $request->user['password'] != $request->user['password_confirmar']){
                    return back()->withInput()->with('error', "A confirmação para o campo Senha não coincide.");
            }else if(isset($request->user['password']) && strlen($request->user['password'])<8){
                return back()->withInput()->with('error', "A senha deve conter pelo menos 8 caracteres.");
            }

            $user = $this->user->find($id);
            $password = $user->password;
            $user->fill($request->user);

            if($request->user['password']) {$user->password = Hash::make($request->user['password']);}
            else{ $user->password=$password;}
            $user->update();

            DB::commit();
            return redirect()->route('user.show',$id)->with('success', "user atualizado com sucesso" );
        }  catch (ModelNotFoundException $exception) {
            return back()->withError($exception->getMessage())->withInput();
        }
    }
}
