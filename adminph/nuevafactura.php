<?php session_start();
require_once ("../conexion/conexion.php");
require_once ("../php/funciones.php");
$id_usu = $_GET['id_usu'];
$query_sql = Vehiculos_Usu($id_usu);
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
      <link href="../css/Adminitracion.css" rel="stylesheet" type="text/css">
      <link href="../css/inicio.css" rel="stylesheet" type="text/css">
   </head>
   <body style="background-color: #FFFFFF;">
      <div id="wb_page1Shape1" style="left:0px; top:0px; width:521px; height:32px; z-index:3;background-image:url('../images/img0007.png'); margin-left:0px">
         <span style="color:#FFFFFF;font-family:Arial;font-size:16px;">Detalle Vehiculos</span>
      </div>
      <!-- Tabla con la lista de vehiculos del usuario ingresados -->
      <table style="left:5px; width:489px; z-index:13;" id="detalleabitanteadministraTable2" align="center"><?php 
      if(!$query_sql){?>
         <tr><td colspan="4"><span style="color:#808080;font-family:Verdana;font-size:16px;">No hay vehículos registrados para el usuario.</span></td></tr>
      <?php }
      else{?>
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
                  <span style="color:#FFFFFF; font-family:Arial; font-size:13px;">Marca</span>
               </div>
            </td>
            <td style="background-color:#008000; border:1px #C0C0C0 solid; text-align:center; vertical-align:middle; width:140px; height:34px;">
               <div>
                  <span style="color:#FFFFFF; font-family:Arial; font-size:13px;">Placa</span>
               </div>
            </td>
            <td style="background-color:#008000;border:1px #C0C0C0 solid;text-align:center;vertical-align:middle;height:34px;">
               <div>
                  <span style="color:#FFFFFF; font-family:Arial; font-size:13px;">Acción</span>
               </div>
            </td>
         </tr>
         <?php 
         while($row_sql = mysql_fetch_array($query_sql)){ ?>
            <tr>
               <td style="background-color:transparent; border:1px #C0C0C0 solid; text-align:center; vertical-align:middle;">
                  <div>
                     <span style="color:#000000; font-family:Arial; font-size:13px;"><?php echo $row_sql[1];?></span>
                  </div>
               </td>
               <td style="background-color:transparent; border:1px #C0C0C0 solid; text-align:center; vertical-align:middle;">
                  <div>
                     <span style="color:#000000; font-family:Arial; font-size:13px;"><?php echo $row_sql[3];?></span>
                  </div>
               </td>
               <td style="background-color:transparent; border:1px #C0C0C0 solid; text-align:center; vertical-align:middle;">
                  <div>
                     <span style="color:#000000;font-family:Arial;font-size:13px;"><?php echo $row_sql[2];?></span>
                  </div>
               </td>
               <td style="background-color:transparent; border:1px #C0C0C0 solid; text-align:center; vertical-align:middle;">
                  <div>
                     <span id="<?php echo $row_sql[0];?>" style="color:#DC143C; font-family:Arial; font-size:13px;cursor:pointer;" class="editar_veh">Borrar</span>
                     <!-- <span style="color:#32CD32; font-family:Arial; font-size:13px;cursor:pointer;" class="editar_veh">Editar</span> -->
                  </div>
               </td>
            </tr>
      <?php }
      }?>
      </table>
      <!-- aqui empieza la informacion para ingresar nuevos vehiculos -->
      <div id="wb_detalleabitanteadministraText6" style="left:15px; width:156px; z-index:15; text-align:left; padding:5px;">
         <span style="color:#808080;font-family:Verdana;font-size:16px;">Añadir Vehiculo</span>
      </div>
      <div class="wb_detalleabitanteadministraText7">
         <div><span style="color:#000000;font-family:Arial;font-size:13px;">Marca: </span></div>
         <input type="text" id="detalleabitanteadministraEditbox3" style="left:12px; line-height:22px; z-index:17;" name="detalleabitanteadministraEditbox3" value="" class="input_veh">
      </div>
      <div class="wb_detalleabitanteadministraText7">
         <div><span style="color:#000000;font-family:Arial;font-size:13px;">Placa: </span></div>
         <input type="text" id="detalleabitanteadministraEditbox4" name="detalleabitanteadministraEditbox4" value="" class="input_veh">
      </div>
      <div class="wb_detalleabitanteadministraText7">
         <div><span style="color:#000000;font-family:Arial;font-size:13px;text-align:left">Tipo: </span></div>
         <?php echo TipoVehiculo(); ?>
      </div>
      <div class="wb_detalleabitanteadministraText7">
         <div><span style="color:#000000;font-family:Arial;font-size:13px;">No. Parqueadero: </span></div>
         <input type="text" id="rmb_veh_nparq" name="rmb_veh_nparq" value="" class="input_veh">
      </div>
      <div class="wb_detalleabitanteadministraText7">
         <div><span style="color:#000000;font-family:Arial;font-size:13px;">Observación: </span></div>
         <textarea name="rmb_veh_obs" id="rmb_veh_obs" cols="28" rows="5"class="input_veh"></textarea>
      </div>
      <div>
         <input type="button" id="perfiladministracionButton6" name="" value="Agregar" class="perfiladministracionButton6">
      </div>
      <input id="rmb_residente_id" type="hidden" name="rmb_residente_id" value="<?php echo $id_usu; ?>">
   </body>
</html>