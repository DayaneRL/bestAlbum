<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::resources([
    '/artista'  =>  'ArtistaController',
    '/album'  =>  'AlbumController',
    '/user'     => 'UserController'
]);

Route::get('/', 'HomeController@home')->name('home');
Route::get('/template', function () { return view('template.dashboard');});

Route::get('artista/{nome}', 'ArtistaController@show')->name('findArtist');
Route::get('album/{nome}', 'AlbumController@show');
Route::post('nota-album/{user}-{nota}-{album}', 'AlbumController@avaliaAlbum');

Auth::routes();

Route::get('/home', function(){
    return redirect('/');
});
