<!DOCTYPE html>
  <html>
    <head>
      <link type="text/css" rel="stylesheet" href='{{asset('css/style.css')}}'/>
      <!--Import Google Icon Font-->
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href='{{asset('css/materialize.min.css')}}'/>
      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    </head>

    <body>

      <div class="green hide-on-med-and-down">

        <div class="row green darken-2">
          <div class="container">
           
            <div class="col s6 center">
  
              <img src="{{asset('images/gestion.png')}}" class="imageS2">
              <br>
            </div>
            <div class="col s6">
              <ul id="nav-mobile" class="right hide-on-med-and-down">
                <li><i class="small material-icons">person</i> <b>{{auth()->user()->nombres . ' ' . auth()->user()->apellidos}}</b></li>
                <li>&nbsp;&nbsp;</li>
             

                <form method="POST" action="{{route('logout')}}">
                  {{  csrf_field() }}
                  <li><button type="submit" class="btn green">Cerrar Sesion</button></li>
                </form>

                <li>&nbsp;&nbsp;</li>
               
        
                  
                </li>
                
      
    
              </ul>
          </div>
          </div> 
        </div>    



        </div>

        <div class="green hide-on-med-and-up ">
          <div class="row green darken-2">
            <div class="container">
             
              <div class="col s12 center">
    
                <img src="{{asset('images/gestion.png')}}" class="imageS4">
                <br>
              </div>
          
            </div> 
          </div>    
  
        </div>

        <div class="green hide-on-small-only hide-on-large-only">
          <div class="row green darken-2">
            <div class="container">
             
              <div class="col s12 center">
    
                <img src="{{asset('images/gestion.png')}}" class="imageS2">
                <br>
              </div>
          
            </div> 
          </div>    
  
        </div>

       <!-- Cabecera -->
  
      <nav>
        <div class="nav-wrapper green darken-2">
              
          <div class="container">
                <a href="#" data-activates="slide-out" class="button-collapse"><i class="material-icons">menu</i></a>
         </div>
          <ul id="nav-mobile" class="left hide-on-med-and-down">
            <li><a href="#">Datos Personales</a></li>
            <li><a class="dropdown-button" href="#!" data-activates="dropdown2">Docentes<i class="material-icons right">arrow_drop_down</i></a></li>
            <li><a class="dropdown-button" href="#!" data-activates="dropdown1">Aulas<i class="material-icons right">arrow_drop_down</i></a></li>
       
            <li><a href="{{ route ('Dcambios')}}">Mis Cambios</a></li>         
          </ul>
          
         
        </div>
</nav>    

      <!-- Menu Mobile -->
      <ul id="slide-out" class="side-nav">
        <li><div class="user-view">
          <div class="background">
            <img src="{{asset('images/sena2.jpg')}}">
          </div>
          <a href="#!user"><img class="circle" src="{{asset('images/sena.png')}}"></a>
          <a href="#!name"><span class="white-text name">{{auth()->user()->nombres . ' ' . auth()->user()->apellidos}}</span></a>
          
        </div></li>
      
        <li><a href="#!" class="waves-effect"><i class="material-icons">person</i>Datos Personales</a></li>

        <li><a href="{{ route ('Dcambios')}}" class="waves-effect">Mis Cambios</a></li>
        <li><div class="divider"></div></li>
        <li class="no-padding">
          <ul class="collapsible collapsible-accordion">
            <li>
                    <a class="collapsible-header waves-effect">Docentes <i class="material-icons">arrow_drop_down</i></a>
                    <div class="collapsible-body grey" style="display: none;">
                        <ul>
                          <li><a href="#!" class="black-text waves-effect">Registrar Docente</a></li>
              
                          <li><a href="{{route ('ActualizarD')}}"  class="black-text waves-effect">Actualizar/Consultar Docente</a></li>

                          <li><a href="#!"  class="black-text waves-effect">Asignar Cuentadante</a></li>
                        </ul>
                    </div> 
            </li>
            <li>
              <a class="collapsible-header waves-effect">Aulas <i class="material-icons">arrow_drop_down</i></a>
              <div class="collapsible-body grey" style="display: none;">
                  <ul>
                    <li><a href="#!" class="black-text waves-effect">Ingresar Aula</a></li>
                    <li><a href="#!"  class="black-text waves-effect">Actualizar/Consultar Aula</a></li>
                    <li><a href="#!"  class="black-text waves-effect">Asignar Aula</a></li>

                  </ul>
              </div> 
      </li>
          </ul>
        </li>

      </ul>

          <!-- Dropdown2 Structure -->
<ul id="dropdown2" class="dropdown-content">
    <li><a href="{{route ('RegistrarD')}}" class="black-text waves-effect">Registrar Docente</a></li>
    <li class="divider"></li> 
    <li><a href="{{route ('ActualizarD')}}"  class="black-text waves-effect">Actualizar/Consultar Docente</a></li>
    <li class="divider"></li>
    <li><a href="{{route ('Asignar2')}}"  class="black-text waves-effect">Asignar Cuentadante</a></li>
    <li class="divider"></li>
    <li><a href="{{route ('TodosD')}}"  class="black-text waves-effect">Consultar Todos los Docentes</a></li>
</ul>
          <!-- Dropdown1 Structure -->
<ul id="dropdown1" class="dropdown-content">
    <li><a href="{{ route ('AulaI')}}" class="black-text waves-effect">Ingresar Aula</a></li>
    <li class="divider"></li>
    <li><a href="#!"  class="black-text waves-effect">Actualizar/Consultar Aula</a></li>
    <li class="divider"></li>
    <li><a href="{{route ('Asignar')}}"  class="black-text waves-effect">Asignar Aula</a></li>
    <li class="divider"></li>
    <li><a href="{{route ('ConsultarAulas')}}"  class="black-text waves-effect">Consultar Aulas</a></li>


</ul>
    
      <!-- Contenido-->
<main>
<div class="container">
    @yield('contenido')   
</div>
</main>
<!-- Fotter -->
<footer class="page-footer green darken-2">
  <div class="footer-copyright">
    <div class="container">
    © <?php
    echo date('Y');
?>  Gestion Novedades SENA Copyright
    <b class="grey-text text-lighten-4 right">Aprendiz : Brayan Martinez Ayala</b>
    </div>
  </div>
</footer>


      <!--Import jQuery before materialize.js-->
      <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
      <script type="text/javascript" src="{{asset('js/materialize.min.js')}}"></script>

      <script> 
       $(".button-collapse").sideNav();
       $('select').material_select();
       $('#textarea1').val('New Text');
      </script>
    </body>
  </html>