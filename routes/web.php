<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::resources([
    '/artista'  =>  'ArtistaController',
    '/album'  =>  'AlbumController',
    '/user'     => 'UserController'
]);

Route::get('/', function () {
    return view('home.index');
})->name('home');
Route::get('/template', function () { return view('template.dashboard');});

Auth::routes();

Route::get('/home', function(){
    return redirect('/');
});
