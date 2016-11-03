<?php session_start();
require_once ("../conexion/conexion.php");
require_once ("../php/funciones.php");

$datos = Maestros();

if($datos){
    if(mysql_num_rows($datos) > 0){
        while($row_datos = mysql_fetch_array($datos)){
            echo '<div class="col-xs-6 col-sm-4 col-md-3 col-lg-2 btn-config" name="'.$row_datos[2].'">
                    <button class="btn btn-default btn-block col-xs-10 col-sm-10 col-md-10 col-lg-10">'.$row_datos[1].'</button>
                </div>';
        }     
    }
}?>
<script>cargaInicio();</script>