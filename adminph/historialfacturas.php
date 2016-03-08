<?php session_start();
require_once ("../conexion/conexion.php");
require_once ("../php/funciones.php");
$id_usu = $_GET['id_usu'];
$query_sql = Inmuebles_Usu($id_usu);
$query_sql2 = $query_sql;
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
   <body style="background-color: #FFFFFF;">
      <!-- Detalle general del apartamento -->
      <div id="wb_page1Shape1" style="left:0px; top:0px; width:521px; height:32px; z-index:3; background-image:url('../images/img0007.png'); margin-left:0px">
         <span style="color:#FFFFFF;font-family:Arial;font-size:16px;">Detalle Inmueble</span>
      </div>
      <!-- Tabla con la lista de vehiculos del usuario ingresados -->
      <table style="left:5px; z-index:13;" id="detalleabitanteadministraTable2" align="center"><?php 
         if(!$query_sql){?>
            <tr><td colspan="4"><span style="color:#808080;font-family:Verdana;font-size:16px;">No hay Inmuebles registrados para el usuario.</span></td></tr>
         <?php }
         else{?>
            <?php 
            while($row_sql = mysql_fetch_array($query_sql)){ ?>
               <tr>
                  <td colspan="5">
                     <!-- Detalle interno del apartamento -->
                     <div id="wb_detalleabitanteadministraText6">
                        <span style="color:#808080;font-family:Verdana;font-size:16px;">Detalle General</span>
                     </div>
                  </td>
               </tr>
               <tr>
                  <td style="background-color:#008000;border:1px #C0C0C0 solid;text-align:center;vertical-align:middle;width:94px;height:34px;">
                     <div>
                        <span style="color:#000000;font-family:Arial;font-size:13px;"> </span>
                        <span style="color:#FFFFFF;font-family:Arial;font-size:13px;">Tipo</span>
                     </div>
                  </td>
                  <td style="background-color:#008000; border:1px #C0C0C0 solid; text-align:center; vertical-align:middle; width:140px; height:34px;">
                     <div>
                        <span style="color:#000000; font-family:Arial; font-size:13px;"> </span>
                        <span style="color:#FFFFFF; font-family:Arial; font-size:13px;">Área Total</span>
                     </div>
                  </td>
                  <td style="background-color:#008000; border:1px #C0C0C0 solid; text-align:center; vertical-align:middle; width:140px; height:34px;">
                     <div>
                        <span style="color:#FFFFFF; font-family:Arial; font-size:13px;">Área Const.</span>
                     </div>
                  </td>
                  <td style="background-color:#008000; border:1px #C0C0C0 solid; text-align:center; vertical-align:middle; width:140px; height:34px;">
                     <div>
                        <span style="color:#FFFFFF; font-family:Arial; font-size:13px;">Estado</span>
                     </div>
                  </td>
                  <td style="background-color:#008000;border:1px #C0C0C0 solid;text-align:center;vertical-align:middle;height:34px;">
                     <div>
                        <span style="color:#FFFFFF; font-family:Arial; font-size:13px;">Acción</span>
                     </div>
                  </td>
               </tr>
               <tr>
                  <td style="background-color:transparent; border:1px #C0C0C0 solid; text-align:center; vertical-align:middle;">
                     <div>
                        <span style="color:#000000; font-family:Arial; font-size:13px;"><?php echo $row_sql[10];?></span>
                     </div>
                  </td>
                  <td style="background-color:transparent; border:1px #C0C0C0 solid; text-align:center; vertical-align:middle;">
                     <div>
                        <span style="color:#000000; font-family:Arial; font-size:13px;"><?php echo $row_sql[2];?></span>
                     </div>
                  </td>
                  <td style="background-color:transparent; border:1px #C0C0C0 solid; text-align:center; vertical-align:middle;">
                     <div>
                        <span style="color:#000000;font-family:Arial;font-size:13px;"><?php echo $row_sql[3];?></span>
                     </div>
                  </td>
                  <td style="background-color:transparent; border:1px #C0C0C0 solid; text-align:center; vertical-align:middle;">
                     <div>
                        <span style="color:#000000;font-family:Arial;font-size:13px;"><?php echo $row_sql[9];?></span>
                     </div>
                  </td>
                  <td style="background-color:transparent; border:1px #C0C0C0 solid; text-align:center; vertical-align:middle;">
                     <div>
                        <span id="<?php echo $row_sql[0];?>" style="color:#DC143C; font-family:Arial; font-size:13px;cursor:pointer;" class="editar_inm">Borrar</span>
                        <!-- <span style="color:#32CD32; font-family:Arial; font-size:13px;cursor:pointer;" class="editar_inm">Editar</span> -->
                     </div>
                  </td>
               </tr>
               <tr>
                  <td colspan="5">
                     <!-- Detalle interno del apartamento -->
                     <div id="wb_detalleabitanteadministraText6">
                        <span style="color:#808080;font-family:Verdana;font-size:16px;">Detalle Interno</span>
                     </div>
                  </td>
               </tr>
               <tr>
                  <td style="background-color:#008000; border:1px #C0C0C0 solid; text-align:center; vertical-align:middle; height:34px;">
                     <div>
                        <span style="color:#000000;font-family:Arial;font-size:13px;"> </span>
                        <span style="color:#FFFFFF;font-family:Arial;font-size:13px;">No.</span>
                     </div>
                  </td>
                  <td style="background-color:#008000; border:1px #C0C0C0 solid; text-align:center; vertical-align:middle;  height:34px;">
                     <div>
                        <span style="color:#000000; font-family:Arial; font-size:13px;"> </span>
                        <span style="color:#FFFFFF; font-family:Arial; font-size:13px;">Baños</span>
                     </div>
                  </td>
                  <td style="background-color:#008000; border:1px #C0C0C0 solid; text-align:center; vertical-align:middle; height:34px;">
                     <div>
                        <span style="color:#FFFFFF; font-family:Arial; font-size:13px;">Alcobas</span>
                     </div>
                  </td>
                  <td style="background-color:#008000; border:1px #C0C0C0 solid; text-align:center; vertical-align:middle; height:34px;">
                     <div>
                        <span style="color:#FFFFFF; font-family:Arial; font-size:13px;">Cocinas</span>
                     </div>
                  </td>
                  <td style="background-color:#008000; border:1px #C0C0C0 solid; text-align:center; vertical-align:middle; height:34px;">
                     <div>
                        <span style="color:#FFFFFF; font-family:Arial; font-size:13px;">Balcones</span>
                     </div>
                  </td>
               </tr>
               <tr>
                  <td style="background-color:transparent; border:1px #C0C0C0 solid; text-align:center; vertical-align:middle;">
                     <div>
                        <span style="color:#000000; font-family:Arial; font-size:13px;"><?php echo $row_sql[1];?></span>
                     </div>
                  </td>
                  <td style="background-color:transparent; border:1px #C0C0C0 solid; text-align:center; vertical-align:middle;">
                     <div>
                        <span style="color:#000000; font-family:Arial; font-size:13px;"><?php echo $row_sql[4];?></span>
                     </div>
                  </td>
                  <td style="background-color:transparent; border:1px #C0C0C0 solid; text-align:center; vertical-align:middle;">
                     <div>
                        <span style="color:#000000;font-family:Arial;font-size:13px;"><?php echo $row_sql[6];?></span>
                     </div>
                  </td>
                  <td style="background-color:transparent; border:1px #C0C0C0 solid; text-align:center; vertical-align:middle;">
                     <div>
                        <span style="color:#000000;font-family:Arial;font-size:13px;"><?php echo $row_sql[5];?></span>
                     </div>
                  </td>
                  <td style="background-color:transparent; border:1px #C0C0C0 solid; text-align:center; vertical-align:middle;">
                     <div>
                        <span style="color:#000000;font-family:Arial;font-size:13px;"><?php echo $row_sql[7];?></span>
                     </div>
                  </td>
               </tr>
               <tr>
                  <td colspan="5">
                     <!-- observacion del inmueble -->      
                     <div id="wb_detalleabitanteadministraText6">
                        <span style="color:#808080;font-family:Verdana;font-size:16px;">Observación del Inmueble</span>
                     </div>
                     <div id="wb_detallepropiedadText2">
                        <span style="color:#000000; font-family:Arial; font-size:13px;"><?php echo $row_sql[11];?></span>
                     </div>
                  </td>
               </tr><?php 
            }
         }?>
      </table>


      <!-- aqui empieza la informacion para ingresar nuevos vehiculos -->
      <div id="wb_detalleabitanteadministraText6">
         <span style="color:#808080;font-family:Verdana;font-size:16px;">Agregar Inmueble</span>
      </div>
      <div class="wb_detalleabitanteadministraText7">
         <div><span style="color:#000000;font-family:Arial;font-size:13px;">No.: </span></div>
         <input type="text" id="rmb_est_nom" name="rmb_est_nom" value="" class="input_veh">
      </div>
      <div class="wb_detalleabitanteadministraText7">
         <div><span style="color:#000000;font-family:Arial;font-size:13px;text-align:left">Tipo: </span></div>
         <?php echo TipoInmueble(); ?>
      </div>
      <div class="wb_detalleabitanteadministraText7">
         <div><span style="color:#000000;font-family:Arial;font-size:13px;">Área Total: </span></div>
         <input type="text" id="rmb_aptos_area" name="rmb_aptos_area" value="" class="input_veh">
      </div>
      <div class="wb_detalleabitanteadministraText7">
         <div><span style="color:#000000;font-family:Arial;font-size:13px;">Área Privada: </span></div>
         <input type="text" id="rmb_aptos_priv" name="rmb_aptos_priv" value="" class="input_veh">
      </div>
      <div class="wb_detalleabitanteadministraText7">
         <div><span style="color:#000000;font-family:Arial;font-size:13px;">Baños: </span></div>
         <input type="text" id="rmb_aptos_banos" name="rmb_aptos_banos" value="" class="input_veh">
      </div>
      <div class="wb_detalleabitanteadministraText7">
         <div><span style="color:#000000;font-family:Arial;font-size:13px;">Cocinas: </span></div>
         <input type="text" id="rmb_aptos_coc" name="rmb_aptos_coc" value="" class="input_veh">
      </div>
      <div class="wb_detalleabitanteadministraText7">
         <div><span style="color:#000000;font-family:Arial;font-size:13px;">Habitaciones: </span></div>
         <input type="text" id="rmb_aptos_hab" name="rmb_aptos_hab" value="" class="input_veh">
      </div>
      <div class="wb_detalleabitanteadministraText7">
         <div><span style="color:#000000;font-family:Arial;font-size:13px;">Balcones: </span></div>
         <input type="text" id="rmb_aptos_balc" name="rmb_aptos_balc" value="" class="input_veh">
      </div>
      <div class="wb_detalleabitanteadministraText7">
         <div><span style="color:#000000;font-family:Arial;font-size:13px;text-align:left">Estado: </span></div>
         <?php echo Estados("", 3); ?>
      </div>
      <div class="wb_detalleabitanteadministraText7">
         <div><span style="color:#000000;font-family:Arial;font-size:13px;">Observación: </span></div>
         <textarea name="rmb_aptos_obs" id="rmb_aptos_obs" cols="28" rows="5"class="input_veh"></textarea>
      </div>
      <div>
         <input type="button" id="agregar_inmueble" name="agregar_inmueble" value="Agregar" class="perfiladministracionButton6">
      </div>
      <input id="rmb_residente_id" type="hidden" name="rmb_residente_id" value="<?php echo $id_usu; ?>">
   </body>
</html>