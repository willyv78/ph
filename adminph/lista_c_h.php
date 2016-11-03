<?php session_start();
require_once ("../conexion/conexion.php");
require_once ("../php/funciones.php");
//////////////////////////////////////////////////////////////////////////////////////
// Aplicación PHP usando Bootstrap, jquery, HTML5 y CSS - PH                        //
// Copyright 2014 Wilson Giovanny Velandia Barreto 3204274564 - willyv78@gmail.com  //
//////////////////////////////////////////////////////////////////////////////////////
$id_usu = $_GET['id_usu'];
$res_val = Facturas_Usu($id_usu);
$datos = "";
$table = "";
// Tabla Estado Propietario
$table .= "<table style='width:90%;margin:auto;z-index:103;' id='administracionTable3'>";
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
			$perfil = PerfilId($id[$i]);
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
					<td id='lista_historial_facturas' name='".$n[$i]."' style='background-color:transparent; border:1px #C0C0C0 solid; text-align:center; vertical-align:middle; height:25px; font-family:Arial; font-size:13px; cursor:pointer;'>
						<span style='color:#32CD32;font-family:Arial;font-size:13px;'>Editar</span>  
						<span style='color:#DC143C;font-family:Arial;font-size:13px;'>Borrar</span>
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
$table .= "
	<tr>
		<td colspan='4' align='center'>
			<input id='id_usu' type='hidden' value='".$_GET['id_usu']."'>
			<span class='new_reg_c_u'>Nuevo Registro</span>
			<span class='new_reg_u'>Cancelar</span>
		</td>
	</tr>";
$table .= "</table>";
echo $table;
?>
<script type="text/javascript" src="../js/maestros.js"></script>