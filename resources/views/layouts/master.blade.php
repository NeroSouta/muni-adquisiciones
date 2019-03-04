<!doctype html>
<html lang="en" class="h-100">
<head>
    <meta charset="utf-8">
    <meta name= "viewport" content= "width=device-width, initial-scale=1, shrink-to-fit=no" > <!-- Para el uso de Bootstrap CSS -->  
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="generator" content="Jekyll v3.8.5">
    <link rel="icon" type="image/x-icon" href="{{asset('images/icono_sin_fondo.png')}}">
    
    
    <!--CALENDARIO-->
    {{--!! Html::script('js/Configuracion.js') !!--}} 
    {!! Html::script('js/jquery-3.2.1.min.js') !!}
    {{-- DE PAGINA OFIAL BOOTSTRAP 4.0 PARA SU USO--}}
    <link rel= "stylesheet" href= "https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity= "sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin= "anonymous" >
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet" integrity= "sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin= "anonymous">
    <script src= "https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity= "sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin= "anonymous" ></script> 
    <script src= "https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity= "sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin= "anonymous" ></script> 
    <script src= "https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity= "sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin= "anonymous" ></script> 
   

    <title>Portal del Departamento de Adquisiciones de la Municipalidad de Arica</title>

    
    {{-- ESTILO NO DEFINIDO SU USO --}}
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
    
    <!-- Fixed navbar MENU INICIAL ENCABEZADO -->
    <div class="contenedor-nav">
    <nav id="nav-principal" class="navbar navbar-expand-md navbar-dark fixed-top" style="background-color: #0062d1">
    <div class="col col-lg-2"" id="contenedor-logo">
        <a id="logo1" href="{{ url('/') }}">
          <img style="width: " src="{{asset('images/logos-02.png')}}">

        </a>
    </div>
    
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
      @if (Auth::guest())
      <ul class="navbar-nav mr-auto">
        </ul>
      @elseif(Auth::user()->role == 1 or Auth::user()->role == 2)
      <ul class="navbar-nav mr-auto">
        <li class="dropdown">
          <a href="#" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    Informes
          </a>
          <ul class="dropdown-menu" role="menu">
                  <li>
                    <a href="{{ url('/configuracion-informe') }}">
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
                    <a href="{{ url('/configuracion-informe') }}">
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
                                @if (Auth::user()->role == 1)
                                  <a class="navbar-brand" style="color: #fff">Funcionario</a>
                                @elseif (Auth::user()->role == 0)
                                  <a class="navbar-brand" style="color: #fff">Administrador</a>
                                @else
                                  <a class="navbar-brand" style="color: #fff">Supervisor</a>
                                @endif
                                <a href="#" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} 
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ url('/miperfil') }}">
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

    <!-- Begin page content RESTO DE LA PAGINA HIJO -->
    <main role="main" class="flex-shrink-0">
        @yield('content')
    </main>

    <footer class="footer mt-auto py-3">
      <div class="container">
        <span class="text-muted">Software de exclusivo uso para el Departamento de Adquisición de la Ilustre
        Municipalidad de Arica.</span>
      </div>
    </footer>



</body>
</html>
