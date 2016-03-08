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
      $UsuNombre = $row_user[1];
      $UsuApellido = $row_user[2];
      $UsuFoto = $row_user[3];
      $sw += 1;
      }
   }
?>
<!DOCTYPE html>
  <html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es">
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
      <link rel="shortcut icon" href="../images/favicon.ico" />
      <link rel="apple-touch-icon" href="../images/icono-57.png" />
      <link rel="apple-touch-icon" sizes="72x72" href="../images/icono-72.png" />
      <link rel="apple-touch-icon" sizes="114x114" href="../images/icono-114.png" />
      <!-- Calendar -->
      <link rel="stylesheet" href="../css/fullcalendar.css">
      <link rel="stylesheet" href="../css/sweet-alert.css">
      <!-- CSS Bootstrapvalidator -->
      <link rel="stylesheet" href="../css/bootstrapValidator.css"/>
      <!-- Date picker -->
      <link rel="stylesheet" href="../css/bootstrap-datetimepicker.min.css">
      <link rel="stylesheet" href="../css/bootstrap-timepicker.min.css">
      <!-- DatePicker -->
      <link rel="stylesheet" href="../css/datepicker.css">
      <link rel="stylesheet" href="../css/inicio.css">
      <link rel="stylesheet" href="../css/responsive.css">
      <link rel="stylesheet" href="../css/bootstrap.min.css">
      <link rel="stylesheet" href="../css/plantilla1/style.css">
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
      <style type="text/css">
        @import "../libraries/dataTables/media/css/demo_page.css";
        @import "../libraries/dataTables/media/css/demo_table.css";
        @import "../libraries/dataTables/extras/TableTools/media/css/TableTools.css";
      </style>
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
            <div class="hidden-xs hidden-sm hidden-md col-lg-4 pull-left" id="logo-site">
              <img id="logo_edif" src="../images/logo.png" class="img-responsive" title="Logo del edificio" alt="Logo del edificio">
            </div>
            <!-- Site name for smallar screens -->
            <!-- Barra de navegacion superior derecha -->
            <div class="col-xs-12 col-sm-11 col-md-10 col-lg-6 text-center" id="menu-sup">
              <nav class="collapse navbar-collapse bs-navbar-collapse" role="navigation">
                <!-- Menu en moviles -->
                <ul class="nav navbar-nav navbar-right text-left">
                  <!-- Calendario -->
                  <li class="dropdown">
                    <a class="menu_movil" href="#calendario.html">
                      Calendario
                          <span class="badge">6</span>
                    </a>
                  </li>
                  <!-- Quienes somos -->
                  <li class="dropdown">
                    <a class="menu_movil" href="#quienes-somos.html">
                      ¿Quienes Somos?
                    </a>
                  </li>
                  <!-- Documentos -->
                  <li class="dropdown">
                    <a class="menu_movil" href="#documentos.html">
                      Documentos
                    </a>
                  </li>
                  <!-- Tesoreria -->
                  <li class="dropdown">
                    <a class="menu_movil" href="#tesoreria.html">
                      Tesoreria
                    </a>
                  </li>
                  <!-- Contactos -->
                  <li class="dropdown">
                    <a class="menu_movil" href="#contactos-y-numeros-de-emergencia.html">
                      Contactos
                    </a>
                  </li>
                  <!-- Estadísticas -->
                  <li class="dropdown">
                    <!-- Nombre icono menu -->
                    <a class="menu_movil" href="#estadisticas.html">Estadísticas</a>
                  </li>
                </ul>
              </nav>
            </div>
            <!-- Nombre de usuario y cerrar sessión -->
            <div class="hidden-xs col-sm-1 col-md-2 col-lg-2 pull-right text-right" id="nom-usu">
              <!-- Nombre de usuario, foto usuario e icono de salir -->
              <div class="hidden-xs hidden-sm hidden-md col-lg-11 nav-cerrar text-center">
                <!-- Nombre de Usuario -->
                <span href="#indexjquerytabs1-page-perfil" class="bold menu_movil" data-original-title="Ver perfil" data-toggle="tooltip" data-placement="bottom" title="Ver perfil" alt="Ver perfil"><?php echo $UsuNombre; ?></span>
              </div>
              <!-- icono de salir cerrar session -->
              <div class="hidden-xs col-sm-12 col-md-12 col-lg-1 text-right nav-cerrar">
                <i href="#indexjquerytabs1-page-cerrar" data-original-title="Salir" data-toggle="tooltip" data-placement="left" title="Cerrar sesión" alt="Cerrar sesión" class="glyphicon glyphicon-remove pull-right menu_movil"></i>
              </div>
            </div>
          </div>
          <!-- Variables de session -->
          <input id="user_id" type="hidden" value="<?php echo $_SESSION['UsuID'];?>">
          <input id="sess_user_perf" type="hidden" value="<?php echo $_SESSION['PerfID'];?>">
          <input id="sess_user_mail" type="hidden" value="<?php echo $_SESSION['UsuEmail'];?>">
        </div>
      </div>
      <img class="hidden-xs hidden-sm hidden-md img-izq" src="../css/plantilla1/img/verdecostadoizq.png" alt="">
      <!-- Contenido de la pagina -->
      <div class="container" style="width:90%;">
        <div class="row">
          <!-- Aca se desplega el contenido de la pagina -->
          <div id="col-md-12" class="col-xs-12 col-sm-12 col-md-12 col-lg-12"></div>
          <!-- Fin del contenido de la pagina -->
        </div>
      </div>
      <!-- Pie de pagina -->
      <!-- <div style="bottom: 0px; display: block; margin: 10px; width: 100%; position: relative; padding: 100px 10px 10px; font-size: 0.8em;" id="footer">
        <p id="textoffooter">R<span id="textspan1">+</span>B Diseño E<span id="textspan2">x</span>perimental<br></p>
      </div> -->
      <!-- Div de carga de la pagina -->
      <div class="espere">
        <div id="cargar_gif"></div>
        <!-- <div id="cargar_blanco"></div> -->
        <div id="cargar_texto">Cargando espere un momento por favor...</div>
      </div>
      <!-- Div de carga de formulario para ingreso de eventos al calendario -->
      <div class="ing-cal hidden"></div>
      <!-- Div de carga de formulario para ingreso de documentos -->
      <div class="ing-doc hidden"></div><?php 
    }
    else{?>
      <script>window.location = "../";</script><?php 
    }?>
      <script src="../js/jquery.min.js"></script>
      <script src="../js/sweet-alert.js"></script><!-- Personalizar alertas -->
      <script src="../js/bootstrap.js"></script> <!-- Bootstrap -->
      <script src="../js/bootstrap-datetimepicker.min.js"></script>
      <script src="../js/bootstrapValidator.js"></script>
      <script src="../libraries/dataTables/media/js/jquery.js"></script>
      <script src="../libraries/dataTables/media/js/jquery.dataTables.js"></script>
      <script src="../libraries/dataTables/media/js/jquery.dataTables.min.js"></script>
      <script src="../libraries/dataTables/media/js/jquery.jeditable.js"></script>
      <script src="../libraries/dataTables/extras/TableTools/media/js/TableTools.js"></script>
      <script src="../libraries/dataTables/extras/TableTools/media/js/TableTools.min.js"></script>
      <script src="../libraries/dataTables/extras/TableTools/media/js/ZeroClipboard.js"></script>
      <script src="../js/estadisticas/highcharts.js"></script>
      <script src="../js/estadisticas/highcharts-3d.js"></script>
      <script src="../js/estadisticas/highcharts-more.js"></script>
      <script src="../js/estadisticas/exporting.js"></script>
      <script src="../js/inicioh.js"></script>
      <script type="text/javascript">
        $(document).ready(function(){
          $('.dropdown-toggle').dropdown();
        })
      </script>
      <script type="text/javascript">if($===jQuery){jQuery.noConflict();}</script>
   </body>
</html>