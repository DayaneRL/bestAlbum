@extends('template.app')

@section('nav-perfil')
active
@endsection 

@section('breadcrumb')
<li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="{{route('home')}}">Início</a></li>
<li class="breadcrumb-item text-sm text-dark active" aria-current="page">Meu Perfil</li>
@endsection 

@section('title')
Meu Perfil
@endsection

@section('content')
<div class="container">

    <br><br>

    <div class="card card-body blur shadow-blur mx-4 mt-n6 overflow-hidden">
        <div class="row gx-4">
          <div class="col-auto">
            <div class="avatar avatar-xl position-relative">
              <img src="../assets/img/profile.png" alt="profile_image" class="w-100 border-radius-lg shadow-sm">
            </div>
          </div>
          <div class="col-auto my-auto">
            <div class="h-100">
              <h5 class="mb-1">
               {{$user->name}}
              </h5>
              <p class="mb-0 font-weight-bold text-sm">
                {{$user->email}}
              </p>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 my-sm-auto ms-sm-auto me-sm-0 mx-auto mt-3">
            <div class="nav-wrapper position-relative end-0">
              <ul class="nav nav-pills nav-fill p-1 bg-transparent" role="tablist">
                
                <li class="nav-item">
                  <a class="nav-link mb-0 px-0 py-1 " href="{{route('user.edit', $user->id)}}">
                    <i class="fas fa-pencil-alt"></i>
                    <span class="ms-1">Editar</span>
                  </a>
                </li>
              </ul>
            </div>
          </div>
        </div>
    </div>

    <div class="container-fluid py-4">

        <div class=" col-12">
            <div class="card h-100">
            <div class="card-header pb-0">
                <h6>Suas interações</h6>
                <div class="row">
                  <div class="col-12 col-md-6">
                    <p class="text-sm">
                    <i class="far fa-grin-stars text-primary fa-2x" aria-hidden="true"></i>
                    Você avaliou <span class="font-weight-bold">{{count($notasAlbum)}}</span> albuns.
                    </p>
                  </div> 
                  <div class="col-12 col-md-6">
                    <p class="text-sm">
                      <i class="far fa-grin-beam text-primary fa-2x" aria-hidden="true"></i>
                      Você avaliou <span class="font-weight-bold">{{count($notasArtista)}}</span> artistas.
                    </p>
                  </div>
                </div>
            </div>
            <div class="card-body p-3">
                <div class="row"> 
                  <div class="col-12 col-md-6">
                    <div class="timeline timeline-one-side">
                      @foreach($notasAlbum as $nota)
                        <div class="timeline-block mb-3">
                          <span class="timeline-step">
                            <i class="far fa-star-half text-info text-gradient"></i>
                          </span>
                          <div class="timeline-content">
                          <h6 class="text-dark text-sm font-weight-bold mb-0">Você avaliou o album {{$nota->Album->nome}} com nota {{$nota->nota}}</h6>
                          <p class="text-secondary font-weight-bold text-xs mt-1 mb-0">{{datetimeToPTBR($nota->created_at)}}</p>
                          </div>
                        </div>
                      @endforeach
                    </div>
                  </div>

                  <div class="col-12 col-md-6">
                    <div class="timeline timeline-one-side">
                      @foreach($notasArtista as $nota)
                        <div class="timeline-block mb-3">
                          <span class="timeline-step">
                            <i class="far fa-star-half text-danger text-gradient"></i>
                          </span>
                          <div class="timeline-content">
                          <h6 class="text-dark text-sm font-weight-bold mb-0">Você avaliou o(a) artista {{$nota->Artista->nome}} com nota {{$nota->nota}}</h6>
                          <p class="text-secondary font-weight-bold text-xs mt-1 mb-0">{{datetimeToPTBR($nota->created_at)}}</p>
                          </div>
                        </div>
                      @endforeach
                    </div>
                  </div>

                </div>
                
            </div>
        </div>
    </div>

</div>
@endsection