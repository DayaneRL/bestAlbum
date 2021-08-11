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
}
