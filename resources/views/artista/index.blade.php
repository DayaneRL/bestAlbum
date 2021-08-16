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
                <div class="row">
                    <div class="col-12 col-md-6 offset-md-3">
                        <form method="POST" action="{{route('findGenero','')}}">
                            @csrf
                            <select class="form-control input-shadow" name="genero" id="genero">
                                <option value="" >Selecione Genero...</option>
                                <option value="Alternativo" >Alternativo</option>
                                <option value="Funk"  >Funk</option>
                                <option value="Indie" >Indie</option>
                                <option value="MPB" >Mpb</option>
                                <option value="Pagode" >Pagode</option>
                                <option value="Pop" >Pop</option>
                                <option value="Rock" >Rock</option>
                                <option value="Sertanejo">Sertanejo</option>
                            </select>
                        </form>
                    </div>
                    <div class="col-12 col-md-3">
                        <a class="btn btn-white border" style="float:right" href="{{route('artista.create')}}">
                            Cadastrar Artista
                          </a>
                    </div>
                </div>
                
            </div>
            @include('template.flash-message')
            <div class="card-body">
                @if(!isset($artistas[0]))
               
                @else
                @foreach ($artistas as $artista)
                    <div class="row mb-2">
                        <input type="hidden" class="artista_id" value="{{$artista->id}}">
                       
                        <div class="col-12 col-md-2">
                            @if(isset($artista->imagem))
                                <img class="img-cover mb-3" src="{{asset('../storage/album/'.$artista->imagem)}}" alt="artist-cover"/>
                            @else
                                <img class="img-cover mb-3" src="{{asset('../assets/img/default-artist.png')}}" alt="artist-cover"/>
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

                @if($artistas->total() > 3)
                <div class="row text-secondary">
                    <div class="col-sm-12 col-md-5">
                    </div>
                    <div class="col-sm-12 col-md-7">
                        <div class="float-right show-shadow" style="height: 37px;">{{$artistas->links()}}</div>
                    </div>
                </div>
                @endif
            </div>
        </div>

    </div>
@endsection

@section('script')
<script>
    $(document).on('change','#genero',function(){
        let genero = $('#genero').val();
        let form =$('#genero').parents('form');
        let action = $(form).attr('action')
        if(genero){
            $(form).attr('action', action+'/'+genero);
            $('#genero').parents('form').submit();
        }
    })
</script>
@endsection