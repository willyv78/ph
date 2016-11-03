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
  <html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es">
    <head>
      <meta http-equiv="content-type" content="text/html;charset=utf-8" />
      <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1">
      <meta name="apple-mobile-web-app-capable" content="yes" />
      <meta name="apple-mobile-web-app-status-bar-style" content="black" />
      <title>PH</title>
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
      <link rel="stylesheet" href="../css/bootstrap-timepicker.css">
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
    </head>
    <body>
      <?php if($sw > 0){?>
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
      <!-- Barra de navegación superior -->
      <div class="navbar navbar-inverse navbar-fixed-top bs-docs-nav" role="banner">
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
            <div  class="hidden-xs hidden-sm hidden-md col-lg-3 pull-left" id="logo-site" alt="Ir a la página de inicio" title="Ir a la página de inicio"></div>
            <!-- Site name for smallar screens -->
            <!-- Barra de navegacion superior derecha -->
            <div class="col-xs-12 col-sm-10 col-md-10 col-lg-8 text-left" id="menu-sup">
              <nav class="collapse navbar-collapse bs-navbar-collapse col-xs-12 col-sm-12 col-md-12 col-lg-12" role="navigation">
                <!-- Menu en moviles -->
                <ul class="nav navbar-nav navbar-right text-left">
                  <!-- home -->
                  <li class="dropdown col-xs-12 hidden-sm hidden-md hidden-lg" style="float:none;">
                    <a class="menu_movil" href="#pag-inicio-home">
                      Inicio
                          <!-- <span class="badge">6</span> -->
                    </a>
                  </li>
                  <!-- Residentes -->
                  <li class="dropdown col-xs-12 col-sm-2 col-md-2 col-lg-2" style="float:none;">
                    <a class="menu_movil" href="#inicio">Maestros</a>
                  </li>
                  <!-- Calendario -->
                  <li class="dropdown col-xs-12 col-sm-2 col-md-2 col-lg-2" style="float:none;">
                    <!-- Nombre icono menu -->
                    <a class="menu_movil" href="#proyecto">Proyecto</a>
                  </li>
                </ul>
              </nav>
            </div>
            <!-- Nombre de usuario y cerrar sessión -->
            <div class="hidden-xs col-sm-2 col-md-2 col-lg-1 pull-right text-right" id="nom-usu">
              <!-- div superios del menu que contendra los iconos de cambio de clave, nombre y cerrar session -->
              <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <!-- icono de preguntas frecuentes -->
                <div class="hidden-xs col-sm-4 col-md-4 col-lg-4 text-right nav-cerrar">
                  <i href="#perfil" data-original-title="Preguntas Frecuentes" data-toggle="tooltip" data-placement="left" title="Preguntas Frecuentes" alt="Preguntas Frecuentes" class="glyphicon fa fa-question pull-right menu_movil" style="padding:2px 6px;font-size:2.3em;"></i>
                </div>
                <!-- icono de cambiar contraseña -->
                <div class="hidden-xs col-sm-4 col-md-4 col-lg-4 text-center nav-cerrar">
                  <i href="#pass" data-original-title="Cambiar contraseña" data-toggle="tooltip" data-placement="left" title="Cambiar contraseña" alt="Cambiar contraseña" class="glyphicon fa fa-lock menu_movil" style="padding:2px 6px;font-size:2.3em;"></i>
                </div>
                <!-- icono de salir cerrar session -->
                <div class="hidden-xs col-sm-4 col-md-4 col-lg-4 text-right nav-cerrar">
                  <i href="#cerrar" data-original-title="Salir" data-toggle="tooltip" data-placement="left" title="Cerrar sesión" alt="Cerrar sesión" class="glyphicon glyphicon-remove pull-left menu_movil" style="padding:2px 2px;font-size:2.3em;"></i>
                </div>
                <!-- Nombre de usuario, foto usuario e icono de salir -->
                <div class="hidden-xs col-sm-12 col-md-12 col-lg-12 nav-cerrar text-center" id="nom-usu-s">
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
      <div class="container">
         <div class="row">
            <!-- Aca se desplega el contenido de la pagina -->
            <div id="col-md-12" class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="top:60px !important;"></div>
            <!-- Fin del contenido de la pagina -->
         </div>
      </div>


      <?php }
      else{?>
         <script>window.location = "../";</script>
      <?php } ?>
      <script type="text/javascript">if($===jQuery){jQuery.noConflict();}</script>
      <script src="../js/jquery.min.js"></script>
      <script src="../js/bootstrap-datetimepicker.min.js"></script> <!-- Datetimepicker -->
      <script src="../js/bootstrap-datepicker.js"></script> <!-- Datepicker -->
      <script src="../js/bootstrapValidator.js"></script>
      <script src="../js/sweet-alert.js"></script><!-- Personalizar alertas -->
      <script src="../js/bootstrap-timepicker.min.js"></script>
      <script src="../js/bootstrap.js"></script> <!-- Bootstrap -->
      <script src="../js/master.js"></script>
      <script type="text/javascript">
        $(document).ready(function(){
          $('.dropdown-toggle').dropdown();
        })
      </script>
   </body>
</html>