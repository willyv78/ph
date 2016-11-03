<?php session_start();
require_once ("../conexion/conexion.php");
require_once ("../php/funciones.php");
//////////////////////////////////////////////////////////////////////////////////////
// Aplicación PHP usando Bootstrap, jquery, HTML5 y CSS - PH                        //
// Copyright 2014 Wilson Giovanny Velandia Barreto 3204274564 - willyv78@gmail.com  //
//////////////////////////////////////////////////////////////////////////////////////
if(isset($_GET['perfil'])){$Perfil = $_GET['perfil'];}
else{$Perfil = "";}

$res_val = UsuariosPerfil($Perfil);
$datos = "";
$table = "";
$table .= "<table width='100%'>";
if($res_val){
	if(mysql_num_rows($res_val) > 0){
		$table .= "<tr>";
		$table .= "<td class='titulo-tabla'>ID</td>";
		$table .= "<td class='titulo-tabla'>Nombres / Apellidos</td>";
		$table .= "<td class='titulo-tabla'>Email</td>";
		$table .= "<td class='titulo-tabla'>Acciones</td>";
		$table .= "</tr>";
		for($i=0; $i<mysql_num_rows($res_val); $i++){
			list($id[$i], $nombre[$i], $apellido[$i], $email[$i]) = mysql_fetch_array($res_val);
			$table .= "<tr><td class='datos-tabla'>".$id[$i]."</td><td class='datos-tabla'>".$nombre[$i]." ".$apellido[$i]."</td><td class='datos-tabla'>".$email[$i]."</td><td style='text-align:center;'><span class='acciones_u' id='".$id[$i]."'>Editar</span><span class='acciones_u' id='".$id[$i]."'>Borrar</span></td></tr>";
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