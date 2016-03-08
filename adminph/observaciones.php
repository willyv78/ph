<?php session_start();
require_once ("../conexion/conexion.php");
require_once ("../php/funciones.php");
$id_tarea = $_GET["id"];
$sql = ObsTareas($id_tarea);
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
      <script type="text/javascript" src="../js/maestros.js"></script>
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
   <body>
      <!-- Nombre de la pagina (contenido de la pestaña) -->
      <input id="nombre_pagina" type="hidden" value="3">
      <div id="wb_page1Shape1">
         <span style="color:#FFFFFF;font-family:Arial;font-size:16px;">Observaciones Tareas</span>
      </div>
      <div id="wb_observacionesText5">
         <span style="color:#808080;font-family:Verdana;font-size:16px;">Observación: </span>
      </div>
      <textarea id="observacionesEditbox1" name="observacionesEditbox1" cols="80" rows="5"></textarea>
      <div id="wb_observacionesText2">
         <input type="button" id="agregartarea" name="agregartarea" valor="<?php echo $id_tarea;?>" value="Agregar Observación">
      </div>
      <?php 
      if($sql){
         if(mysql_num_rows($sql) > 0){
            $sw = 0;
            while($row_sql = mysql_fetch_array($sql)){?>
               <div id="wb_observacionesText1">
                  <span style="color:#4169E1;font-family:Arial;font-size:19px;"><?php echo $row_sql[1]; ?></span>
                  <span style="color:#808080;font-family:Verdana;font-size:16px;"><?php echo $row_sql[2]." ".$row_sql[3]; ?></span>
               </div>
               <div id="wb_observacionesText3">
                  <span style="color:#000000;font-family:Arial;font-size:13px;"><?php echo $row_sql[0]; ?></span>
               </div><?php
               $sw += 1;
            }
         }
         else{?>
            <div id="wb_observacionesText3">
               <span style="color:#000000;font-family:Arial;font-size:13px;">No hay observaciones.</span>
            </div><?php 
         }
      }
      else{?>
         <div id="wb_observacionesText3">
            <span style="color:#000000;font-family:Arial;font-size:13px;">No hay observaciones.</span>
         </div><?php 
      }?>
   </body>
</html>