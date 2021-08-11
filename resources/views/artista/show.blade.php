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
            <div class="card-header text-center">
                <h5>Nome Artista</h5>
            </div>
            <div class="card-body">
                <div class="text-center">
                    <img class="img-cover-show mb-3" src="../assets/img/team-4.jpg" alt="artist-cover"/>
                    
                    <p>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="far fa-star"></i>
                        <i class="far fa-star"></i>
                    </p>
                    <p><b>Data de Nascimento: </b>xx/xx/xxxx</p>
                    <p><b>Gênero: </b>MPB</p>
                    <p><b>Site oficial: </b> siteartista.com.br</p>
                </div>
            </div>
        </div>

    </div>
@endsection