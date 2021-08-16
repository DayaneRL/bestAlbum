@extends('template.app')

@section('nav-artistas')
active
@endsection 

@section('breadcrumb')
<li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="{{route('home')}}">Início</a></li>
<li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="{{route('artista.index')}}">Artistas</a></li>
<li class="breadcrumb-item text-sm text-dark active" aria-current="page">{{$artista->nome}}</li>
@endsection 

@section('title')
{{$artista->nome}}
@endsection

@section('content')
    <div class="container">
        @csrf
        @auth
        <input type="hidden" id="user_id" value="{{Auth::user()->id}}">
        @endauth
        <div class="card">
            <div class="card-header">
                <a class="btn btn-sm btn-white border" style="float:right" href="{{route('artista.edit', $artista->id)}}">
                    Editar </a>
            </div>
            <div class="card-body">
                <div class="text-center">
                    @if(isset($artista->imagem))
                        <img class="img-cover mb-3" src="{{asset('../storage/artista/'.$artista->imagem)}}" alt="artist-cover"/>
                    @else
                        <img class="img-cover mb-3" src="../assets/img/default-artist.png" alt="artist-cover"/>
                    @endif

                    <div class="row">
                        <input type="hidden" class="artista_id" value="{{$artista->id}}">
                        @auth
                            @php $nota = $user->NotaThisArtista($artista->id); @endphp
                            @if(isset($nota->id))<input type="hidden" class="nota_artista" value="{{$nota->nota}}">@endif
                        @endauth
                        <h5>{{$artista->nome}}</h5>

                        <div class="row artista-show">
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
                                @if(isset($nota->id))<input type="hidden" class="nota_artista_id" value="{{$nota->id}}">@endif
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
                        <p><b>Data de Nascimento: </b>{{dateToPTBR($artista->dt_nascimento)}}</p>
                        <p><b>Gênero: </b>{{$artista->genero}}</p>
                        <p><b>Site oficial: </b> <a target="_blank" href="http://{{$artista->url}}">{{$artista->url}}</a></p>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection