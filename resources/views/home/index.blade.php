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
            @auth
            <input type="hidden" id="user_id" value="{{Auth::user()->id}}">
            @csrf
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
                            <a class="btn-star" id="star-1"><i class="far fa-star"></i></a>
                            <a class="btn-star" id="star-2"><i class="far fa-star"></i></a>
                            <a class="btn-star" id="star-3"><i class="far fa-star"></i></a>
                            <a class="btn-star" id="star-4"><i class="far fa-star"></i></a>
                            <a class="btn-star" id="star-5"><i class="far fa-star"></i></a>
                        </p>
                    </div>
                </div>
                @else
                    @foreach($albuns as $album)
                    <div class="row mb-2">
                        <input type="hidden" class="album_id" value="{{$album->id}}">
                        <div class="col-12 col-md-2">
                            @if(isset($album->imagem))
                                <img class="img-cover mb-3" src="{{asset('../storage/album/'.$album->imagem)}}" alt="album-cover"/>
                            @else
                                <img class="img-cover mb-3" src="../assets/img/default-album.png" alt="album-cover"/>
                            @endif
                        </div>
                        <div class="col-12 col-sm-10">
                            <h4>{{$album->nome}}</h4>
                            <p>
                                <a class="btn-star" id="star-1"><i class="far fa-star"></i></a>
                                <a class="btn-star" id="star-2"><i class="far fa-star"></i></a>
                                <a class="btn-star" id="star-3"><i class="far fa-star"></i></a>
                                <a class="btn-star" id="star-4"><i class="far fa-star"></i></a>
                                <a class="btn-star" id="star-5"><i class="far fa-star"></i></a>
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
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="far fa-star"></i>
                            </p>
                        </div>
                    </div>
                @else
                    @foreach($artistas as $artista)
                        <div class="row mb-2">
                            <div class="col-12 col-md-2">
                                @if(isset($artista->imagem))
                                <img class="img-cover mb-3" src="{{asset('../storage/album/'.$artista->imagem)}}" alt="album-cover"/>
                                @else
                                    <img class="img-cover mb-3" src="../assets/img/team-4.jpg" alt="artist-cover"/>
                                @endif
                            </div>
                            <div class="col-12 col-sm-10">
                                <h4>{{$artista->nome}}</h4>
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

@section('script')
<script>
    $('.btn-star').click(async function(){
        let this_id = $(this).attr('id');
        let clicked = this;
        $(this).parents('p').find('a').each(function(){
            if($(this).attr('id') <= this_id){
                $(this).find('i').attr('class', 'fas fa-star');
            }else if($(this).attr('id') > this_id){    
                $(this).find('i').attr('class', 'far fa-star');
            }
        })

        let classe_id = this_id.split('-');
        let nota = classe_id[1];
        let id = $("#user_id").val();
        let album = $(this).parents(".row").find(".album_id").val();
        let token =  document.getElementsByName("_token")[0].value;
        if(id.length>0 && token.length>0){
            const mudanca = realizarMudanca();
            let resultado = await mudanca.enviaNotaAlbum(id, token, nota,album);
            
            if(resultado.status==1){ 
                console.log(resultado.mensagem)
            }else{
                console.log('ERRO: '+ resultado.status)
                console.log(resultado.mensagem)
            }
        }else{
            console.log('usuario nao esta logado');
            //confirm.jquery fazer login
        }
    })

    function realizarMudanca() {
        return { 
            enviaNotaAlbum(id, token, nota, album){
                return new Promise((resolve, reject) => {
                    $.ajax({
                        type: 'POST',
                        url: 'nota-album/'+id+'-'+nota+'-'+album,
                        data: {
                            "_token": token,
                            "id": id
                        },
                        success: function(response){
                            resolve(response)
                        }
                    })
                })
            }   
        }
    }
    
</script>
@endsection