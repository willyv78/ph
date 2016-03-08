<?php session_start();
require_once ("../conexion/conexion.php");
require_once ("../php/funciones.php");
//////////////////////////////////////////////////////////////////////////////////////
// Aplicación javascript usando jquery - Juego Crucigrama                           //
// Copyright 2014 Wilson Giovanny Velandia Barreto 3204274564 - willyv78@gmail.com  //
//////////////////////////////////////////////////////////////////////////////////////
$Doc = $_GET['doc'];
$res_val = Documentos($Doc);
$datos = "";
$table = "";
$table .= "<table width='100%'>";
if($res_val){
	if(mysql_num_rows($res_val) > 0){
		$table .= "<tr>";
		$table .= "<td class='titulo-tabla'>ID</td>";
		$table .= "<td class='titulo-tabla'>Nombre</td>";
		$table .= "<td class='titulo-tabla'>Fecha</td>";
		$table .= "<td class='titulo-tabla'>Acciones</td>";
		$table .= "</tr>";
		for($i=0; $i<mysql_num_rows($res_val); $i++){
			list($id[$i], $nombre[$i], $fecha[$i]) = mysql_fetch_array($res_val);
			$table .= "<tr><td class='datos-tabla'>".$id[$i]."</td><td class='datos-tabla'>".$nombre[$i]."</td><td class='datos-tabla'>".$fecha[$i]."</td><td><span class='acciones_u' id='".$id[$i]."'>Editar</span><span class='acciones_u' id='".$id[$i]."'>Borrar</span></td></tr>";
		}
	}
	else{
		$table .= "<tr><td class='datos-tabla' colspan='4'>No hay registros</span></td></tr>";
	}
}
else{
	$table .= "<tr><td class='datos-tabla' colspan='4'>Error en la consulta</span></td></tr>";
}
$table .= "<tr><td colspan='4' align='center'><span class='new_reg_u'>Nuevo Registro</span><span class='new_reg_u'>Cancelar</span></td></tr>";
$table .= "</table>";
echo $table;
?>
<script type="text/javascript" src="../js/maestros.js"></script>