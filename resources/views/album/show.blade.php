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
            <div class="card-header">
                <a class="btn btn-sm btn-white border" style="float:right" href="{{route('album.edit', $album->id)}}">
                    Editar
                </a>
                {{-- <h5>{{$album->nome}}</h5> --}}
            </div>
            <div class="card-body">
                <div class="text-center">
                    @if(isset($album->imagem))
                        <img class="img-cover mb-3" src="{{asset('../storage/album/'.$album->imagem)}}" alt="album-cover"/>
                    @else
                        <img class="img-cover mb-3" src="../assets/img/default-album.png" alt="album-cover"/>
                    @endif
                    
                    <h5>{{$album->nome}}</h5>
                    <p><b>Nota: </b>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="far fa-star"></i>
                        <i class="far fa-star"></i>
                    </p>
                    <p><b>Artista: </b> <a href="{{url('artista/'.nameToUrl($artista->nome))}}">{{$album->Artista->nome}}</a></p>
                    <p><b>Site: </b>  <a target="_blank" href="http://{{$artista->url}}">{{$album->url}}</a></p>
                </div>

                <div class="float-left">
                    <h6>Comentários</h6>
                    
                </div>
            </div>
        </div>

    </div>
@endsection