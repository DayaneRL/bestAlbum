<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Album extends Model
{
    Use SoftDeletes;
    protected $table = 'album';
    protected $fillable = [
        'imagem','url','artista_id'
    ];
}
