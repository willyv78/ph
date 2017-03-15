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
	$sq = 0;
	$campos = "";
	foreach($_POST as $key=>$value){
		if(($key != 'id_upd')&&($key != 'rmb_residente_foto')){
			if($sq == 0){$campos .= $key."='".mysql_escape_string($value)."'";}
			else{$campos .= ", ".$key."='".mysql_escape_string($value)."'";}
			$sq += 1;
		}
	}
	//comprobamos que sea una petición ajax
	if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
		//obtenemos el archivo de la foto a subir.
		$file = $_FILES['rmb_residente_foto']['name'];
		if($file){
		    $nom_id = "quienes_".$_POST['id_upd'];
		    $extension = pathinfo($file, PATHINFO_EXTENSION);
		    $nom_file = $nom_id.".".$extension;
		    //comprobamos si existe un directorio para subir el archivo si no es así, lo creamos
		    if(!is_dir($path)){mkdir($path, 0777);}
		    //si existe el archivo lo eliminamos
		    if (file_exists($path.$nom_file)) {unlink($path.$nom_file);}                         
		    //comprobamos si el archivo ha subido
		    if ($file && move_uploaded_file($_FILES['rmb_residente_foto']['tmp_name'], $path.$nom_file)){
		    	$campos .= ", rmb_residente_foto = '".$path.$nom_file."'";
		    }
		}
	}
	$campos .= ", rmb_est_id = 23, rmb_residente_pers = 1, rmb_residente_fecha = NOW(), rmb_residente_user = ".$_SESSION['UsuID']."";
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
		$nom_id = "quienes_".$_POST['id_sup'];
		foreach (scandir($path) as $item) {
		    if ($item == '.' || $item == '..'){continue;}
		    else{
		        $nom_arch = explode(".", $item);
		        if($nom_arch[0] == $nom_id){unlink($path.$item);}
		    }       
		}
		echo "Se borro el registro";
	}
}
else{
	$nex_id = NextID('rmb_admon', $tabla);
	$sq = 0;
	$campo = "";
	$valor = "";
	foreach($_POST as $key=>$value){
		if($key <> 'rmb_residente_foto'){
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
	}
	//comprobamos que sea una petición ajax
	if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
		//obtenemos el archivo de la foto a subir.
		$file = $_FILES['rmb_residente_foto']['name'];
		if($file){
			$nom_id = "quienes_".$nex_id;
		    $extension = pathinfo($file, PATHINFO_EXTENSION);
		    $nom_file = $nom_id.".".$extension;
		    //comprobamos si existe un directorio para subir el archivo si no es así, lo creamos
		    if(!is_dir($path)){mkdir($path, 0777);}
		    //si existe el archivo lo eliminamos
		    if (file_exists($path.$nom_file)) {unlink($path.$nom_file);}                         
		    //comprobamos si el archivo ha subido
		    if ($file && move_uploaded_file($_FILES['rmb_residente_foto']['tmp_name'], $path.$nom_file)){
		    	$campo .= ", rmb_residente_foto";
		    	$valor .= ", '".$path.$nom_file."'";
		    }
		}
	}
	$campo .= ", rmb_est_id, rmb_residente_pers, rmb_residente_fecha, rmb_residente_user";
	$valor .= ", 23, 1, NOW(), ".$_SESSION['UsuID']."";
	$sql_ins = "INSERT INTO ".$tabla." (".$campo.") VALUES (".$valor.")";
	$res_ins = mysql_query($sql_ins, conexion());
	if($res_ins){
		echo $nex_id;
	}
}	
?>