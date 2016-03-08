<?php session_start();
require ("../conexion/conexion.php");
require_once ("../php/funciones.php");
//////////////////////////////////////////////////////////////////////////////////////
// Aplicación javascript usando jquery - Juego Crucigrama                           //
// Copyright 2014 Wilson Giovanny Velandia Barreto 3204274564 - willyv78@gmail.com  //
//////////////////////////////////////////////////////////////////////////////////////

$tabla = $_POST['tabla'];
if(isset($_POST['id_upd'])){
	$sq = 0;
	$campos = "";
	foreach($_POST as $key=>$value){
		if(($key != 'id_upd')&&($key != 'tabla')&&($key != 'concept')){
			if($sq == 0){$campos .= $key."='".mysql_escape_string($value)."'";}
			else{$campos .= ", ".$key."='".mysql_escape_string($value)."'";}
			$sq += 1;
		}
	}
	$next_fact = $_POST['id_upd'];
	$sql_1upd = "BEGIN;";
	$sql_2upd = "UPDATE ".$tabla." SET ".$campos." WHERE ".$tabla."_id = ".$_POST['id_upd'].";";
	$sql_3upd = "DELETE FROM rmb_tes_concep WHERE rmb_tesoreria_id = $next_fact;";
	if(isset($_POST['concept'])){
		$conc = explode("|", $_POST['concept']);		
		for ($i=0; $i < count($conc); $i++) {
			$concep = explode(",", $conc[$i]);
			$sql_upd[$i] = "INSERT INTO rmb_tes_concep (rmb_tesoreria_id, rmb_tpago_id, rmb_tes_concep_cant, rmb_tes_concep_val) VALUES ($next_fact, ".$concep[1].", ".$concep[0].", ".$concep[2].")";
		}
	}
	$res_upd = mysql_query($sql_1upd, conexion());
	$res_upd2 = mysql_query($sql_2upd, conexion());
	$res_upd3 = mysql_query($sql_3upd, conexion());
	$sw = 0;
	for ($x=0; $x < $i; $x++) {
		$res_upd3 = mysql_query($sql_upd[$x], conexion());
		if($res_upd3){$sw += 1;}
	}
	if(($res_upd)&&($res_upd2)&&($res_upd3)&&($sw == $x)){
		$sql_ok = "COMMIT;";
		$res_ok = mysql_query($sql_ok, conexion());
		echo "Registro actualizado correctamente";
	}
	else{
		echo "1 = ".$res_upd." 2 = ".$res_upd2." sw = ".$sw." x = ".$x;
		$sql_ok = "ROLLBACK;";
		$res_ok = mysql_query($sql_ok, conexion());
	}
}
else if(isset($_POST['id_sup'])){
	$tabla = $_POST['tabla'];	
	$next_fact = $_POST['id_sup'];
	$sql_borrar = "DELETE FROM $tabla WHERE ".$tabla."_id = $next_fact;";
	$sql_borrar2 = "DELETE FROM rmb_tes_concep WHERE rmb_tesoreria_id = $next_fact;";
	$res_borrar = mysql_query($sql_borrar, conexion());
	$res_borrar2 = mysql_query($sql_borrar2, conexion());
	if(($res_borrar)&&($res_borrar2)){echo $sql_borrar2." Se borro el registro";}
}
else if(isset($_POST['ins'])){
	$sq = 0;
	$campo = "";
	$valor = "";
	$sql_concep = "";
	foreach($_POST as $key=>$value){
		if(($key != 'ins')&&($key != 'tabla')&&($key != 'concept')){
			if($sq == 0){$campo .= $key;$valor .= "'".mysql_escape_string($value)."'";}
			else{$campo .= ", ".$key;$valor .= ", '".mysql_escape_string($value)."'";}		
			$sq += 1;

		}
	}
	$next_fact = NextID('rmb_admon', $tabla);
	$sql_1concep = "BEGIN;";
	$sql_2concep = "INSERT INTO ".$tabla." (".$campo.", rmb_tesoreria_fecha, rmb_tesoreria_user) VALUES (".$valor.", NOW(), ".$_SESSION['UsuID'].");";
	$sql_3concep = "DELETE FROM rmb_tes_concep WHERE rmb_tesoreria_id = $next_fact;";
	if(isset($_POST['concept'])){
		$conc = explode("|", $_POST['concept']);		
		for ($i=0; $i < count($conc); $i++) {
			$concep = explode(",", $conc[$i]);
			$sql_concep[$i] = "INSERT INTO rmb_tes_concep (rmb_tesoreria_id, rmb_tpago_id, rmb_tes_concep_cant, rmb_tes_concep_val) VALUES ($next_fact, ".$concep[1].", ".$concep[0].", ".$concep[2].")";
		}
	}
	$res_concep1 = mysql_query($sql_1concep, conexion());
	$res_concep2 = mysql_query($sql_2concep, conexion());
	$res_concep3 = mysql_query($sql_3concep, conexion());
	$sw = 0;
	for ($x=0; $x < $i; $x++) {
		$res_concep3 = mysql_query($sql_concep[$x], conexion());
		if($res_concep3){$sw += 1;}
	}
	if(($res_concep1)&&($res_concep2)&&($res_concep3)&&($sw == $x)){
		$sql_ok = "COMMIT;";
		$res_ok = mysql_query($sql_ok, conexion());
		echo "Registro actualizado correctamente";
	}
	else{
		$sql_ok = "ROLLBACK;";
		$res_ok = mysql_query($sql_ok, conexion());
		echo "1 = ".$res_concep1." 2 = ".$res_concep2." sw = ".$sw." x = ".$x;
	}
}	
?>