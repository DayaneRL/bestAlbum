@extends('template.app')

@section('nav-perfil')
active
@endsection 

@section('title')
Editar usuário
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header text-center"><h4>Editar Usuário</h4></div>

                <div class="card-body">
                    <form method="POST" action="{{ route('user.update',$user->id) }}">
                        @csrf
                        @method('PUT') 

                        <div class="form-group row">
                            <label for="name" class="col-md-3 col-form-label text-md-right">Nome</label>

                            <div class="col-md-8">
                                <input id="name" type="text" class="form-control" name="user[name]" value="{{$user->name?$user->name:''}}" required autofocus autocomplete="name">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-3 col-form-label text-md-right">E-mail</label>

                            <div class="col-md-8">
                                <input id="email" type="email" class="form-control" name="user[email]" value="{{$user->email?$user->email:''}}" required autocomplete="email">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-3 col-form-label text-md-right">Senha</label>

                            <div class="col-md-8">
                                <input id="password" type="password" class="form-control" name="user[password]" autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-3 col-form-label text-md-right">Confirmar senha</label>

                            <div class="col-md-8">
                                <input id="password-confirm" type="password" class="form-control" name="user[password_confirmation]"  autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="text-center">
                                <button type="submit" class="btn bg-gradient-dark">
                                    Atualizar
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
