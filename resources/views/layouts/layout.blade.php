<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <meta charset="utf-8">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>
    {{ config('app.name', 'Laravel') }}
  </title>
  {{-- <script src="{{ asset('js/app.js') }}" defer></script> --}}
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <!-- CSS Files -->
  <link href="{{ asset('css/material-kit.css?v=2.0.6') }}" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="{{ asset('demo/demo.css') }}" rel="stylesheet" />
  @yield('styles')
  {{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> --}}
</head>

<body class="@yield('body-class')">
  <nav class="navbar navbar-transparent navbar-color-on-scroll fixed-top navbar-expand-lg" color-on-scroll="100" id="sectionsNav">
    <div class="container">
      <div class="navbar-translate">
        <a class="navbar-brand" href="{{ route('index') }}">
          {{ config('app.name', 'Laravel') }} </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="sr-only">Navegación</span>
          <span class="navbar-toggler-icon"></span>
          <span class="navbar-toggler-icon"></span>
          <span class="navbar-toggler-icon"></span>
        </button>
      </div>
      <div class="collapse navbar-collapse">
        <ul class="navbar-nav ml-auto">
          <li class="dropdown nav-item">
            <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
              <i class="material-icons">business_center</i> ¿Quienes Somos?
            </a>
            {{-- Item de dropdown --}}
            <div class="dropdown-menu dropdown-with-icons">
              <a href="#" class="dropdown-item">
                <i class="material-icons">layers</i> ¿Acerca de ...?
              </a>
            </div>
            {{-- end dropdown --}}
          </li>
          <li class="dropdown nav-item">
            <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown" aria-expanded="false">
              <i class="material-icons">view_day</i>Categorias
              <div class="ripple-container"></div>
            </a>
            <div class="dropdown-menu dropdown-with-icons">
              <a href="#" class="dropdown-item">Categoria 1</a>
              <div class="dropdown-divider"></div>
              <a href="#" class="dropdown-item">Categoria 2 </a>
              <a href="#" class="dropdown-item">Categoria 3 </a>
            </div>
          </li>
          @guest
              <li class="nav-item">
                  <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
              </li>
              @if (Route::has('register'))
                  <li class="nav-item">
                      {{-- <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a> --}}
                      <a class="nav-link" href="#" data-toggle="modal" data-target="#signupModal">
                          <i class="material-icons">assignment</i>
                          {{ __('Registrarse') }}
                      </a>
                  </li>
              @endif
          @else
              <li class="nav-item dropdown">
                  <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                      {{ Auth::user()->name }} <span class="caret"></span>
                  </a>

                  <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                      @if (auth()->user()->isAdmin())
                      <a href="{{ route('dashboard.index') }}" class="dropdown-item">Gestion de Usuaios...</a>
                      @endif
                      <a class="dropdown-item" href="{{ route('usuarios.show', auth()->user()->id) }}">Mi Perfil</a>
                      <a class="dropdown-item" href="{{ route('logout') }}"
                         onclick="event.preventDefault();
                                       document.getElementById('logout-form').submit();">
                          {{ __('Logout') }}
                      </a>
                      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                          @csrf
                      </form>
                  </div>
              </li>
          @endguest
        </ul>
      </div>
    </div>
  </nav>
  @yield('content')

  {{-- Footer section --}}
  <div class="modal fade" id="signupModal" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-signup" role="document">
    <div class="modal-content">
      <div class="card card-signup card-plain">
        <div class="modal-header">
          <h5 class="modal-title card-title">Registro</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <i class="material-icons">clear</i>
          </button>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-md-5 ml-auto">
              <div class="info info-horizontal">
                <div class="icon icon-rose">
                  <i class="material-icons">timeline</i>
                </div>
                <div class="description">
                  <h4 class="info-title">Marketing</h4>
                  <p class="description">
                  We've created the marketing campaign of the website. It was a very interesting collaboration.
                  </p>
                </div>
              </div>

              <div class="info info-horizontal">
                <div class="icon icon-primary">
                  <i class="material-icons">code</i>
                </div>
                <div class="description">
                  <h4 class="info-title">Fully Coded in HTML5</h4>
                  <p class="description">
                  We've developed the website with HTML5 and CSS3. The client has access to the code using GitHub.
                  </p>
                </div>
              </div>

              <div class="info info-horizontal">
                <div class="icon icon-info">
                  <i class="material-icons">group</i>
                </div>
                <div class="description">
                  <h4 class="info-title">Built Audience</h4>
                  <p class="description">
                  There is also a Fully Customizable UI Kit for this product.
                  </p>
                </div>
              </div>
            </div>

            <div class="col-md-5 mr-auto">
              <div class="social text-center">
                <button class="btn btn-just-icon btn-round btn-twitter">
                  <i class="fa fa-twitter"></i>
                </button>
                <button class="btn btn-just-icon btn-round btn-dribbble">
                  <i class="fa fa-dribbble"></i>
                </button>
                <button class="btn btn-just-icon btn-round btn-facebook">
                  <i class="fa fa-facebook"> </i>
                </button>
                <h4> o con tu correo electronico </h4>
              </div>

              <form class="form" method="POST" action="{{ route('register') }}">
                @csrf
                <div class="card-body">
                  <div class="form-group">
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <div class="input-group-text"><i class="material-icons">face</i></div>
                      </div>
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Nombre de Usuario">

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                    </div>
                  </div>

                <div class="form-group">
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <div class="input-group-text"><i class="material-icons">email</i></div>
                    </div>
                      <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Correo Electronico">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                  </div>
                </div>

                <div class="form-group">
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <div class="input-group-text"><i class="material-icons">lock_outline</i></div>
                    </div>
                      <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Contraseña">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <div class="input-group-text"><i class="material-icons">lock_outline</i></div>
                    </div>
                      <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Confirma tu contraseña">
                  </div>
                </div>

                <div class="form-check">
                  <label class="form-check-label">
                      <input class="form-check-input" type="checkbox" value="" checked>
                      <span class="form-check-sign">
                          <span class="check"></span>
                      </span>
                      I agree to the <a href="#something">terms and conditions</a>.
                  </label>
                </div>
                </div>
              <div class="modal-footer justify-content-center">
                <button type="submit" class="btn btn-primary">
                    {{ __('Registrarme') }}
                </button>
              </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
{{-- end modal --}}
  <footer class="footer footer-black">
    <div class="container">
      <nav class="float-left">
        <ul>
          <li>
            <a href="#">
              Some 1
            </a>
          </li>
          <li>
            <a href="#">
              About Us
            </a>
          </li>
          <li>
            <a href="#">
              Blog
            </a>
          </li>
          <li>
            <a href="#">
              Licenses
            </a>
          </li>
        </ul>
      </nav>
      <div class="copyright float-right">
        &copy;
        <script>
          document.write(new Date().getFullYear())
        </script>, made with <i class="material-icons">favorite</i> by
        <a href="https://www.creative-tim.com" target="_blank">Creative Tim</a> for a better web.
      </div>
    </div>
  </footer>
  <!--   Core JS Files   -->
  <script src="{{ asset('js/core/jquery.min.js') }}" type="text/javascript"></script>
  <script src="{{ asset('js/plugins/moment.min.js') }}"></script>
  <script src="{{ asset('js/core/popper.min.js') }}" type="text/javascript"></script>
  <script src="{{ asset('js/core/bootstrap-material-design.min.js') }}" type="text/javascript"></script>
  <!--  Plugin for the Datepicker, full documentation here: https://github.com/Eonasdan/bootstrap-datetimepicker -->
  <script src="{{ asset('js/plugins/bootstrap-datetimepicker.js') }}" type="text/javascript"></script>
  <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
  <script src="{{ asset('js/plugins/nouislider.min.js') }}" type="text/javascript"></script>
  <!--  Google Maps Plugin    -->
  {{-- <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script> --}}
  <!-- Control Center for Material Kit: parallax effects, scripts for the example pages etc -->
  <script src="{{ asset('js/material-kit.js?v=2.0.6') }}" type="text/javascript"></script>
    @yield('scripts')
</body>

</html>

