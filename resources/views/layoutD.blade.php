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
                <li><i class="small material-icons">person</i> <b>Nombre / Apellido</b></li>
                <li>&nbsp;&nbsp;</li>
                <li><a href="#" class="btn green">Cerrar Sesion</a></li>
                <li>&nbsp;&nbsp;</li>
                <li>Cuentadante: @if($cuentadante) <b class="red-text">SI</b>
                  @else
                  <b class="red-text">NO</b>
                   @endif 
                  
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
            <li><a class="dropdown-button" href="#!" data-activates="dropdown2">Novedades<i class="material-icons right">arrow_drop_down</i></a></li>
            <li><a class="dropdown-button" href="#!" data-activates="dropdown1">Elementos<i class="material-icons right">arrow_drop_down</i></a></li>
            <li><a href="#">Mis Aulas</a></li>   
            <li><a href="{{ route ('Dcambios')}}"">Mis Cambios</a></li>         
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
          <a href="#!name"><span class="white-text name">Nombre / Apellido</span></a>
          <a href="#!email"><span class="white-text email">Cuentadante : <b class="red-text">NO</b> </span></a>
        </div></li>
      
        <li><a href="#!" class="waves-effect"><i class="material-icons">person</i>Datos Personales</a></li>
        <li><a href="#!" class="waves-effect">Mis Aulas</a></li>
        <li><a href="{{ route ('Dcambios')}}" class="waves-effect">Mis Cambios</a></li>
        <li><div class="divider"></div></li>
        <li class="no-padding">
          <ul class="collapsible collapsible-accordion">
            <li>
                    <a class="collapsible-header waves-effect">Novedades <i class="material-icons">arrow_drop_down</i></a>
                    <div class="collapsible-body grey" style="display: none;">
                        <ul>
                          <li><a href="#!" class="black-text waves-effect">Ingresar Novedades</a></li>
              
                          <li><a href="#!"  class="black-text waves-effect">Actualizar/Consultar Novedades</a></li>
             
                        </ul>
                    </div> 
            </li>
            <li>
              <a class="collapsible-header waves-effect">Elementos <i class="material-icons">arrow_drop_down</i></a>
              <div class="collapsible-body grey" style="display: none;">
                  <ul>
                    <li><a href="#!" class="black-text waves-effect">Ingresar Elementos</a></li>
                    <li><a href="#!" class="black-text waves-effect">Cambiar Estado de Elementos</a></li>

                    <li><a href="#!"  class="black-text waves-effect">Quitar Elementos</a></li>
                  </ul>
              </div> 
      </li>
          </ul>
        </li>

      </ul>

          <!-- Dropdown2 Structure -->
<ul id="dropdown2" class="dropdown-content">
  <li><a href="#!" class="black-text">Ingresar Novedades</a></li>
  <li class="divider"></li>
  <li><a href="#!"  class="black-text">Actualizar/Consultar Novedades</a></li>

</ul>
          <!-- Dropdown1 Structure -->
<ul id="dropdown1" class="dropdown-content">
  <li><a href="#!" class="black-text">Ingresar Elementos</a></li>
  <li><a href="#!" class="black-text">Cambiar Estado de Elementos</a></li>
  <li class="divider"></li>
  <li><a href="#!"  class="black-text">Quitar Elementos</a></li>

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
      </script>
    </body>
  </html>