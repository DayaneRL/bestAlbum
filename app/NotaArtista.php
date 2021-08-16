<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class NotaArtista extends Model
{
    Use SoftDeletes;
    protected $table = 'nota_artistas';
    protected $fillable = [
        'nota','artista_id','user_id'
    ];

    public function Users(){
        return $this->hasOne('App\User', 'id', 'user_id');
    }

    public function Artista(){
        return $this->hasOne('App\Artista', 'id', 'artista_id');
    }
}
