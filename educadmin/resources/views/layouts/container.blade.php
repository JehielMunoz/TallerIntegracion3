<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/container.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
</head>

<body>
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
      <a class="navbar-brand" href="{{ url('/home') }}">EducaAdmin</a>
      <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Settings</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Profile</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Help</a>
          </li>
        </ul>
        <!--<form class="form-inline mt-2 mt-md-0">
          <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>-->
        <ul class="nav navbar-nav navbar-right">
          <!-- Authentication Links -->
          @guest
              <li><a href="{{ route('login') }}">Login</a></li>
              <li><a href="{{ route('register') }}">Register</a></li>
          @else
              <li class="dropdown">
                  <button class='btn btn-outline-success dropdown-toggle' type='button' data-toggle="dropdown" aria-expanded="false">
                      {{ Auth::user()->name }} <span class="caret"></span>
                  </button>

                  <ul class="dropdown-menu" role="menu">
                      <li>
                          <a class='dropdown-item' href="{{ route('logout') }}"
                              onclick="event.preventDefault();
                                       document.getElementById('logout-form').submit();">
                              Logout
                          </a>

                          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                              {{ csrf_field() }}
                          </form>
                      </li>
                  </ul>
              </li>
          @endguest
      </ul>
      </div>
    </nav>
   <div class="container-fluid" style="margin-top: 5em;">
      <!--<div class="row">
        <nav class="col-sm-3 col-md-2 d-none d-sm-block bg-light sidebar">
          @yield('navbar')
        </nav>
      
        <main class="col-sm-8 ml-sm-auto col-md-10 pt-3" role="main">-->
        @yield('navbar')
        @section('panel') 
          <h1>Panel de administración</h1>
       
          <section class="row text-center placeholders">
            <div class="col-6 col-sm-3 placeholder">
              <a href="{{ url('/liquidaciones') }}"><img src="{{ asset('images/liquidaciones.png') }}" width="200" height="200" class="img-fluid rounded-circle" alt="Liquidaciones de sueldo"></a>
              <h4>Liquidaciones</h4>
              <div class="text-muted">Modulo 1</div>
            </div>
            <div class="col-6 col-sm-3 placeholder">
              <img src="{{ asset('images/matriculas.png') }}" width="200" height="200" class="img-fluid rounded-circle" alt="Administración de matrículas">
              <h4>Matrículas</h4>
              <span class="text-muted">Modulo 2</span>
            </div>
            <div class="col-6 col-sm-3 placeholder">
              <img src="{{ asset('images/rrhh.png') }}" width="200" height="200" class="img-fluid rounded-circle" alt="Administración de recursos humanos">
              <h4>RR.HH</h4>
              <span class="text-muted">Modulo 3</span>
            </div>
            <div class="col-6 col-sm-3 placeholder">
              <img src="{{ asset('images/notas.png') }}" width="200" height="200" class="img-fluid rounded-circle" alt="Administración notas alumnado">
              <h4>Notas</h4>
              <span class="text-muted">Modulo 4</span>
            </div>
          </section>
        @show
        @yield('content')
        <!--</main>
      </div>-->


    </div>
          
          
         

        
  
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../../public/js/jquery.min.js"><\/script>')</script>
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
 
</body>
</html>