<?php session_start();
require ("../conexion/conexion.php");
require_once ("../php/funciones.php");
//////////////////////////////////////////////////////////////////////////////////////
// Aplicación PHP usando Bootstrap, jquery, HTML5 y CSS - PH                        //
// Copyright 2014 Wilson Giovanny Velandia Barreto 3204274564 - willyv78@gmail.com  //
//////////////////////////////////////////////////////////////////////////////////////

$tabla = $_POST['tabla'];
if(isset($_POST['id_upd'])){
	$sq = 0;
	$campos = "";
	foreach($_POST as $key=>$value){
		if(($key != 'id_upd')&&($key != 'tabla')){
			if($sq == 0){$campos .= $key."='".mysql_escape_string($value)."'";}
			else{$campos .= ", ".$key."='".mysql_escape_string($value)."'";}
			$sq += 1;
		}
	}
	//comprobamos que sea una petición ajax
	if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
	    //comprobamos si existe un directorio para subir el archivo
	    //si no es así, lo creamos
	    if(!is_dir("../images/archivos/"))
		    mkdir("../images/archivos/", 0777);
	    //obtenemos el archivo a subir
	    $file = $_FILES['rmb_calendario_img']['name'];
	    if($file <> ''){
	    	$campos .= ", rmb_calendario_img = '../images/archivos/".$file."'";
	    }
	}
	else{throw new Exception("Error Processing Request", 1);}
	if($tabla == 'rmb_calendario'){$campos .= ", rmb_calendario_fecha = NOW(), rmb_calendario_user = ".$_SESSION['UsuID']."";}
	$sql_upd = "UPDATE ".$tabla." SET ".$campos." WHERE ".$tabla."_id = ".$_POST['id_upd']."";
	$res_upd = mysql_query($sql_upd, conexion());
	if($res_upd){
	    //comprobamos si el archivo ha subido
	    if($file <> ''){
		    if ($file && move_uploaded_file($_FILES['rmb_calendario_img']['tmp_name'],"../images/archivos/".$file)){
		       sleep(3);//retrasamos la petición 3 segundos
		       echo "Registro actualizado correctamente ";
		    }
		}
		else{echo "Registro actualizado correctamente ";}
	}
	else{echo "update " . $sql_upd;}
}
else if(isset($_POST['id_sup'])){
	$tabla = $_POST['tabla'];
	$sql_borrar = "DELETE FROM $tabla WHERE ".$tabla."_id = ".$_POST['id_sup']."";
	$res_borrar = mysql_query($sql_borrar, conexion());
	if($res_borrar){echo "Se borro el registro";}
	}
else{
	$sq = 0;
	$campo = "";
	$valor = "";
	foreach($_POST as $key=>$value){
		if(($key != 'ins')&&($key != 'tabla')){
			if($sq == 0){$campo .= $key;$valor .= "'".mysql_escape_string($value)."'";}
			else{$campo .= ",".$key;$valor .= ",'".mysql_escape_string($value)."'";}			
			$sq += 1;
		}
	}
	//comprobamos que sea una petición ajax
	if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
	    //comprobamos si existe un directorio para subir el archivo
	    //si no es así, lo creamos
	    if(!is_dir("../images/archivos/"))
		    mkdir("../images/archivos/", 0777);
	    //obtenemos el archivo a subir
	    $file = $_FILES['rmb_calendario_img']['name'];
	    if($file <> ''){
		    $campo .= ", rmb_calendario_img";
		    $valor .= ", '../images/archivos/".$file."'";
		}
	}
	else{throw new Exception("Error Processing Request", 1);}
	if($tabla == 'rmb_calendario'){$campo .= ", rmb_calendario_fecha, rmb_calendario_user";$valor .= ", NOW(), ".$_SESSION['UsuID']."";}
	$sql_ins = "INSERT INTO ".$tabla." (".$campo.") VALUES (".$valor.")";
	$res_ins = mysql_query($sql_ins, conexion());
	if($res_ins){echo "Registro ingresado correctamente";}
	else{echo "insert" . $sql_ins;}
	}
	
?>