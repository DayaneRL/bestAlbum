<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class NotaAlbum extends Model
{
    Use SoftDeletes;
    protected $table = 'nota_albums';
    protected $fillable = [
        'nota','album_id','user_id'
    ];
}
