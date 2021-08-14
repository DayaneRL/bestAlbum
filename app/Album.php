<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Album extends Model
{
    Use SoftDeletes;
    protected $table = 'albums';
    protected $fillable = [
        'nome','imagem','url','artista_id'
    ];
    public $timestamps   = true;

    public function Artista()
    {
        return $this->belongsTo('App\Artista');
    }
}
