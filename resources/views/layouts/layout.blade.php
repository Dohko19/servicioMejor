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
        <a class="navbar-brand" href="https://demos.creative-tim.com/material-kit/index.html">
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
              <a href="#" class="dropdown-item">Categoria 2 etc....</a>
            </div>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  @yield('content')
  {{-- Footer section --}}
  <footer class="footer footer-default" style="background-color: black; color: white;">
    <div class="container">
      <nav class="float-left">
        <ul>
          <li>
            <a href="https://www.creative-tim.com">
              Creative Tim
            </a>
          </li>
          <li>
            <a href="https://creative-tim.com/presentation">
              About Us
            </a>
          </li>
          <li>
            <a href="http://blog.creative-tim.com">
              Blog
            </a>
          </li>
          <li>
            <a href="https://www.creative-tim.com/license">
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

