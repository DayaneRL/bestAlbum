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
                  <a class="nav-link mb-0 px-0 py-1 " data-bs-toggle="tab" href="javascript:;" role="tab" aria-selected="false">
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
                <p class="text-sm">
                <i class="fa fa-arrow-up text-success" aria-hidden="true"></i>
                <span class="font-weight-bold">24%</span> this month
                </p>
            </div>
            <div class="card-body p-3">
                <div class="timeline timeline-one-side">
                <div class="timeline-block mb-3">
                    <span class="timeline-step">
                    <i class="ni ni-bell-55 text-success text-gradient"></i>
                    </span>
                    <div class="timeline-content">
                    <h6 class="text-dark text-sm font-weight-bold mb-0">$2400, Design changes</h6>
                    <p class="text-secondary font-weight-bold text-xs mt-1 mb-0">22 DEC 7:20 PM</p>
                    </div>
                </div>
                <div class="timeline-block mb-3">
                    <span class="timeline-step">
                    <i class="ni ni-html5 text-danger text-gradient"></i>
                    </span>
                    <div class="timeline-content">
                    <h6 class="text-dark text-sm font-weight-bold mb-0">New order #1832412</h6>
                    <p class="text-secondary font-weight-bold text-xs mt-1 mb-0">21 DEC 11 PM</p>
                    </div>
                </div>
                <div class="timeline-block mb-3">
                    <span class="timeline-step">
                    <i class="ni ni-cart text-info text-gradient"></i>
                    </span>
                    <div class="timeline-content">
                    <h6 class="text-dark text-sm font-weight-bold mb-0">Server payments for April</h6>
                    <p class="text-secondary font-weight-bold text-xs mt-1 mb-0">21 DEC 9:34 PM</p>
                    </div>
                </div>
                <div class="timeline-block mb-3">
                    <span class="timeline-step">
                    <i class="ni ni-credit-card text-warning text-gradient"></i>
                    </span>
                    <div class="timeline-content">
                    <h6 class="text-dark text-sm font-weight-bold mb-0">New card added for order #4395133</h6>
                    <p class="text-secondary font-weight-bold text-xs mt-1 mb-0">20 DEC 2:20 AM</p>
                    </div>
                </div>
                <div class="timeline-block mb-3">
                    <span class="timeline-step">
                    <i class="ni ni-key-25 text-primary text-gradient"></i>
                    </span>
                    <div class="timeline-content">
                    <h6 class="text-dark text-sm font-weight-bold mb-0">Unlock packages for development</h6>
                    <p class="text-secondary font-weight-bold text-xs mt-1 mb-0">18 DEC 4:54 AM</p>
                    </div>
                </div>
                <div class="timeline-block">
                    <span class="timeline-step">
                    <i class="ni ni-money-coins text-dark text-gradient"></i>
                    </span>
                    <div class="timeline-content">
                    <h6 class="text-dark text-sm font-weight-bold mb-0">New order #9583120</h6>
                    <p class="text-secondary font-weight-bold text-xs mt-1 mb-0">17 DEC</p>
                    </div>
                </div>
                </div>
            </div>
            </div>
        </div>
    </div>

</div>
@endsection