<!doctype html>
<html lang="en" class="h-100">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="generator" content="Jekyll v3.8.5">
    <link rel="icon" type="image/x-icon" href="{{asset('')}}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <!-- Nueva wa -->
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker.css" rel="stylesheet" type="text/css" />
         <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.js"></script>



<script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <title>Portal del Departamento de Adquisiciones de la Municipalidad de Arica</title>

    <!-- Bootstrap core CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">


    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
    <!-- Custom styles for this template -->
    <link rel="stylesheet" href="//bootswatch.com/3/cerulean/bootstrap.css">
    <link href="{{asset('css/style.css')}}" rel="stylesheet">

  </head>
  <body class="d-flex flex-column h-100">
    <header id="header-principal">
  <!-- Fixed navbar -->
  <div class="contenedor-nav">
  <nav id="nav-principal" class="navbar navbar-expand-md navbar-dark fixed-top" style="background-color: #0062d1">
    <div class="col col-lg-2"" id="contenedor-logo">
                      <a id="logo1" href="{{ url('/') }}">
      <img style="width: " src="images/logos-02.png">
    </a>
    </div>
    
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
      @if (Auth::guest())
      <ul class="navbar-nav mr-auto">
        </ul>
      @elseif(Auth::user()->role != 0)
      <ul class="navbar-nav mr-auto">
        <li class="dropdown">
          <a href="#" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    Informes
          </a>
          <ul class="dropdown-menu" role="menu">
                  <li>
                    <a href="#">
                     Crear Configuración de Informe
                    </a>
                  </li>
                  <li>
                    <a href="{{ url('/configuraciones') }}">
                     Ver configuraciones de Informe
                 </li>
            </ul>
        </li>
      </ul>
      @else
      <ul class="navbar-nav mr-auto">
        <li class="dropdown">
          <a href="#" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    Informes
          </a>
          <ul class="dropdown-menu" role="menu">
                  <li>
                    <a href="#">
                     Crear Configuración de Informe
                    </a>
                  </li>
                  <li>
                    <a href="{{ url('/configuraciones') }}">
                     Ver configuraciones de Informe
                    </a>
                 </li>
            </ul>
        </li>
        <li class="dropdown">
          <a href="#" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    Usuarios
          </a>
          <ul class="dropdown-menu" role="menu">
                  <li>
                    <a href="{{ url('/usuarios') }}">
                     Configuración de Usuarios
                    </a>
                  </li>
            </ul>
        </li>
      </ul>
      @endif
      <ul class="navbar-nav navbar-right">
                        @if (Auth::guest())
                            <li class="nav-item active">
                              <a class="nav-link" href="{{ route('login') }}">Acceder <span class="sr-only">(current)</span></a>
                            </li>
                            <li class="nav-item active">
                              <a class="nav-link" href="{{ route('register') }}">Registrarse <span class="sr-only">(current)</span></a>
                            </li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} 
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="/miperfil">
                                            Mi Perfil
                                        </a>
                                    </li>
                                     <li>
                                        <a href="{{ route('logout') }}"
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
                        @endif
     </ul>
    </div>
  </nav>
  </div>
</header>

<!-- Begin page content -->
<main role="main" class="flex-shrink-0">
  @yield('content')
</main>

<footer class="footer mt-auto py-3">
  <div class="container">
    <span class="text-muted">Software de exclusivo uso para el Departamento de Adquisición de la Ilustre
    Municipalidad de Arica.</span>
  </div>
</footer>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>


<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.js"></script>

    </body>
</html>
