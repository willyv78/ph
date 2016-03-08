<?php session_start();
require_once ("../conexion/conexion.php");
require_once ("../php/funciones.php");
//////////////////////////////////////////////////////////////////////////////////////
// Aplicación javascript usando jquery - Juego Crucigrama                           //
// Copyright 2014 Wilson Giovanny Velandia Barreto 3204274564 - willyv78@gmail.com  //
//////////////////////////////////////////////////////////////////////////////////////
$Orden = "";
$ASC = "";
if(isset($_GET['orden'])){$Orden = $_GET['orden'];}
if(isset($_GET['asc'])){$ASC = $_GET['asc'];}
$res_val = Propietarios($Orden, $ASC);
$datos = "";
$table = "";
// Tabla Estado Propietario
$table .= "<table style='width:90%;margin:auto;z-index:103;' id='administracionTable3'>";
if($res_val){
	if(mysql_num_rows($res_val) > 0){
		// Titulo Tabla Estado Propietario
		$table .= "<tr>";
		$table .= "
			<td style='background-color:#008000;border:1px #C0C0C0 solid;text-align:center;vertical-align:middle;width:20px;height:30px;'>
				<div>
				   <span style='color:#FFFFFF;font-family:Arial;font-size:13px;'>ID</span>
				</div>
			</td>
			<td style='background-color:#008000;border:1px #C0C0C0 solid;text-align:center;vertical-align:middle;width:200px;height:30px;'>
				<div>
				   <span style='color:#FFFFFF;font-family:Arial;font-size:13px;'>Nombre Propietario / Titular</span>
				</div>
			</td>
			<td style='background-color:#008000;border:1px #C0C0C0 solid;text-align:center;vertical-align:middle;width:200px;height:30px;'>
				<div>
				   <span style='color:#FFFFFF;font-family:Arial;font-size:13px;'>Email</span>
				</div>
			</td>
			<td style='background-color:#008000;border:1px #C0C0C0 solid;text-align:center;vertical-align:middle;width:112px;height:30px;'>
				<div>
				   <span style='color:#FFFFFF;font-family:Arial;font-size:13px;'>Perfil</span>
				</div>
			</td>
			<td style='background-color:#008000;border:1px #C0C0C0 solid;text-align:center;vertical-align:middle;width:100px;height:30px;'>
				<div>
				   <span style='color:#FFFFFF;font-family:Arial;font-size:13px;'>Historial Facturas</span>
				</div>
			</td>";
		$table .= "</tr>";
		for($i=0; $i<mysql_num_rows($res_val); $i++){
			list($id[$i], $nombre[$i], $apellido[$i], $email[$i]) = mysql_fetch_array($res_val);
			$perfil = PerfilId($id[$i]);
			$table .= "
				<tr>
					<td style='background-color:transparent;border:1px #C0C0C0 solid;text-align:center;vertical-align:middle;width:20px;height:25px;'>
                        <div>
                           <span style='color:#000000;font-family:Arial;font-size:13px;'>".$id[$i]."</span>
                        </div>
					</td>
					<td style='background-color:transparent;border:1px #C0C0C0 solid;text-align:center;vertical-align:middle;width:200px;height:25px;'>
                        <div>
                           <span style='color:#000000;font-family:Arial;font-size:13px;'>".$nombre[$i]." ".$apellido[$i]."</span>
                        </div>
					</td>
					<td style='background-color:transparent;border:1px #C0C0C0 solid;text-align:center;vertical-align:middle;width:200px;height:25px;'>
                        <div>
                           <span style='color:#000000;font-family:Arial;font-size:13px;'>".$email[$i]."</span>
                        </div>
					</td>
					<td style='background-color:transparent;border:1px #C0C0C0 solid;text-align:center;vertical-align:middle;width:60px;height:25px;'>
                        <div>
                        	<span style='color:#000000;font-family:Arial;font-size:13px;'>".$perfil."</span>
                        </div>
					</td>
					<td id='lista_historial_facturas' class='lista_historial_facturas' name='".$id[$i]."' style='background-color:transparent; border:1px #C0C0C0 solid; text-align:center; vertical-align:middle; height:25px; color:#32CD32; font-family:Arial; font-size:13px; cursor:pointer;'>Ver
					</td>                  
				</tr>";
		}
	}
	else{
		$table .= "<tr><td class='datos-tabla' colspan='5'>No hay registros</span></td></tr>";
	}
}
else{
	$table .= "<tr><td class='datos-tabla' colspan='5'>Error en la consulta</span></td></tr>";
}
$table .= "</table>";
echo $table;
?>
<script type="text/javascript" src="../js/maestros.js"></script>