<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::resources([
    '/artista'  =>  'ArtistaController',
    '/album'    =>  'AlbumController',
    '/user'     =>  'UserController'
]);

Route::get('/', 'HomeController@home')->name('home');
Route::get('/template', function () { return view('template.dashboard');});

Route::get('artista/{nome}', 'ArtistaController@show')->name('findArtist');
Route::get('album/{nome}', 'AlbumController@show');
Route::post('nota-album/{user}-{nota}-{album}', 'AlbumController@avaliaAlbum');
Route::post('nota-artista/{user}-{nota}-{artista}', 'ArtistaController@avaliaArtista');

Route::delete('delete-nota-album/{nota_album_id}', 'AlbumController@destroyNotaAlbum');
Route::delete('delete-nota-artista/{nota_artista_id}', 'ArtistaController@destroyNotaArtista');

Auth::routes();

Route::get('/home', function(){
    return redirect('/');
});
