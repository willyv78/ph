<?php session_start();
require ("../conexion/conexion.php");
require_once ("../php/funciones.php");
//////////////////////////////////////////////////////////////////////////////////////
// Aplicación PHP usando Bootstrap, jquery, HTML5 y CSS - PH                        //
// Copyright 2014 Wilson Giovanny Velandia Barreto 3204274564 - willyv78@gmail.com  //
//////////////////////////////////////////////////////////////////////////////////////
$tabla = "rmb_residente";
$path = "../images/residentes/";
if(isset($_POST['id_upd'])){
	$sql_upd = "UPDATE rmb_residente SET rmb_carg_id = ".$_POST['rmb_carg_id'].", rmb_residente_fecha = NOW(), rmb_residente_user = ".$_SESSION['UsuID']." WHERE rmb_residente_id = ".$_POST['id_upd'];
	$res_upd = mysql_query($sql_upd, conexion());
	if($res_upd){
	    echo $_POST['id_upd'];
	}
}
else if(isset($_POST['id_sup'])){
	$sql_borrar = "UPDATE rmb_residente SET rmb_carg_id = 2, rmb_residente_fecha = NOW(), rmb_residente_user = ".$_SESSION['UsuID']." WHERE rmb_residente_id = ".$_POST['id_sup'];
	$res_borrar = mysql_query($sql_borrar, conexion());
	if($res_borrar){
		echo "Se borro el registro";
	}
}
else{
	$sql_ins = "UPDATE rmb_residente SET rmb_carg_id = ".$_POST['rmb_carg_id'].", rmb_residente_fecha = NOW(), rmb_residente_user = ".$_SESSION['UsuID']." WHERE rmb_residente_id = ".$_POST['rmb_residente_id'];
	$res_ins = mysql_query($sql_ins, conexion());
	if($res_ins){
		echo $_POST['rmb_residente_id'];
	}
}	
?>