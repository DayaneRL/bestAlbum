<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class ComentarioAlbum extends Model
{
    Use SoftDeletes;
    protected $table = 'comentario_albums';
    protected $fillable = [
        'comentario','album_id','user_id'
    ];
}
