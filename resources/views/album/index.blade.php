@extends('template.app')

@section('nav-albuns')
active
@endsection 

@section('breadcrumb')
<li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="{{route('home')}}">Início</a></li>
<li class="breadcrumb-item text-sm text-dark active" aria-current="page">Álbuns</li>
@endsection 

@section('title')
Álbuns
@endsection

@section('content')
    <div class="container">
        @csrf
        @auth
        <input type="hidden" id="user_id" value="{{Auth::user()->id}}">
        @endauth
        <div class="card">
            <div class="card-header">
                <a class="btn btn-sm btn-white border" style="float:right" href="{{route('album.create')}}">
                    Cadastrar Álbum
                  </a>
                <div class=" text-center">
                    <h2>Álbuns</h2>
                </div>
            </div>
            @include('template.flash-message')
            <div class="card-body">
                @if(!isset($albuns[0]))
                <div class="row mb-2">
                    <div class="col-12 col-md-2">
                       
                        <img class="img-cover" src="../assets/img/team-3.jpg" alt="artist-cover"/>
                    </div>
                    <div class="col-12 col-sm-10">
                        <h4>Nome Álbum</h4>
                        <p>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="far fa-star"></i>
                        </p>
                    </div>
                </div>
                @else
                @foreach ($albuns as $album)
                    <div class="row mb-2">
                        <input type="hidden" class="album_id" value="{{$album->id}}">
                        @auth
                            @php $nota = $user->NotaThisAlbum($album->id); @endphp
                            @if(isset($nota->id))<input type="hidden" class="nota_album" value="{{$nota->nota}}">@endif
                        @endauth
                        <div class="col-12 col-md-2">
                            @if(isset($album->imagem))
                            <img class="img-cover border" src="{{asset('../storage/album/'.$album->imagem)}}" alt="album-cover"/>
                            @else
                            <img class="img-cover border" src="../assets/img/default-album.png" alt="album-cover"/>
                            @endif
                        </div>
                        <div class="col-12 col-sm-10 ">
                            <h4><a href="{{url('album/'.nameToUrl($album->nome))}}">{{$album->nome}}</a></h4>
                                <p>
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

    </div>
@endsection