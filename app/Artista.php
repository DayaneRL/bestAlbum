<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Artista extends Model
{
    Use SoftDeletes;
    protected $table = 'artistas';
    protected $fillable = [
        'nome','dt_nascimento','genero','url'
    ];
    public $timestamps   = true;

    // public function Imovel()
    // {
    //     return $this->hasMany('App\Models\Imovel');
    // }

    // public function sublocalidade() {
    //     return $this->hasMany('App\Models\SubLocalidades', 'localidade_id', 'id');
    // }
}
