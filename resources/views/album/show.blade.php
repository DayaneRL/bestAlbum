@extends('template.app')

@section('nav-albuns')
active
@endsection 

@section('breadcrumb')
<li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="{{route('home')}}">Início</a></li>
<li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="{{route('album.index')}}">Álbuns</a></li>
<li class="breadcrumb-item text-sm text-dark active" aria-current="page">Cadastrar Álbum</li>
@endsection 

@section('title')
Cadastrar Álbum
@endsection

@section('content')
    <div class="container">

        <div class="card">
            <div class="card-header text-center">
                <h5>Nome Álbum</h5>
            </div>
            <div class="card-body">
                <div class="text-center">
                    <img class="img-cover-show mb-3" src="../assets/img/team-3.jpg" alt="artist-cover"/>

                    <p><b>Artista: </b>Nome Artista</p>
                    <p><b>Nota: </b>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="far fa-star"></i>
                        <i class="far fa-star"></i>
                    </p>
                    <p><b>Site: </b> veralbum.com.br</p>
                </div>

                <div class="float-left">
                    <h6>Comentários</h6>
                    
                </div>
            </div>
        </div>

    </div>
@endsection