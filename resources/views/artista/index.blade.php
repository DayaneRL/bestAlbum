@extends('template.app')

@section('nav-artistas')
active
@endsection 

@section('breadcrumb')
<li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="{{route('home')}}">Início</a></li>
<li class="breadcrumb-item text-sm text-dark active" aria-current="page">Artistas</li>
@endsection 

@section('title')
Artistas
@endsection

@section('content')
    <div class="container">

        <div class="card">
            <div class="card-header">
                <a class="btn btn-sm btn-white border" style="float:right" href="{{route('artista.create')}}">
                    Cadastrar Artista
                  </a>
                <div class=" text-center">
                    <h2>Artistas</h2>
                </div>
            </div>
            @include('template.flash-message')
            <div class="card-body">
                <div class="row mb-2">
                    <div class="col-12 col-md-2">
                        <img class="img-cover" src="../assets/img/team-4.jpg" alt="artist-cover"/>
                    </div>
                    <div class="col-12 col-sm-10">
                        <h4>Nome Artista Exemplo</h4>
                        <p>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="far fa-star"></i>
                            <i class="far fa-star"></i>
                        </p>
                    </div>
                </div>
                @if(isset($artistas))
                @foreach ($artistas as $artista)
                    <div class="row mb-2">
                        <div class="col-12 col-md-2">
                            <img class="img-cover border" src="../assets/img/default-artist.png" alt="artist-cover"/>
                        </div>
                        <div class="col-12 col-sm-10">
                        <h4><a href="{{url('artista/'.nameToUrl($artista->nome))}}">{{$artista->nome}}</a></h4>
                            <p>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="far fa-star"></i>
                            </p>
                        </div>
                    </div>
                @endforeach
                @endif
            </div>
        </div>

    </div>
@endsection
