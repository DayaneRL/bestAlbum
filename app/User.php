<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\NotaAlbum;
use App\NotaArtista;
use Illuminate\Support\Facades\Auth;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function NotasAlbum(){
        return $this->hasMany('App\NotaAlbum', 'user_id', 'id');
    }
    public function NotasArtista(){
        return $this->hasMany('App\NotaArtista', 'user_id', 'id');
    }

    public function NotaThisAlbum($album_id){
        $notas = NotaAlbum::where('user_id', Auth::user()->id)->where('album_id', $album_id)->first();
        return $notas;
    }

    public function NotaThisArtista($artista_id){
        $nota = NotaArtista::where('user_id', Auth::user()->id)->where('artista_id', $artista_id)->first();
        return $nota;
    }
}
