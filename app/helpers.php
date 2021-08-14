<?php

use App\User;

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

?>