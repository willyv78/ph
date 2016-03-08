<?php session_start();
require_once ("../conexion/conexion.php");
require_once ("../php/funciones.php");
//////////////////////////////////////////////////////////////////////////////////////
// Aplicación javascript usando jquery - Juego Crucigrama                           //
// Copyright 2014 Wilson Giovanny Velandia Barreto 3204274564 - willyv78@gmail.com  //
//////////////////////////////////////////////////////////////////////////////////////
$UsuID = $_SESSION['UsuID'];
$res_val = Facturas_Usu($UsuID);
$datos = "";
$table = "";
$table .= '
<div id="content_res">
    <p id="titulo">TESORERIA</p>
    <p id="intro">
        <span id="textspan">Aquí encontrará los estados de cuenta de su apartamento, los recibos de pago de administración y los comprobantes respectivos. </span><br />
    </p>';
// Tabla facturas Residente
$table .= "<table class='tabla_tes'>";
$table .= "<tr>";
$table .= "
    <td style='background-color:#008000;border:1px #C0C0C0 solid;text-align:center;vertical-align:middle;width:100px;height:30px;'>
        <div>
           <span style='color:#FFFFFF;font-family:Arial;font-size:13px;'>No.</span>
        </div>
    </td>
    <td style='background-color:#008000;border:1px #C0C0C0 solid;text-align:center;vertical-align:middle;width:300px;height:30px;'>
        <div>
           <span style='color:#FFFFFF;font-family:Arial;font-size:13px;'>Fecha Limite Pago</span>
        </div>
    </td>
    <td style='background-color:#008000;border:1px #C0C0C0 solid;text-align:center;vertical-align:middle;width:200px;height:30px;'>
        <div>
           <span style='color:#FFFFFF;font-family:Arial;font-size:13px;'>Estado</span>
        </div>
    </td>
    <td style='background-color:#008000;border:1px #C0C0C0 solid;text-align:center;vertical-align:middle;width:200px;height:30px;'>
        <div>
           <span style='color:#FFFFFF;font-family:Arial;font-size:13px;'>Acción</span>
        </div>
    </td>";
if($res_val){
    if(mysql_num_rows($res_val) > 0){
        // Titulo Tabla Estado Propietario
        $table .= "</tr>";
        for($i=0; $i<mysql_num_rows($res_val); $i++){
            list($n[$i], $valor[$i], $estado[$i], $fecha[$i]) = mysql_fetch_array($res_val);
            $perfil = PerfilId($n[$i]);
            $table .= "
                <tr>
                    <td style='background-color:transparent;border:1px #C0C0C0 solid;text-align:center;vertical-align:middle;width:20px;height:25px;'>
                        <div>
                           <span style='color:#000000;font-family:Arial;font-size:13px;'>".$n[$i]."</span>
                        </div>
                    </td>
                    <td style='background-color:transparent;border:1px #C0C0C0 solid;text-align:center;vertical-align:middle;width:200px;height:25px;'>
                        <div>
                           <span style='color:#000000;font-family:Arial;font-size:13px;'>".$fecha[$i]."</span>
                        </div>
                    </td>
                    <td style='background-color:transparent;border:1px #C0C0C0 solid;text-align:center;vertical-align:middle;width:200px;height:25px;'>
                        <div>
                           <span style='color:#000000;font-family:Arial;font-size:13px;'>".$estado[$i]."</span>
                        </div>
                    </td>
                    <td class='ver_factura' name='".$n[$i]."' style='background-color:transparent; border:1px #C0C0C0 solid; text-align:center; vertical-align:middle; height:25px; font-family:Arial; font-size:13px; cursor:pointer;'>
                        <span style='color:#32CD32;font-family:Arial;font-size:13px;'>VER</span> 
                    </td>                 
                </tr>";
        }
    }
    else{
        $table .= "<tr><td class='datos-tabla' colspan='4'>No hay registros</span></td></tr>";
    }
}
else{
    $table .= "<tr><td class='datos-tabla' colspan='4'>Error en la consulta</span></td></tr>";
}
$table .= "</table>";
$table .= '<div id="espacio" class="clearfix"></div>';
$table .= '</div>';
echo $table;
?>
<script>mostrarFactura();</script>