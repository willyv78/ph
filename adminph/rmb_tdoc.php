<?php session_start();
require_once ("../conexion/conexion.php");
require_once ("../php/funciones.php");
//////////////////////////////////////////////////////////////////////////////////////
// Aplicación javascript usando jquery - Juego Crucigrama                           //
// Copyright 2014 Wilson Giovanny Velandia Barreto 3204274564 - willyv78@gmail.com  //
//////////////////////////////////////////////////////////////////////////////////////
$Tabla = $_GET['tabla'];
$res_val = ColumnasTabla($Tabla);
$datos = "";
$table = "";
if($res_val){
	if(mysql_num_rows($res_val) > 0){
		$table .= "<table width='100%'><tr>";
		for($i=0; $i<mysql_num_rows($res_val); $i++){
			list($nombre[$i], $titulo[$i]) = mysql_fetch_array($res_val);
			$table .= "<td>".$titulo[$i]."</td>";
			if($i == 0){
				$datos .= $nombre[$i];
			}
			else{
				$datos .= ",".$nombre[$i];
			}
		}
		$table .= "</tr>";
		$res_dat = DatosTabla($Tabla, $datos);
		if($res_dat){
			if(mysql_num_rows($res_dat) > 0){
				$num_dat = explode(",", $datos);
				while($row_dat = mysql_fetch_array($res_dat)){
					$table .= "<tr>";
					for($i=0; $i<count($num_dat); $i++){
						$table .= "<td>".$row_dat[$i]."</td>";
					}
					$table .= "</tr>";
				}
			}
			else{$table .= "<tr><td colspan='".$num_dat."'>No hay datos en la tabla</td></tr>";}
		}
		echo $table;
	}
	else{
		echo "";
	}
}
else{
	echo "";
}
?>