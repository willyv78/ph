<?php session_start();
require_once ("../conexion/conexion.php");
require_once ("../php/funciones.php");
//////////////////////////////////////////////////////////////////////////////////////
// Aplicación PHP usando Bootstrap, jquery, HTML5 y CSS - PH                        //
// Copyright 2014 Wilson Giovanny Velandia Barreto 3204274564 - willyv78@gmail.com  //
//////////////////////////////////////////////////////////////////////////////////////
$session_id = session_id();
$UsuID = $_SESSION['UsuID'];
$sw = 0;

$sql_user = "SELECT rmb_residente_id, rmb_residente_nom, rmb_residente_ape, rmb_residente_foto FROM rmb_residente WHERE rmb_residente_id = $UsuID";
$res_user = mysql_query($sql_user, conexion());
if($res_user){
  if(mysql_num_rows($res_user) > 0){
    $row_user = mysql_fetch_array($res_user);
    $UsuID = $row_user[0];
    $UsuNombre = explode(" ", $row_user[1]);
    $UsuNombre = $UsuNombre[0];
    $UsuApellido = $row_user[2];
    $UsuFoto = $row_user[3];
    $sw += 1;
  }
}
?>
<!DOCTYPE html>
  <html lang="es" xmlns="http://www.w3.org/1999/xhtml" xml:lang="es">
    <head>
      <meta http-equiv="content-type" content="text/html;charset=utf-8" />
      <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1">
      <meta name="apple-mobile-web-app-capable" content="yes" />
      <meta name="apple-mobile-web-app-status-bar-style" content="black" />
      <meta name="description" content="Aplicacion WEB para administrar propiedades horizontales (apartamentos, casas, locales comerciales), residentes, habitantes, áreas comunes, equipos instalados, calendario de eventos, clasificados, personal autorizado, empleados, bitácora en las porterias, parqueaderos, depósitos, vehículos, personal de servicio, mascotas, vulnerabilidades, propietarios, inmobiliarias, locatarios y otros datos relacionados con el proyecto de vivienda o construcción. Esto permite a los administradores un control más eficiente de los bienes, las personas y las áreas, a las directivas o consejo permite realizar seguimiento a los administradores en sus actividades, a los residentes, propietarios y/o habitantes les permite estar al tanto de los eventos, tener a mano los documentos (reglamentos, actas, recibos de pago administración) y poder comunicarse efectivamente con el administrador además de tener una seguridad en el personal que ingresa al conjunto cerrado. Por otra parte el comercio en general se beneficia permitiendoles publicitar sus productos y servicios. Gerencia inmobiliaria, soluciones integrales para el sector inmobiliario.">
      <meta name="keywords" content="propiedad horizontal, administracion propiedad horizontal, clasificados en propiedad horizontal, consejo administrativo, admnistracion de bienes raices, admnistracion de apartamentos, administracion de conjunto cerrado, bitacora conjunto cerrado, seguridad en conjunto cerrado, calendario actividades, mantenimiento de equipos, propietario apartamento, coeficiente, area construida, area privada, locatario, numero de parqueadero, numero de deposito, personal de servicio, mascotas, control mascotas, control personal de servicio, control de vehiculos, numero de torres, gerencia inmobiliaria">
      <meta name="author" content="Wilson Giovanny Velandia Barreto <willyv78@gmail.com> 3204274564">
      <meta http-equiv="Cache-control" content="no-cache">
      <meta http-equiv="Expires" content="-1">
      <title>Admnistración de Propiedad Horizontal, gerencia inmobiliaria y bienes raices</title>
      <!-- <link rel="shortcut icon" href="../images/favicon.ico" />
      <link rel="apple-touch-icon" href="../images/icono-57.png" />
      <link rel="apple-touch-icon" sizes="72x72" href="../images/icono-72.png" />
      <link rel="apple-touch-icon" sizes="114x114" href="../images/icono-114.png" /> -->
      
      <link rel="apple-touch-icon" sizes="57x57" href="../images/apple-icon-57x57.png">
      <link rel="apple-touch-icon" sizes="60x60" href="../images/apple-icon-60x60.png">
      <link rel="apple-touch-icon" sizes="72x72" href="../images/apple-icon-72x72.png">
      <link rel="apple-touch-icon" sizes="76x76" href="../images/apple-icon-76x76.png">
      <link rel="apple-touch-icon" sizes="114x114" href="../images/apple-icon-114x114.png">
      <link rel="apple-touch-icon" sizes="120x120" href="../images/apple-icon-120x120.png">
      <link rel="apple-touch-icon" sizes="144x144" href="../images/apple-icon-144x144.png">
      <link rel="apple-touch-icon" sizes="152x152" href="../images/apple-icon-152x152.png">
      <link rel="apple-touch-icon" sizes="180x180" href="../images/apple-icon-180x180.png">
      <link rel="icon" type="image/png" sizes="192x192" href="../images/android-icon-192x192.png">
      <link rel="icon" type="image/png" sizes="32x32" href="../images/favicon-32x32.png">
      <link rel="icon" type="image/png" sizes="96x96" href="../images/favicon-96x96.png">
      <link rel="icon" type="image/png" sizes="16x16" href="../images/favicon-16x16.png">
      <link rel="manifest" href="../images/manifest.json">
      <meta name="msapplication-TileColor" content="#ffffff">
      <meta name="msapplication-TileImage" content="../images/ms-icon-144x144.png">
      <meta name="theme-color" content="#ffffff">

      <!-- Calendar -->
      <link rel="stylesheet" href="../css/fullcalendar.css">
      <!-- <link rel="stylesheet" href="../css/sweet-alert.css"> -->
      <link rel="stylesheet" href="../css/sweetalert.css">
      <!-- CSS Bootstrapvalidator -->
      <link rel="stylesheet" href="../css/bootstrapValidator.css"/>
      <!-- Date picker -->
      <link rel="stylesheet" href="../css/bootstrap-datetimepicker.min.css">
      <link rel="stylesheet" href="../css/bootstrap-timepicker.min.css">
      <!-- DatePicker -->
      <link rel="stylesheet" href="../css/datepicker.css">
      <link rel="stylesheet" href="../css/bootstrap.min.css">
      <link rel="stylesheet" href="../css/font-awesome.min.css">
      <link rel="stylesheet" href="../css/inicio.css">
      <link rel="stylesheet" href="../css/plantilla1/style.css">
      <link rel="stylesheet" href="../css/responsive.css">
      <!-- Google analitycs -->
      <script type="text/javascript">
        /*var _gaq = _gaq || [];
        _gaq.push(['_setAccount', 'UA-44648472-1']);
        // Recommanded value by Google doc and has to before the trackPageView
        _gaq.push(['_setSiteSpeedSampleRate', 5]);
        _gaq.push(['_trackPageview', 'product']);
        (function() {
        var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
        ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
        var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
        })();*/
      </script>
      <!-- Desabilita la opcion de seleccionar texto -->
      <script type="text/javascript">
        function disableselect(e){return false }
        function reEnable(){return true}
        //if IE4 
        // disable text selection        
        //if NS6
        if (window.sidebar){
          //document.onmousedown=disableselect
          // the above line creates issues in mozilla so keep it commented.
          document.onclick=reEnable
        }
        function clickIE(){
          if (document.all){
            (message);
            return false;
          }
        }
      </script>
      <!-- Desabilita la opcion de click derecho -->
      <script type="text/javascript">
        // disable right click
        window.onerror = new Function("return true");
        //No permite seleccionar el contenido de una página 
        document.oncontextmenu = function(){return false};
      </script>
      <!-- Borrar el portapapeles con el uso de teclado -->
      <script type="text/javascript">
        //Borra el Portapapeles con el uso del teclado
        if (document.layers)
          document.captureEvents(Event.KEYPRESS)
        function backhome(e){
          window.clipboardData.clearData();
        }
      </script>
      <!--[if lte IE 8]>
        <script src="excanvas.js"></script>
      <![endif]-->
    </head>
    <body><?php 
    if($sw > 0){?>
      <!-- Barra de navegación superior -->
      <div class="navbar navbar-inverse navbar-fixed-top bs-docs-nav" role="banner" style="z-index: 3001;">
        <div class="containerk">
          <!-- Menu button for smallar screens HEADER -->
          <div class="navbar-header">
            <!-- Menu superior minimizado en tres barras -->
            <button class="navbar-toggle hidden-sm hidden-md hidden-lg" type="button" data-toggle="collapse" data-target=".bs-navbar-collapse">
               <span class="sr-only">Menu Minimizado</span>
               <span class="icon-bar"></span>
               <span class="icon-bar"></span>
               <span class="icon-bar"></span>
            </button>
            <!-- Imagen central -->
            <div class="hidden-xs hidden-sm hidden-md col-lg-3 pull-left" id="logo-site" alt="Ir a la página de inicio" title="Ir a la página de inicio">
            </div>
            <!-- Site name for smallar screens -->
            <!-- Barra de navegacion superior derecha -->
            <div class="col-xs-12 col-sm-10 col-md-10 col-lg-7 text-center" id="menu-sup">
              <nav class="collapse navbar-collapse bs-navbar-collapse col-xs-12 col-sm-12 col-md-12 col-lg-12" role="navigation">
                <!-- Menu en moviles -->
                <ul class="nav navbar-nav navbar-right text-left">
                  <!-- home -->
                  <li class="dropdown col-xs-12 col-sm-1 col-md-2 hidden-lg text-left" title="Ir a la página de inicio" alt="Ir a la página de inicio">
                    <a class="dropdown-toggle" data-toggle="dropdown">
                      <i class="glyphicon fa fa-home" style="font-size: 1.4em;"></i>
                      <b class="caret"></b>
                    </a>
                    <ul class="dropdown-menu" style="text-align: center;left: 0;">
                      <li>
                        <a class="menu_movil" href="#lista-de-apartamentos.html">
                          Inicio
                        </a>
                      </li>
                      <li>
                        <a class="menu_movil" href="#quienes-somos.html">¿Quiénes Somos?</a>
                      </li>
                      <li>
                        <a class="menu_movil" href="#documentos.html">Documentos</a>
                      </li>
                      <li>
                        <a class="menu_movil" href="#calendario.html">Actividades</a>
                      </li>
                      <li>
                        <a class="menu_movil" href="#tareas.html">Tareas</a>
                      </li>
                      <li>
                        <a class="menu_movil" href="#mensajes.html">Mensajes</a>
                      </li>
                    </ul>
                  </li>
                  <!-- Quienes Somos -->
                  <li class="dropdown hidden-xs hidden-sm hidden-md col-lg-2 text-nowrap">
                    <a class="dropdown-toggle" data-toggle="dropdown">
                      Inicio
                      <b class="caret"></b>
                    </a>
                    <ul class="dropdown-menu" style="text-align: center;">
                      <li>
                        <a class="menu_movil" href="#quienes-somos.html">¿Quiénes Somos?</a>
                      </li>
                      <li>
                        <a class="menu_movil" href="#documentos.html">Documentos</a>
                      </li>
                      <li>
                        <a class="menu_movil" href="#calendario.html">Actividades</a>
                      </li>
                      <li>
                        <a class="menu_movil" href="#tareas.html">Tareas</a>
                      </li>
                      <li>
                        <a class="menu_movil" href="#mensajes.html">Mensajes</a>
                      </li>
                      <li>
                        <a class="menu_movil" href="#servicios-publicos.html">Serv. Públicos</a>
                      </li>
                    </ul>
                  </li>
                  <!-- Apartamentos / residentes -->
                  <li class="dropdown col-xs-12 col-sm-3 col-md-2 col-lg-2 text-nowrap">
                    <a class="dropdown-toggle" data-toggle="dropdown">
                      Apartamentos
                      <b class="caret"></b>
                    </a>
                    <ul class="dropdown-menu" style="text-align: center;">
                      <li>
                        <a class="menu_movil" href="#lista-de-apartamentos.html">Lista Aptos.</a>
                      </li>
                      <li>
                        <a class="menu_movil" href="#tipos-de-apartamento.html">Tipo Aptos.</a>
                      </li>
                    </ul>
                  </li>
                  <!-- Inventario -->
                  <li class="dropdown col-xs-12 col-sm-3 col-md-2 col-lg-2 text-nowrap">
                    <a class="dropdown-toggle" data-toggle="dropdown">
                      Inventario
                      <b class="caret"></b>
                    </a>
                    <ul class="dropdown-menu" style="text-align: center;">
                      <li>
                        <a class="menu_movil" href="#equipos-y-mantenimientos-activos.html">Activos</a>
                      </li>
                      <li>
                        <a class="menu_movil" href="#equipos-y-mantenimientos-inactivos.html">Inactivos</a>
                      </li>
                    </ul>
                  </li>
                  <!-- Estadisticas -->
                  <li class="dropdown col-xs-12 col-sm-3 col-md-2 col-lg-2 text-nowrap">
                    <a class="dropdown-toggle" data-toggle="dropdown">
                      Estadísticas
                      <b class="caret"></b>
                    </a>
                    <ul class="dropdown-menu" style="text-align: center;">
                      <li>
                        <a class="menu_movil" href="#estadisticas.html">Habitantes</a>
                      </li>
                      <li>
                        <a class="menu_movil" href="#estadisticas-servicios-publicos.html">Serv. Públicos</a>
                      </li>
                    </ul>
                  </li>
                  <!-- Configuración -->
                  <li class="dropdown col-xs-12 col-sm-3 col-md-2 col-lg-2 text-nowrap">
                    <a class="dropdown-toggle" data-toggle="dropdown">
                      Configuración
                      <b class="caret"></b>
                    </a>
                    <ul class="dropdown-menu" style="text-align: center;">
                      <li>
                        <a class="menu_movil" href="#lista-de-zonas.html">Zonas</a>
                      </li>
                      <li>
                        <a class="menu_movil" href="#lista-de-parqueaderos.html">Parqueaderos</a>
                      </li>
                      <li>
                        <a class="menu_movil" href="#lista-de-depositos.html">Depósitos</a>
                      </li>
                      <li>
                        <a class="menu_movil" href="#evaluaciones.html">Evaluaciones</a>
                      </li>
                      <li>
                        <a class="menu_movil" href="#categorias.html">Categorías</a>
                      </li>
                      <li>
                        <a class="menu_movil" href="#temas.html">Temas</a>
                      </li>
                      <li>
                        <a class="menu_movil" href="#calificar-evaluacion.html">Calificar Evaluación</a>
                      </li>
                    </ul>
                  </li>
                  <!-- Contactos -->
                  <li class="dropdown col-xs-12 col-sm-3 col-md-2 col-lg-2 text-nowrap">
                    <a class="menu_movil" href="#contactos.html">Contactos</a>
                  </li>
                  <!-- Cerrar Sessión / preguntas frecuentes / Cambiar contraseña -->
                  <li class="dropdown col-xs-12 hidden-sm hidden-md hidden-lg">
                    <a class="dropdown-toggle" data-toggle="dropdown">
                      Perfíl
                      <b class="caret"></b>
                    </a>
                    <ul class="dropdown-menu" style="text-align: center;">
                      <li>
                        <a class="menu_movil" href="#ndexjquerytabs1-page-question">Preguntas Frecuentes</a>
                      </li>
                      <li>
                        <a class="menu_movil" href="#indexjquerytabs1-page-perfil">Ver Perfíl</a>
                      </li>
                      <li>
                        <a class="menu_movil" href="#indexjquerytabs1-page-pass">Cambiar Contraseña</a>
                      </li>
                      <li>
                        <a class="menu_movil" href="#indexjquerytabs1-page-cerrar">Cerrar Sesión</a>
                      </li>
                    </ul>
                  </li>
                </ul>
              </nav>
            </div>
            <!-- Nombre de usuario y cerrar sessión -->
            <div class="hidden-xs col-sm-2 col-md-2 col-lg-2 pull-right text-right" id="nom-usu">
              <!-- div superios del menu que contendra los iconos de cambio de clave, nombre y cerrar session -->
              <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <!-- icono de preguntas frecuentes -->
                <div class="hidden-xs col-sm-4 col-md-4 col-lg-offset-3 col-lg-3 text-right nav-cerrar">
                  <i href="#indexjquerytabs1-page-question" data-original-title="Preguntas Frecuentes" data-toggle="tooltip" data-placement="left" title="Preguntas Frecuentes" alt="Preguntas Frecuentes" class="glyphicon fa fa-question pull-right menu_movil"></i>
                </div>
                <!-- icono de cambiar contraseña -->
                <div class="hidden-xs col-sm-4 col-md-4 col-lg-3 text-center nav-cerrar">
                  <i href="#indexjquerytabs1-page-pass" data-original-title="Cambiar contraseña" data-toggle="tooltip" data-placement="left" title="Cambiar contraseña" alt="Cambiar contraseña" class="glyphicon fa fa-lock menu_movil"></i>
                </div>
                <!-- icono de salir cerrar session -->
                <div class="hidden-xs col-sm-4 col-md-4 col-lg-3 text-right nav-cerrar">
                  <i href="#indexjquerytabs1-page-cerrar" data-original-title="Salir" data-toggle="tooltip" data-placement="left" title="Cerrar sesión" alt="Cerrar sesión" class="glyphicon glyphicon-remove pull-left menu_movil"></i>
                </div>
                <!-- Nombre de usuario, foto usuario e icono de salir -->
                <div class="hidden-xs hidden-sm hidden-md hidden-lg nav-cerrar text-center" id="nom-usu-s">
                  <!-- Nombre de Usuario -->
                  <span href="#indexjquerytabs1-page-perfil" class="bold menu_movil" data-original-title="Ver perfil" data-toggle="tooltip" data-placement="bottom" title="Ver perfil" alt="Ver perfil"><?php echo $UsuNombre; ?></span>
                </div>
              </div>
            </div>
          </div>
          <!-- Variables de session -->
          <input id="user_id" type="hidden" value="<?php echo $_SESSION['UsuID'];?>">
          <input id="sess_user_perf" type="hidden" value="">
          <input id="sess_user_mail" type="hidden" value="">
        </div>
      </div>
      <!-- Contenido de la pagina -->
      <div id="cont-pag" class="container-fluid">
         <div class="row">
            <!-- Aca se desplega el contenido de la pagina -->
            <div id="col-md-12" class="col-xs-12 col-sm-12 col-md-12 col-lg-12"></div>
            <!-- Fin del contenido de la pagina -->
         </div>
      </div>
      <!-- Div de carga de la pagina -->
      <div class="espere">
          <div id="cargar_gif"></div>
          <!-- <div id="cargar_blanco"></div> -->
          <div id="cargar_texto">Cargando espere un momento por favor...</div>
      </div>
      <!-- Div de carga de formulario para ingreso de eventos al calendario -->
      <div class="ing-cal hidden"></div>
      <!-- Div de carga de formulario para ingreso de documentos -->
      <div class="ing-doc hidden"></div>
      <!-- Pie de pagina -->
      <footer id="footer">
        <p id="textoffooter">Diseñado por R<span id="textspan1"> + </span>B Diseño E<span id="textspan2">x</span>perimental<br>&copy; 2016 - Todos los derechos reservados.</p>
      </footer><?php 
    }
    else{?>
      <script>window.location = "../";</script><?php 
    }?>
    <script src="../js/jquery.min.js?rev=<?php echo time();?>"></script>
    <script src="../js/jquery-1.12.3.js"></script>
    <!-- Librerias para crear las tablas con filtro y paginado -->
    <script src="../libraries/dataTables/media/js/jquery.js"></script>
    <script src="../libraries/dataTables/media/js/jquery.dataTables.js"></script>
    <script src="../libraries/dataTables/media/js/jquery.dataTables.min.js"></script>
    <script src="../libraries/dataTables/media/js/jquery.jeditable.js"></script>
    <script src="../libraries/dataTables/extras/TableTools/media/js/TableTools.js"></script>
    <script src="../libraries/dataTables/extras/TableTools/media/js/TableTools.min.js"></script>
    <script src="../libraries/dataTables/extras/TableTools/media/js/ZeroClipboard.js"></script>
    <!-- Personalizar alertas -->
    <script src="../js/sweetalert.min.js"></script>
    <!-- <script src="../js/sweet-alert.js"></script> -->
    <!-- Bootstrap -->
    <script src="../js/bootstrap.js"></script>
    <!-- Libreria javascript para los calendarios en campor input -->
    <script src="../js/bootstrap-datetimepicker.min.js"></script>
    <!-- Librerias para las estadisticas -->
    <script src="../js/estadisticas/highcharts.js"></script>
    <script src="../js/estadisticas/highcharts-3d.js"></script>
    <script src="../js/estadisticas/highcharts-more.js"></script>
    <script src="../js/estadisticas/exporting.js"></script>
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/highcharts-more.js"></script>
    <script src="https://code.highcharts.com/modules/solid-gauge.js"></script>
    <!-- Libreria javascript que utilizo para funciones del sitio -->
    <script src="../js/inicio.js"></script>
    <script type="text/javascript">if($===jQuery){jQuery.noConflict();}</script>
  </body>
</html>