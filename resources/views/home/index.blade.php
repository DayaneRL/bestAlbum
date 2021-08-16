@extends('template.app')

@section('breadcrumb')
<li class="breadcrumb-item text-sm text-dark active" aria-current="page">Início</li>
@endsection 

@section('nav-home')
active
@endsection 

@section('title')
Home
@endsection

@section('content')

    <div class="container">

        <div class="card">
            @csrf
            @auth
            <input type="hidden" id="user_id" value="{{Auth::user()->id}}">
            @endauth
            <div class="card-header text-center">
                <h3>Melhores Albuns</h3>
            </div>
            <div class="card-body">
                @if(!isset($albuns[0]))
                <div class="row mb-2">
                    <div class="col-12 col-md-2">
                        <img class="img-cover" src="../assets/img/team-3.jpg" alt="artist-cover"/>
                    </div>
                    <div class="col-12 col-sm-10">
                        <h4>Nome Album</h4>
                        <p>
                            <i class="far fa-star" id="media_1"></i>
                            <i class="far fa-star" id="media_2"></i>
                            <i class="far fa-star" id="media_3"></i>
                            <i class="far fa-star" id="media_4"></i>
                            <i class="far fa-star" id="media_5"></i>
                        </p>
                    </div>
                </div>
                @else
                    @foreach($albuns as $album)
                    <div class="row mb-2">
                        <input type="hidden" class="album_id" value="{{$album->id}}">
                        @auth
                            @php $nota = $user->NotaThisAlbum($album->id); @endphp
                            @if(isset($nota->id))<input type="hidden" class="nota_album" value="{{$nota->nota}}">@endif
                        @endauth
                        <div class="col-12 col-md-2">
                            @if(isset($album->imagem))
                                <img class="img-cover mb-3" src="{{asset('../storage/album/'.$album->imagem)}}" alt="album-cover"/>
                            @else
                                <img class="img-cover mb-3" src="../assets/img/default-album.png" alt="album-cover"/>
                            @endif
                        </div>
                        <div class="col-12 col-sm-10 ">
                            <h4><a href="{{url('album/'.nameToUrl($album->nome))}}">{{$album->nome}}</a></h4>
                            
                            <p>
                                {{-- <a class="btn-star" id="star-1"><i class="far fa-star"></i></a>
                                <a class="btn-star" id="star-2"><i class="far fa-star"></i></a>
                                <a class="btn-star" id="star-3"><i class="far fa-star"></i></a>
                                <a class="btn-star" id="star-4"><i class="far fa-star"></i></a>
                                <a class="btn-star" id="star-5"><i class="far fa-star"></i></a> --}}
                                <input type="hidden" class="media" value="{{calculaMedia($album->id)}}">
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

        <br>

        <div class="card">
            <div class="card-header text-center">
                <h3>Melhores Artistas</h3>
            </div>
            <div class="card-body">
                @if(!isset($artistas[0]))
                    <div class="row mb-2">
                        <div class="col-12 col-md-2">
                            <img class="img-cover" src="../assets/img/team-4.jpg" alt="artist-cover"/>
                        </div>
                        <div class="col-12 col-sm-10">
                            <h4>Nome Artista</h4>
                            <p>
                                <i class="far fa-star" id="media_1"></i>
                                <i class="far fa-star" id="media_2"></i>
                                <i class="far fa-star" id="media_3"></i>
                                <i class="far fa-star" id="media_4"></i>
                                <i class="far fa-star" id="media_5"></i>
                            </p>
                        </div>
                    </div>
                @else
                    @foreach($artistas as $artista)
                        <div class="row mb-2">
                            <input type="hidden" class="artista_id" value="{{$artista->id}}">
                            @auth
                                @php $nota = $user->NotaThisArtista($artista->id); @endphp
                                @if(isset($nota->id))<input type="hidden" class="nota_artista" value="{{$nota->nota}}">@endif
                            @endauth
                            <div class="col-12 col-md-2">
                                @if(isset($artista->imagem))
                                <img class="img-cover mb-3" src="{{asset('../storage/album/'.$artista->imagem)}}" alt="album-cover"/>
                                @else
                                    <img class="img-cover mb-3" src="../assets/img/default-artist.png" alt="artist-cover"/>
                                @endif
                            </div>
                            <div class="col-12 col-sm-10 ">
                                <h4><a href="{{url('artista/'.nameToUrl($artista->nome))}}">{{$artista->nome}}</a></h4>
                                
                                <p>
                                    {{-- <a class="btn-star" id="star-1"><i class="far fa-star"></i></a>
                                    <a class="btn-star" id="star-2"><i class="far fa-star"></i></a>
                                    <a class="btn-star" id="star-3"><i class="far fa-star"></i></a>
                                    <a class="btn-star" id="star-4"><i class="far fa-star"></i></a>
                                    <a class="btn-star" id="star-5"><i class="far fa-star"></i></a> --}}
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