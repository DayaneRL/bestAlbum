@extends('template.app')

@section('nav-perfil')
active
@endsection 

@section('breadcrumb')
<li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="{{route('home')}}">Início</a></li>
<li class="breadcrumb-item text-sm text-dark active" aria-current="page">Usuários</li>
@endsection 

@section('title')
Usuários
@endsection

@section('content')
<div class="container">

    <div class="card">
        <div class="card-header">
            <div class=" text-center">
                <h2>Usuários</h2>
            </div>
        </div>
        <div class="card-body">
        </div>
    </div>

</div>
@endsection