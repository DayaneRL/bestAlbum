<?php

use App\User;
use App\Album;
use App\NotaAlbum;
use App\NotaArtista;

function changeDateFormate($date,$date_format){
    return \Carbon\Carbon::createFromFormat('Y-m-d', $date)->format($date_format);    
}
function dateToPTBR($date){
    $result = new DateTime($date);
    return $result->format("d/m/Y"); 
}

function datetimeToPTBR($date){
    $result = new DateTime($date);
    return $result->format("d/m/Y h:m"); 
}

function dateToMySQL($date) {
    $result = explode("/", $date);
    return "{$result[2]}-{$result[1]}-{$result[0]}";
}

function nameToUrl($name){
    $nameUrl = str_replace(" ", "-", $name);
    return $nameUrl;
}

function UrlToName($name_url){
    $nome = str_replace("-", " ", $name_url);
    return $nome;
}

function calculaMedia($album_id){
    $albuns = NotaAlbum::where('album_id', $album_id)->get();
    $soma = 0;
    foreach($albuns as $album){
        $soma += $album->nota;
    }
    if($soma>0){
        $quant = $albuns->count();
        $resultado = $soma/$quant;
        return $resultado;
    }else{
        return 0;
    }
}

function calculaMediaArtista($artista_id){
    $artistas = NotaArtista::where('artista_id', $artista_id)->get();
    $soma = 0;
    foreach($artistas as $artista){
        $soma += $artista->nota;
    }
    if($soma>0){
        $quant = $artistas->count();
        $resultado = $soma/$quant;
        return $resultado;
    }else{
        return 0;
    }
}

?>