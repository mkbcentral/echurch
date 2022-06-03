<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" type="image/png" sizes="96x96" href="">
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
        <link rel="icon" type="image/png" sizes="96x96" href="{{ asset('storage/'.setting('app_logo_url')) }}">
    </head>
    <body class="hold-transition layout-top-nav">
        <div class="wrapper">
          <!-- Navbar -->
          <nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
            <div class="container">
              <a href="{{ route('home') }}" class="navbar-brand">
                <img src="{{ asset('storage/'.setting('app_logo_url')) }}"
                         alt="Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">{{setting('name_app')}}</span>
              </a>

              <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>

              <div class="collapse navbar-collapse order-3" id="navbarCollapse">
                <!-- Left navbar links -->
                <ul class="navbar-nav">
                  <li class="nav-item">
                    <a href="index3.html" class="nav-link">Home</a>
                  </li>
                  <li class="nav-item">
                    <a href="#" class="nav-link">Contact</a>
                  </li>

                </ul>

                <!-- SEARCH FORM -->
                <form class="form-inline ml-0 ml-md-3">
                  <div class="input-group input-group-sm">
                    <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
                    <div class="input-group-append">
                      <button class="btn btn-navbar" type="submit">
                        <i class="fas fa-search"></i>
                      </button>
                    </div>
                  </div>
                </form>
              </div>

              <!-- Right navbar links -->
              <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
                   <!-- Messages Dropdown Menu -->
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                      <i class="fas fa-comments"></i>
                      <span class="badge badge-danger navbar-badge">3</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                      <a href="#" class="dropdown-item">
                        <!-- Message Start -->
                        <div class="media">
                          <img src="{{ asset('image.jpg') }}" alt="User Avatar" class="img-size-50 mr-3 img-circle">
                          <div class="media-body">
                            <h3 class="dropdown-item-title">
                              Brad Diesel
                              <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                            </h3>
                            <p class="text-sm">Call me whenever you can...</p>
                            <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                          </div>
                        </div>
                        <!-- Message End -->
                      </a>

                      <div class="dropdown-divider"></div>
                      <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
                    </div>
                </li>

                @auth
                <li class="nav-item dropdown user-menu">
                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                        <img id="profileImage2" src="{{Auth::user()->avatar==null ? asset('defautl-user.jpg') : Storage::url(Auth::user()->avatar) }}"
                             class="user-image img-circle elevation-2" alt="User Image">
                    </a>
                    <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <!-- User image -->
                        <li class="user-header bg-primary">
                            <img id="profileImage3" src="{{Auth::user()->avatar==null ? asset('defautl-user.jpg') : Storage::url(Auth::user()->avatar) }}"
                                 class="img-circle elevation-2"
                                 alt="User Image">
                            <p x-ref="username">
                                {{ Auth::user()->name }}
                            </p>
                        </li>
                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <a href="{{ route('user.profile') }}" class="btn btn-default btn-flat">Profile</a>
                            <a href="" class="btn btn-default btn-flat float-right"
                               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                Sign out
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </li>
                @else
                    <ul class="navbar-nav">
                        <li class="nav-item">
                        <a href="{{ route('login') }}" class="nav-link">Login</a>
                        </li>
                        <li class="nav-item">
                        <a href="{{ route('register') }}" class="nav-link">Register</a>
                        </li>
                    </ul>
                @endauth
              </ul>
            </div>
          </nav>
          <!-- /.navbar -->

          <!-- Content Wrapper. Contains page content -->
          <div class="content-wrapper">
            <!-- Main content -->
            <div class="content">
              <div class="container p-4">
                @livewire('home-page')
              </div><!-- /.container-fluid -->
            </div>
            <!-- /.content -->
          </div>
          <!-- /.content-wrapper -->
        </div>
        <!-- ./wrapper -->
        <script src="{{ mix('js/app.js') }}"></script>
    </body>
</html>
