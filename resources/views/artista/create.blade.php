@extends('template.app')

@section('nav-artistas')
active
@endsection 

@section('breadcrumb')
<li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="{{route('home')}}">Início</a></li>
<li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="{{route('artista.index')}}">Artistas</a></li>
<li class="breadcrumb-item text-sm text-dark active" aria-current="page">Cadastrar Artista</li>
@endsection 

@section('title')
Cadastrar artista
@endsection

@section('css')
<link href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css" rel="stylesheet" />
@endsection

@section('content')
    <div class="container">

        <div class="card">
            <div class="card-header text-center">
                <h4>Cadastrar Artista</h4>
            </div>
            <div class="card-body">
                
                <form action="{{isset($artista) ? route('artista.update',$artista->id) : route('artista.store')}}" id="formArtista" method="POST" enctype="multipart/form-data">
                    @csrf
                    @if(isset($artista))
                     @method('PUT') 
                    @endif
                    
                    <div class="form-group mt-1 mb-2">
                        <label for="nome">Nome</label>
                        <input type="text" class="form-control input-shadow" maxlength="100" placeholder="Nome" value="{{isset($artista->nome)?$artista->nome : ''}}" id="nome" name="artista[nome]">
                    </div>

                    <div class="form-group mt-1 mb-2">
                        <div class="row">
                            <div class="col-12 col-md-6">
                                <label for="nascimento">Data de Nascimento</label>
                                <input type="text" id="calendario" class="form-control input-shadow" maxlength="100" placeholder="00/00/0000" value="{{isset($artista->dt_nascimento)?dateToPTBR($artista->dt_nascimento) : ''}}" id="nascimento" name="artista[dt_nascimento]">
                            </div>
                            <div class="col-12 col-md-6">
                                <label for="genero">Genero</label>
                                <select class="form-control input-shadow" name="artista[genero]">
                                    <option value="Alternativo" {{isset($artista) && $artista->genero=="Alternativo"? 'selected' : ''}}>Alternativo</option>
                                    <option value="Funk"  {{isset($artista) && $artista->genero=="Funk"? 'selected' : ''}}>Funk</option>
                                    <option value="Indie" {{isset($artista) && $artista->genero=="Indie"? 'selected' : ''}}>Indie</option>
                                    <option value="MPB" {{isset($artista) && $artista->genero=="MPB"? 'selected' : ''}}>Mpb</option>
                                    <option value="Pagode" {{isset($artista) && $artista->genero=="Pagode"? 'selected' : ''}}>Pagode</option>
                                    <option value="Pop" {{isset($artista) && $artista->genero=="Pop"? 'selected' : ''}}>Pop</option>
                                    <option value="Rock" {{isset($artista) && $artista->genero=="Rock"? 'selected' : ''}}>Rock</option>
                                    <option value="Sertanejo" {{isset($artista) && $artista->genero=="Sertanejo"? 'selected' : ''}}>Sertanejo</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="form-group mt-1 mb-2">
                        <label for="url">URL site oficial do artista</label>
                        <input type="text" class="form-control input-shadow" placeholder="url" value="{{isset($artista->url)?$artista->url : ''}}" id="url" name="artista[url]">
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

@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.11.2/jquery.mask.min.js" integrity="sha512-Y/GIYsd+LaQm6bGysIClyez2HGCIN1yrs94wUrHoRAD5RSURkqqVQEU6mM51O90hqS80ABFTGtiDpSXd2O05nw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
<script type="text/javascript">
    $(function() {
    $( "#calendario" ).datepicker({
        dateFormat: 'dd/mm/yy',
        closeText:"Fechar",
        prevText:"&#x3C;Anterior",
        nextText:"Próximo&#x3E;",
        currentText:"Hoje",
        monthNames: ["Janeiro","Fevereiro","Março","Abril","Maio","Junho","Julho","Agosto","Setembro","Outubro","Novembro","Dezembro"],
        monthNamesShort:["Jan","Fev","Mar","Abr","Mai","Jun","Jul","Ago","Set","Out","Nov","Dez"],
			dayNames:["Domingo","Segunda-feira","Terça-feira","Quarta-feira","Quinta-feira","Sexta-feira","Sábado"],
			dayNamesShort:["Dom","Seg","Ter","Qua","Qui","Sex","Sáb"],
        dayNamesMin:["Dom","Seg","Ter","Qua","Qui","Sex","Sáb"],
        weekHeader:"Sm",
        firstDay:1
    });
});
</script>
<script>
    $('#calendario').mask('99/99/99999');
</script>
@endsection