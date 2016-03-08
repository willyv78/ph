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
         <title>PH</title>
         <link rel="shortcut icon" href="../images/favicon.ico" />
         <link rel="apple-touch-icon" href="../images/icono-57.png" />
         <link rel="apple-touch-icon" sizes="72x72" href="../images/icono-72.png" />
         <link rel="apple-touch-icon" sizes="114x114" href="../images/icono-114.png" />
         <link rel="stylesheet" href="../images/south-street/jquery.ui.all.css">
         <!-- Calendar -->
         <link rel="stylesheet" href="../css/fullcalendar.css">
         <link rel="stylesheet" href="../css/inicio.css">
         <link rel="stylesheet" href="../css/sweet-alert.css">
         <!-- CSS Bootstrapvalidator -->
         <link rel="stylesheet" href="../css/bootstrapValidator.css"/>
         <!-- Date picker -->
         <link rel="stylesheet" href="../css/bootstrap-datetimepicker.min.css">
         <link rel="stylesheet" href="../css/bootstrap-datetimepicker.css">
         <link rel="stylesheet" href="../css/bootstrap.min.css">
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
      <body style="background-color:#000000"><?php 
      if($sw > 0){?>
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
                  <div class="col-xs-5 col-sm-4 col-md-3 col-lg-2">
                     <img src="../images/logo_def.png" class="img-responsive" alt="Image" width="40%">
                  </div>
                  <div class="col-xs-5 col-sm-8 col-md-9 col-lg-10 text-right">
                     <div class="hidden-xs col-sm-5 col-md-6 col-lg-6 nav-cerrar">
                        <!-- Titulo de la pagina suoerior izquierda -->
                        <p class="">
                           <a href="./" class="navbar-link">Edificio GAIA</a>
                        </p>
                     </div>
                     <!-- Nombre de usuario, foto usuario e icono de salir -->
                     <div class="hidden-xs col-sm-4 col-md-4 col-lg-4 nav-cerrar">
                        <!-- Nombre de Usuario -->
                        <span href="#indexjquerytabs1-page-perfil" class="bold hidden-xs menu_movil" data-original-title="Cambiar Contraseña" data-toggle="tooltip" data-placement="bottom" title=""><?php echo $UsuNombre; ?></span>
                     </div>
                     <div class="col-xs-12 col-sm-2 col-md-1 col-lg-1 text-right">
                        <!-- Foto de usuario -->
                        <div id="foto_usu" data-original-title="Ver Hoja de Vida" data-toggle="tooltip" data-placement="bottom" title="">
                           <img src="../images/Javier-Martin-GRUPO-PERSONA.jpg" class="img-responsive" alt="Image" width="100%">
                        </div>
                     </div>
                     <!-- icono de salir cerrar session -->
                     <div class="hidden-xs col-sm-1 col-md-1 col-lg-1 text-center nav-cerrar">
                        <i href="#indexjquerytabs1-page-cerrar" data-original-title="Salir" data-toggle="tooltip" data-placement="left" title="" class="glyphicon glyphicon-remove pull-right menu_movil"></i>
                     </div>
                  </div>
               </div>
                 
              <!-- Variables de session -->
              <input id="user_id" type="hidden" value="<?php echo $_SESSION['UsuID'];?>">
              <input id="sess_user_perf" type="hidden" value="">
              <input id="sess_user_mail" type="hidden" value="">

              <!-- Site name for smallar screens -->
              <!-- Barra de navegacion superior derecha -->
              <nav class="collapse navbar-collapse bs-navbar-collapse" role="navigation">
                  <!-- Menu en moviles -->
                  <ul class="nav navbar-nav navbar-right text-left">
                      <!-- Quienes somos -->
                      <li class="dropdown">
                          <!-- Nombre icono menu -->
                          <a class="menu_movil" href="#indexjquerytabs1-page-quienes">
                              <i class="glyphicon glyphicon-calendar"></i>&nbsp;&nbsp;¿Quienes Somos?
                          </a>
                      </li>
                      <!-- Calendario -->
                      <li class="dropdown">
                          <!-- Nombre icono menu -->
                          <a class="menu_movil" href="#indexjquerytabs1-page-cal">
                              <i class="glyphicon glyphicon-calendar"></i>&nbsp;&nbsp;Calendario
                              <span class="badge">6</span>
                          </a>
                      </li>
                      <!-- Documentos -->
                      <li class="dropdown">
                          <!-- Nombre icono menu -->
                          <a class="menu_movil" href="#indexjquerytabs1-page-doc">
                              <i class="glyphicon glyphicon-calendar"></i>&nbsp;&nbsp;Documentos
                          </a>
                      </li>
                      <!-- Tesoreria -->
                      <li class="dropdown">
                          <!-- Nombre icono menu -->
                          <a class="menu_movil" href="#indexjquerytabs1-page-tes">
                              <i class="glyphicon glyphicon-calendar"></i>&nbsp;&nbsp;Tesoreria
                          </a>
                      </li>
                      <!-- Contactos -->
                      <li class="dropdown">
                          <!-- Nombre icono menu -->
                          <a class="menu_movil" href="#indexjquerytabs1-page-cont">
                              <i class="glyphicon glyphicon-calendar"></i>&nbsp;&nbsp;Contactos
                          </a>
                      </li>
                      <!-- Perfil -->
                      <li class="dropdown">
                          <!-- Nombre icono menu -->
                          <a class="menu_movil" href="#indexjquerytabs1-page-perfil">
                              <i class="glyphicon glyphicon-calendar"></i>&nbsp;&nbsp;Perfil
                          </a>
                      </li>
                  </ul>
              </nav>
            </div>
         </div>
         <!-- Contenido de la pagina -->
         <div class="container">
            <div class="row">
               <!-- Aca se desplega el contenido de la pagina -->
               <div id="col-md-12" class="col-xs-12 col-sm-12 col-md-12 col-lg-12"></div>
               <!-- Fin del contenido de la pagina -->
            </div>
         </div>
         <!-- Pie de pagina -->
         <div id="footer" class="clearfix">
            <p id="textoffooter">R<span id="textspan1">+</span>B Diseño E<span id="textspan2">x</span>perimental<br /></p>
         </div>
      <?php }
      else{?>
         <script>window.location = "../";</script>
      <?php } ?>


      <script type="text/javascript">if($===jQuery){jQuery.noConflict();}</script>
      <script src="../js/jquery.min.js"></script>
      <script src="../js/jquery-1.9.1.min.js"></script>
      <script src="../js/jquery-1.10.2.js"></script>
      <script src="../js/jquery-2.1.3.min.js"></script>
      <script src="../js/bootstrap-datetimepicker.min.js"></script> <!-- Datetimepicker -->
      <script src="../js/bootstrapValidator.js"></script>
      <script src="../js/sweet-alert.js"></script><!-- Personalizar alertas -->
      <script src="../js/bootstrap.js"></script> <!-- Bootstrap -->
      <script src="../js/inicioh.js"></script>
   </body>
</html>