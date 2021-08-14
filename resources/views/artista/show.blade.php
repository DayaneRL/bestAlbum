@extends('template.app')

@section('nav-artistas')
active
@endsection 

@section('breadcrumb')
<li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="{{route('home')}}">Início</a></li>
<li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="{{route('artista.index')}}">Artistas</a></li>
<li class="breadcrumb-item text-sm text-dark active" aria-current="page">Nome Artista</li>
@endsection 

@section('title')
Nome artista
@endsection

@section('content')
    <div class="container">

        <div class="card">
            <div class="card-header">
                <a class="btn btn-sm btn-white border" style="float:right" href="{{route('artista.edit', $artista->id)}}">
                    Editar
                </a>
                
            </div>
            <div class="card-body">
                <div class="text-center">
                    <img class="img-cover-show mb-3 border" src="../assets/img/default-artist.png" alt="artist-cover"/>
                    <h5>{{$artista->nome}}</h5>
                    <p>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="far fa-star"></i>
                    </p>
                    <p><b>Data de Nascimento: </b>{{dateToPTBR($artista->dt_nascimento)}}</p>
                    <p><b>Gênero: </b>{{$artista->genero}}</p>
                    <p><b>Site oficial: </b> <a target="_blank" href="http://{{$artista->url}}">{{$artista->url}}</a></p>
                </div>
            </div>
        </div>

    </div>
@endsection