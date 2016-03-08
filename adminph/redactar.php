<?php session_start();
require_once ("../conexion/conexion.php");
require_once ("../php/funciones.php");
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es">
   <meta http-equiv="content-type" content="text/html;charset=utf-8" />
   <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1">
   <meta name="apple-mobile-web-app-capable" content="yes" />
   <meta name="apple-mobile-web-app-status-bar-style" content="black" />
   <head>
      <title>PH</title>
      <link rel="stylesheet" type="text/css" href="../css/Adminitracion.css">
      <link rel="stylesheet" type="text/css" href="../css/inicio.css">
      <script src="//code.jquery.com/jquery-1.10.2.js"></script>
      <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
      <script src="//code.jquery.com/ui/1.8.17/jquery-ui.min.js"></script>
      <script type="text/javascript" src="../js/jquery-ui-timepicker-addon.js"></script>
      <style type="text/css">
         body{
            font-size: 8px;
            line-height: 1.1875;
            margin: 0;
            padding: 0;
            background-color: #FFFFFF;
            color: #000000;
         }
      </style>
   </head>
   <body style="background-color: #FFFFFF;">
      <div id="wb_page1Shape1" style="position:absolute;left:0px;top:0px;width:100%;height:32px;z-index:1;">
         <img src="../images/img0013.png" id="page1Shape1" alt="" style="border-width:0;width:521px;height:32px;">
      </div>
      <div id="wb_page1Text1" style="position:absolute; left:11px; top:9px; width:324px; height:18px; z-index:2; text-align:left;">
         <span style="color:#FFFFFF;font-family:Arial;font-size:16px;">Redactar</span>
      </div>

      <div id="wb_redactarText0" style="position:absolute; left:11px; top:45px; width:100%; height:18px; z-index:3; text-align:left;">
         <span style="color:#808080;font-family:Verdana;font-size:16px;">Para:</span>
      </div>
      <input type="text" id="rmb_mens_para" style="position:absolute; left:8px; top:69px; width:494px; height:20px; line-height:20px; z-index:5;" name="rmb_mens_para" value="">

      <div id="wb_redactarText1" style="position:absolute;left:11px;top:104px;width:156px;height:18px;z-index:6;text-align:left;">
         <span style="color:#808080;font-family:Verdana;font-size:16px;">C.C. :</span>
      </div>
      <input type="text" id="rmb_mens_cc" style="position:absolute; left:8px; top:128px; width:494px; height:20px; line-height:20px; z-index:7;" name="rmb_mens_cc" value="">

      <div id="wb_redactarText2" style="position:absolute; left:10px; top:165px; width:156px; height:18px; z-index:8; text-align:left;">
         <span style="color:#808080;font-family:Verdana;font-size:16px;">Asunto :</span>
      </div>
      <input type="text" id="rmb_mens_asunto" style="position:absolute; left:8px; top:188px; width:494px; height:20px; line-height:20px; z-index:9;" name="rmb_mens_asunto" value="">

      <div id="wb_redactarText3" style="position:absolute; left:10px; top:228px; width:156px; height:18px; z-index:10; text-align:left;">
         <span style="color:#808080; font-family:Verdana; font-size:16px;">Mensaje:</span>
      </div>
      <textarea name="rmb_mens_mens" id="rmb_mens_mens" cols="28" rows="5" class="input_veh" style="position:absolute; left:8px; top:254px; width:492px; height:81px; z-index:4;"></textarea>

      <div style="position:absolute; left:10px; top:345px; width:100%; height:18px; z-index:10; text-align:left;">
         <span style="color:#808080;font-family:Arial;font-size:12px;">Nota: Si incluye varias direcciones de correo electrónico en los campos "Para" y/o "C.C. (Con Copia)" debe separarlas con una coma.</span>
      </div>

      <input type="button" id="enviar_mensaje" name="enviar_mensaje" value="Enviar" style="position:absolute; left:409px; top:358px; width:90px; height:25px;" class="perfiladministracionButton6">
   </body>
</html>
<script>
   $(document).ready(function() {
      
      //al hacer clic en el boton enviar en redacar mensaje
      $("#enviar_mensaje").click(function(event) {
         var para = $("#rmb_mens_para").val();
         var copia = $("#rmb_mens_cc").val();
         var asunto = $("#rmb_mens_asunto").val();
         var mensaje = $("#rmb_mens_mens").val();
         if((para.length < 1)&&(copia.length < 1)){alert("Digite el email del o los destinatarios en los campos 'Para' y/o 'Copia para'.\nNota: si en mensaje es enviado a varios destinatarios los email debe estar separados por comas");$("#rmb_mens_para").focus();return;}
         else if(asunto.length < 1){alert("Digite el asunto del mensaje");$("#rmb_mens_asunto").focus();return;}
         else if(mensaje.length < 1){alert("Digite el contenido del mensaje");$("#rmb_mens_mens").focus();return;}
         else{
            //Enviar los datos para ingresar o actualizar
            $.ajax({
               url:"../adminph/agregar_men.php",
               cache:false,
               type:"POST",
               data:"para="+para+"&copia="+copia+"&asunto="+asunto+"&mensaje="+mensaje,
               success: function(datos){
                  if(datos !== ''){
                     alert(datos);
                     parent.$("#perfiladministracionLayer2").load("../adminph/lista_m.php");
                     parent.$.fancybox.close();
                  }
                  else{alert("No se Agrego el registro");}
               }
            });
         }
      });
   });
</script>