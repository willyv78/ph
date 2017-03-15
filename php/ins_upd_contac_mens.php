<?php session_start();
require ("../conexion/conexion.php");
require_once ("../php/funciones.php");
//////////////////////////////////////////////////////////////////////////////////////
// Aplicación PHP usando Bootstrap, jquery, HTML5 y CSS - PH                        //
// Copyright 2014 Wilson Giovanny Velandia Barreto 3204274564 - willyv78@gmail.com  //
//////////////////////////////////////////////////////////////////////////////////////
$tabla = "rmb_mens";
if(isset($_POST['id_upd'])){
	$sq = 0;
	$campos = "";
	foreach($_POST as $key=>$value){
		if($key <> 'id_upd'){
			if($sq == 0){$campos .= $key."='".mysql_escape_string($value)."'";}
			else{$campos .= ", ".$key."='".mysql_escape_string($value)."'";}
		   	$sq += 1;
		}
	}
	$campos .= ", rmb_mens_fenv = NOW(), rmb_est_id = 5, rmb_mens_pad = 0";
	$sql_upd = "UPDATE ".$tabla." SET ".$campos." WHERE ".$tabla."_id = ".$_POST['id_upd']."";
	$res_upd = mysql_query($sql_upd, conexion());
	if($res_upd){
	    echo $_POST['id_upd'];
	}
}
else if(isset($_POST['id_sup'])){
	$sql_borrar = "DELETE FROM $tabla WHERE ".$tabla."_id = ".$_POST['id_sup']."";
	$res_borrar = mysql_query($sql_borrar, conexion());
	if($res_borrar){
		echo "Se borro el registro";
	}
}
else{
	$nex_id = NextID('rmb_admon', $tabla);
	$sq = 0;
	$campo = "";
	$valor = "";
	foreach($_POST as $key=>$value){
		if($sq == 0){
			$campo .= $key;
			$valor .= "'".mysql_escape_string($value)."'";
		}
		else{
			$campo .= ",".$key;
			$valor .= ",'".mysql_escape_string($value)."'";
		}
		$sq += 1;
	}
	$campo .= ", rmb_mens_fenv, rmb_est_id, rmb_mens_pad";
	$valor .= ", NOW(), 5, 0";

	$sql_beg = "BEGIN;";
	$sql_ins = "INSERT INTO ".$tabla." (".$campo.") VALUES (".$valor.");";
	$sql_det = "INSERT INTO rmb_mens_dest (rmb_mens_id, rmb_residente_id, rmb_mens_dest_tipo) VALUES ($nex_id, ".$_SESSION['UsuID'].", 'de');";
	$sql_det_2 = "INSERT INTO rmb_mens_dest (rmb_mens_id, rmb_residente_id, rmb_mens_dest_tipo) VALUES ($nex_id, 27, 'para');";
	$res_beg = mysql_query($sql_beg, conexion());
	$res_ins = mysql_query($sql_ins, conexion());
	$res_det = mysql_query($sql_det, conexion());
	$res_det_2 = mysql_query($sql_det_2, conexion());
	if(($res_beg) && ($res_ins) && ($res_det) && ($res_det_2)){
		$sql_com = "COMMIT;";
		$res_com = mysql_query($sql_com, conexion());
		echo $nex_id;
	}
	else{
		$sql_rol = "ROLLBACK;";
		$res_rol = mysql_query($sql_rol, conexion());
	}
}
?>