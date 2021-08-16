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
            @csrf
            @auth
            <input type="hidden" id="user_id" value="{{Auth::user()->id}}">
            @endauth
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
                @if(!isset($artistas[0]))
                <div class="row mb-2">
                    <div class="col-12 col-md-2">
                        <img class="img-cover" src="../assets/img/team-4.jpg" alt="artist-cover"/>
                    </div>
                    <div class="col-12 col-sm-10">
                        <h4>Nome Artista</h4>
                        <p>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="far fa-star"></i>
                            <i class="far fa-star"></i>
                        </p>
                    </div>
                </div>
                @else
                @foreach ($artistas as $artista)
                    <div class="row mb-2">
                        <input type="hidden" class="artista_id" value="{{$artista->id}}">
                       
                        <div class="col-12 col-md-2">
                            @if(isset($artista->imagem))
                                <img class="img-cover mb-3" src="{{asset('../storage/album/'.$artista->imagem)}}" alt="artist-cover"/>
                            @else
                                <img class="img-cover mb-3" src="../assets/img/default-artist.png" alt="artist-cover"/>
                            @endif
                        </div>
                        <div class="col-12 col-sm-10 ">
                            <h4><a href="{{url('artista/'.nameToUrl($artista->nome))}}">{{$artista->nome}}</a></h4>
                            
                            <p>
                                <input type="hidden" class="media" value="{{calculaMediaArtista($artista->id)}}">
                                <i class="far fa-star" id="media_1"></i>
                                <i class="far fa-star" id="media_2"></i>
                                <i class="far fa-star" id="media_3"></i>
                                <i class="far fa-star" id="media_4"></i>
                                <i class="far fa-star" id="media_5"></i>
                            </p>
                            
                           
                        </div>
                    </div>
                @endforeach
                @endif
            </div>
        </div>

    </div>
@endsection
