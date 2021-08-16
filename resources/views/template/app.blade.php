<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>BestAlbum - @yield('title')</title>

    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <!-- Nucleo Icons -->
    <link href="../../assets/css/nucleo-icons.css" rel="stylesheet" />
    <link href="../../assets/css/nucleo-svg.css" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <link href="../../assets/css/nucleo-svg.css" rel="stylesheet" />
    <!-- CSS Files -->
    <link id="pagestyle" href="../../assets/css/soft-ui-dashboard.css?v=1.0.3" rel="stylesheet" />

    <link href="../../assets/css/style.css" rel="stylesheet" />
    @yield('css')
</head>

<body class="g-sidenav-show  bg-gray-100">
  <aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3 "
      id="sidenav-main">
      <div class="sidenav-header">
          <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
              aria-hidden="true" id="iconSidenav"></i>
          <a class="navbar-brand m-0" href="https://demos.creative-tim.com/soft-ui-dashboard/pages/dashboard.html"
              target="_blank">
              <img src="../../favicon1.ico" class="navbar-brand-img h-100" style="width:23px" alt="main_logo">
              <span class="ms-1 font-weight-bold">Best Album </span>
          </a>
      </div>
      <hr class="horizontal dark mt-0">
      <div class=" w-auto  max-height-vh-90 h-90" id="sidenav-collapse-main">
          <ul class="navbar-nav">
              <li class="nav-item">
                  <a class="nav-link @yield('nav-home')" href="{{ route('home') }}">
                      <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                          <i class="fas fa-home fa-2x"></i>
                      </div>
                      <span class="nav-link-text ms-1">Home</span>
                  </a>
              </li>
              <li class="nav-item">
                  <a class="nav-link  @yield('nav-artistas')" href="{{ route('artista.index') }}">
                      <div class="icon icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                          <i class="fas fa-users"></i>
                      </div>
                      <span class="nav-link-text ms-1">Artistas</span>
                  </a>
              </li>
              <li class="nav-item">
                  <a class="nav-link @yield('nav-albuns') " href="{{ route('album.index') }}">
                      <div class="icon icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                          <i class="fas fa-compact-disc"></i>
                      </div>
                      <span class="nav-link-text ms-1">Albuns</span>
                  </a>
              </li>

              <li class="nav-item mt-3">
                  <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Conta de usuário</h6>
              </li>
              @auth
                  <li class="nav-item">
                      <a class="nav-link  @yield('nav-perfil')" href="{{ route('user.show', Auth::user()->id) }}">
                          <div class="icon icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                              <i class="fas fa-user"></i>
                          </div>
                          <span class="nav-link-text ms-1">Meu Perfil</span>
                      </a>
                  </li>
              @else
                  <li class="nav-item">
                      <a class="nav-link  @yield('nav-entrar')" href="{{ route('login') }}">
                          <div class="icon icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                              <i class="fas fa-sign-in-alt"></i>
                          </div>
                          <span class="nav-link-text ms-1">Entrar</span>
                      </a>
                  </li>
              @endauth
              @guest
                  <li class="nav-item">
                      <a class="nav-link  @yield('nav-cadastrar')" href="{{ route('register') }}">
                          <div class="icon icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                              <i class="fas fa-user-plus"></i>
                          </div>
                          <span class="nav-link-text ms-1">Cadastre-se</span>
                      </a>
                  </li>
              @endguest
          </ul>
      </div>

  </aside>
  <main class="main-content position-relative max-height-vh-100 h-100 mt-1 border-radius-lg ">
      <!-- Navbar -->
      <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur"
          navbar-scroll="true">
          <div class="container-fluid py-1 px-3">
              <nav aria-label="breadcrumb">
                  <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                    
                      @yield('breadcrumb')
                  </ol>
                  <h6 class="font-weight-bolder mb-0">@yield('title')</h6>
              </nav>
              <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
                  <div class="ms-md-auto pe-md-3 d-flex align-items-center">

                  </div>
                  <ul class="navbar-nav  justify-content-end">
                      @guest
                          <li class="nav-item d-flex align-items-center">
                              <a href="{{ route('login') }}" class="nav-link text-body font-weight-bold px-0">
                                  <i class="fa fa-user me-sm-1"></i>
                                  <span class="d-sm-inline d-none">Entrar</span>
                              </a>
                          </li>
                      @else
                          <li class="nav-item d-flex align-items-center">
                             
                              <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                  document.getElementById('logout-form').submit();">
                                  {{ __('Sair') }}
                              </a>
                              <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                  @csrf
                              </form>
                          </li>
                      @endguest
                      <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
                          <a href="javascript:;" class="nav-link text-body p-0" id="iconNavbarSidenav">
                              <div class="sidenav-toggler-inner">
                                  <i class="sidenav-toggler-line"></i>
                                  <i class="sidenav-toggler-line"></i>
                                  <i class="sidenav-toggler-line"></i>
                              </div>
                          </a>
                      </li>

                  </ul>
              </div>
          </div>
      </nav>
      <!-- End Navbar -->

      <div class="container-fluid py-4">
        
        @yield('content')
        
        <footer class="footer pt-2 fixed-bottom">
            <div class="container-fluid">
                <div class="row align-items-center justify-content-lg-between">
                    <div class="col-12 col-md-6 offset-md-6 mb-3">
                        <div class="copyright text-center text-sm text-muted text-lg-start">
                            Copyright
                            <script>
                                document.write(new Date().getFullYear())
                            </script>,
                            made by
                            <a href="https://github.com/DayaneRL/" class="font-weight-bold" target="_blank">Dayane
                                Lima</a>.
                        </div>
                    </div>

                </div>
            </div>
        </footer>
      </div>
  </main>
  @include('template.script')
  @yield('script')
</body>

</html>
