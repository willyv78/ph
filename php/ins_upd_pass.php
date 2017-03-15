<?php session_start();
require ("../conexion/conexion.php");
require_once ("../php/funciones.php");
//////////////////////////////////////////////////////////////////////////////////////
// Aplicación PHP usando Bootstrap, jquery, HTML5 y CSS - PH                        //
// Copyright 2014 Wilson Giovanny Velandia Barreto 3204274564 - willyv78@gmail.com  //
//////////////////////////////////////////////////////////////////////////////////////
$tabla = "rmb_residente";
$user = $_SESSION['UsuID'];
$sql_upd = "UPDATE ".$tabla." SET ".$tabla."_pass = '".$_POST['confirm']."' WHERE ".$tabla."_id = ".$user." AND ".$tabla."_pass = '".$_POST['actual']."'";
$res_upd = mysql_query($sql_upd, conexion());
if($res_upd){
	if(mysql_affected_rows() > 0){echo $sql_upd;}
}
?>