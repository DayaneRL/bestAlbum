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
                <div class="row">
                    <div class="col-12 col-md-6 offset-md-3">
                        <form method="POST" action="{{route('findArtista','')}}">
                            @csrf
                            <select class="form-control input-shadow" name="artista" id="artista">
                                <option value="" >Selecione Artista...</option>
                                @foreach($artistas as $artista)
                                <option value="{{nameToUrl($artista->nome)}}" >{{$artista->nome}}</option>
                                @endforeach
                            </select>
                        </form>
                    </div>
                    <div class="col-12 col-md-3">
                        <a class="btn btn-sm btn-white border" style="float:right" href="{{route('album.create')}}">
                        Cadastrar Álbum</a>
                    </div>
                </div>
                
            </div>
            @include('template.flash-message')
            <div class="card-body">
                @if(!isset($albuns[0]))
               
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
                            <img class="img-cover border" src="{{asset('../assets/img/default-album.png')}}" alt="album-cover"/>
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

                @if($albuns->total() > 3)
                <div class="row text-secondary">
                    <div class="col-sm-12 col-md-5">
                    </div>
                    <div class="col-sm-12 col-md-7">
                        <div class="float-right show-shadow" style="height: 37px;">{{$albuns->links()}}</div>
                    </div>
                </div>
                @endif
            </div>
        </div>

    </div>
@endsection

@section('script')
<script>
    $(document).on('change','#artista',function(){
        let artista = $('#artista').val();
        let form =$('#artista').parents('form');
        let action = $(form).attr('action')
        console.log(artista)
        console.log(action)
        if(artista){
            $(form).attr('action', action+'/'+artista);
            $('#artista').parents('form').submit();
        }
    })
</script>
@endsection