@extends('template.app')

@section('nav-albuns')
active
@endsection 

@section('breadcrumb')
<li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="{{route('home')}}">Início</a></li>
<li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="{{route('album.index')}}">Álbuns</a></li>
<li class="breadcrumb-item text-sm text-dark active" aria-current="page">{{$album->nome}}</li>
@endsection 

@section('title')
{{$album->nome}}
@endsection

@section('content')
    <div class="container">
        @csrf
        @auth
        <input type="hidden" id="user_id" value="{{Auth::user()->id}}">
        @endauth
        <div class="card">
            <div class="card-header">
                <a class="btn btn-sm btn-white border" style="float:right" href="{{route('album.edit', $album->id)}}">
                    Editar
                </a>
            </div>
            <div class="card-body">
                <div class="text-center">
                    @if(isset($album->imagem))
                        <img class="img-cover mb-3" src="{{asset('../storage/album/'.$album->imagem)}}" alt="album-cover"/>
                    @else
                        <img class="img-cover mb-3" src="../assets/img/default-album.png" alt="album-cover"/>
                    @endif
                    
                    <div class="row">
                        <input type="hidden" class="album_id" value="{{$album->id}}">
                        @auth
                            @php $nota = $user->NotaThisAlbum($album->id); @endphp
                            @if(isset($nota->id))<input type="hidden" class="nota_album" value="{{$nota->nota}}">@endif
                        @endauth
                        <h5>{{$album->nome}}</h5>

                        <div class="row album-show">
                            <div class="col-12 col-md-4 offset-md-4">
                            <p>
                                <a class="btn-star" id="star-1"><i class="far fa-star"></i></a>
                                    <a class="btn-star" id="star-2"><i class="far fa-star"></i></a>
                                    <a class="btn-star" id="star-3"><i class="far fa-star"></i></a>
                                    <a class="btn-star" id="star-4"><i class="far fa-star"></i></a>
                                    <a class="btn-star" id="star-5"><i class="far fa-star"></i></a>
                                </p>
                            </div>
                            @if(isset($nota->id))
                            <div class="col-12 col-md-1">
                                @if(isset($nota->id))<input type="hidden" class="nota_album_id" value="{{$nota->id}}">@endif
                                <p>  <a class="btn-delete" id=""><i class="fas fa-trash"></i></a> </p>
                            </div>
                            @endif
                        </div>

                        @if(isset($media))
                        <p><b>Média: </b>
                            <input type="hidden" class="media" value="{{$media}}">
                            <i class="far fa-star" id="media_1"></i>
                            <i class="far fa-star" id="media_2"></i>
                            <i class="far fa-star" id="media_3"></i>
                            <i class="far fa-star" id="media_4"></i>
                            <i class="far fa-star" id="media_5"></i>
                        </p>
                        @endif
                        <p><b>Artista: </b> <a href="{{url('artista/'.nameToUrl($album->Artista->nome))}}">{{$album->Artista->nome}}</a></p>
                        <p><b>Site: </b>  <a target="_blank" href="http://{{$album->url}}">{{$album->url}}</a></p>
                    </div>
                </div>

            </div>
        </div>

    </div>
@endsection