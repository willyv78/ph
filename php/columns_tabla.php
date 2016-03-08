<?php session_start();
require_once ("../conexion/conexion.php");
require_once ("../php/funciones.php");
//////////////////////////////////////////////////////////////////////////////////////
// Aplicación javascript usando jquery - Juego Crucigrama                           //
// Copyright 2014 Wilson Giovanny Velandia Barreto 3204274564 - willyv78@gmail.com  //
//////////////////////////////////////////////////////////////////////////////////////
$Tabla = $_POST['tabla'];
$res_val = ColumnasTabla($Tabla);
$datos = "";
if($res_val){
	if(mysql_num_rows($res_val) > 0){
		for($i=0; $i<mysql_num_rows($res_val); $i++){
			list($nombre[$i], $titulo[$i]) = mysql_fetch_array($res_val);
			if($i == 0){
				$datos .= $nombre[$i].",".$titulo[$i];
			}
			else{
				$datos .= "|".$nombre[$i].",".$titulo[$i];
			}
		}
		echo $datos;
	}
	else{
		echo "";
	}
}
else{
	echo "";
}
?>