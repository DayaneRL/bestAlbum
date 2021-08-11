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
                <form action="{{isset($artista) ? route('artista.update',$artista->id) : route('artista.store')}}" id="formArtista" method="POST" enctype="multipart/form-data">
                    @csrf
                    @if(isset($artista))
                     @method('PUT') 
                    @endif
                    
                    <div class="form-group mt-1 mb-2">
                        <label for="nome">Nome</label>
                        <input type="text" class="form-control input-shadow" maxlength="100" placeholder="Nome" value="" id="nome" name="nome">
                    </div>

                    <div class="form-group mt-1 mb-2">
                        <label for="artista">Artista</label>
                        <select class="form-control input-shadow" id="Artista" name="artista">
                            <option value="">Selecione...</option>
                        </select>
                    </div>

                    <div class="form-group mt-1 mb-2">
                        <div class="row">
                            <div class="col-12 col-md-6">
                                <label for="imagem">Imagem</label>
                                <input type="file" class="form-control input-shadow" placeholder="00/00/0000" value="" id="imagem" name="imagem">
                            </div>
                            <div class="col-12 col-md-6">
                                <label for="url">URL </label>
                                <input type="text" class="form-control input-shadow" maxlength="100" placeholder="url" value="" id="url" name="url">
                            </div>
                        </div>
                    </div>

                    <div class="text-center mb-2 mt-5">
                        <button type="submit" class="btn bg-gradient-dark">Salvar</button>
                        <a href="{{route('artista.index')}}" class="btn btn-light border">Cancelar</a>
                    </div>
                </form>
            </div>
        </div>

    </div>
@endsection