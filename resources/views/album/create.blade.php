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
                <h4>Cadastrar Álbum</h4>
            </div>
            <div class="card-body">
                <form action="{{isset($album) ? route('album.update',$album->id) : route('album.store')}}" id="formalbum" method="POST" enctype="multipart/form-data">
                    @csrf
                    @if(isset($album))
                     @method('PUT') 
                    @endif
                    
                    <div class="form-group mt-1 mb-2">
                        <label for="nome">Nome</label>
                        <input type="text" class="form-control input-shadow" required maxlength="100" placeholder="Nome" value="{{isset($album->nome)?$album->nome:''}}" id="nome" name="album[nome]">
                    </div>

                    <div class="form-group mt-1 mb-2">
                        <label for="album">Artista</label>
                        <select class="form-control input-shadow" id="album" name="album[artista_id]" required>
                            <option value="">Selecione...</option>
                            @if(isset($artistas))
                            @foreach($artistas as $artista)
                            <option value="{{$artista->id}}" {{isset($album) && $album->artista_id==$artista->id? 'selected' : ''}}>{{$artista->nome}}</option>
                            @endforeach
                            @endif
                        </select>
                    </div>

                    <div class="form-group mt-1 mb-2">
                        <div class="row">
                            <div class="col-12 col-md-6">
                                <label for="imagem">Imagem</label>
                                <input type="file" class="form-control input-shadow"  value="{{isset($album->imagem)?$album->imagem:''}}" id="imagem" name="imagem">
                            </div>
                            <div class="col-12 col-md-6">
                                <label for="url">URL </label>
                                <input type="text" class="form-control input-shadow" maxlength="100" placeholder="url" value="{{isset($album->nome)?$album->nome:''}}" id="url" name="album[url]">
                            </div>
                        </div>
                    </div>

                    <div class="text-center mb-2 mt-5">
                        <button type="submit" class="btn bg-gradient-dark">Salvar</button>
                        <a href="{{route('album.index')}}" class="btn btn-light border">Cancelar</a>
                    </div>
                </form>
            </div>
        </div>

    </div>
@endsection