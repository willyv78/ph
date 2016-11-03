<?php session_start();
require ("../conexion/conexion.php");
require_once ("../php/funciones.php");
//////////////////////////////////////////////////////////////////////////////////////
// Aplicación PHP usando Bootstrap, jquery, HTML5 y CSS - PH                        //
// Copyright 2014 Wilson Giovanny Velandia Barreto 3204274564 - willyv78@gmail.com  //
//////////////////////////////////////////////////////////////////////////////////////
$tabla = $_POST['tabla'];
$path = "../images/archivos/";
if(isset($_POST['id_sup'])){
	$sql_borrar = "DELETE FROM $tabla WHERE ".$tabla."_id = ".$_POST['id_sup']."";
	$res_borrar = mysql_query($sql_borrar, conexion());
	if($res_borrar){
		$nom_id = $_POST['id_sup'];
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
else if(isset($_POST['id_upd'])){
	$sq = 0;
	$campos = "";
	foreach($_POST as $key=>$value){
		if(($key != 'id_upd')&&($key != 'tabla')&&($key != 'id')&&($key != 'ins')&&($key != 'rmb_document_img')&&($key != 'campos')&&($key != 'requeridos')){
			if($sq == 0){$campos .= $key."='".mysql_escape_string($value)."'";}
			else{$campos .= ", ".$key."='".mysql_escape_string($value)."'";}
			$sq += 1;
		}
	}
	if($tabla == 'rmb_calendario'){
		$campos .= ", rmb_calendario_fecha = NOW(), rmb_calendario_user = ".$_SESSION['UsuID']."";
	}
	if($tabla == 'rmb_document'){	
		$nom_id = $_POST['id_upd'];
		foreach (scandir($path) as $item) {
		    if ($item == '.' || $item == '..'){continue;}
		    else{
				$nom_arch = explode(".", $item);
		    	if($nom_arch[0] == $nom_id){unlink($path.$item);}	    	
		    }	    
		}
		//comprobamos que sea una petición ajax
		if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest'){
		    //obtenemos el archivo a subir
		    $file = $_FILES['rmb_document_img']['name'];
		    $extension = pathinfo($file, PATHINFO_EXTENSION);
		    $nom_file = $_POST['id_upd'].".".$extension;
		    //comprobamos si existe un directorio para subir el archivo si no es así, lo creamos
		    if(!is_dir($path)){mkdir($path, 0777);}
		    //si existe el archivo lo eliminamos
		    if (file_exists($path.$nom_file)) {unlink($path.$nom_file);}		        	     
		    //comprobamos si el archivo ha subido
		    if ($file && move_uploaded_file($_FILES['rmb_document_img']['tmp_name'], $path.$nom_file)){		    	
		    	$campos .= ", rmb_document_img = '$path"."$nom_file'";
		    	echo "Documento cargado correctamente.\n";
		    }
		    else{echo "El Documento NO se cargo.\n";}
		}
		else{echo "El Documento NO se cargo.\n";}
	}
	$sql_upd = "UPDATE ".$tabla." SET ".$campos." WHERE ".$tabla."_id = ".$_POST['id_upd']."";
	$res_upd = mysql_query($sql_upd, conexion());
	if($res_upd){echo "Registro actualizado correctamente";}
	else{echo $sql_upd;}
}
else{
	$sq = 0;
	$campo = "";
	$valor = "";
	foreach($_POST as $key=>$value){
		if(($key != 'ins')&&($key != 'tabla')&&($key != 'id')&&($key != 'id_upd')&&($key != 'campos')&&($key != 'requeridos')){
			if($sq == 0){$campo .= $key;$valor .= "'".mysql_escape_string($value)."'";}
			else{$campo .= ",".$key;$valor .= ",'".mysql_escape_string($value)."'";}			
			$sq += 1;
		}
	}
	if($tabla == 'rmb_calendario'){$campo .= ", rmb_calendario_fecha, rmb_calendario_user";$valor .= ", NOW(), ".$_SESSION['UsuID']."";}

	if($tabla == 'rmb_document'){
		$nom_id = NextID('rmb_admon', $tabla);
		foreach (scandir($path) as $item) {
		    if ($item == '.' || $item == '..'){continue;}
		    else{
				$nom_arch = explode(".", $item);
		    	if($nom_arch[0] == $nom_id){unlink($path.$item);}	    	
		    }	    
		}
		//comprobamos que sea una petición ajax
		if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest'){
		    //obtenemos el archivo a subir
		    $file = $_FILES['rmb_document_img']['name'];
		    $extension = pathinfo($file, PATHINFO_EXTENSION);
		    $nom_file = $nom_id.".".$extension;
		    //comprobamos si existe un directorio para subir el archivo si no es así, lo creamos
		    if(!is_dir($path)){mkdir($path, 0777);}
		    //si existe el archivo lo eliminamos
		    if (file_exists($path.$nom_file)) {unlink($path.$nom_file);}		        	     
		    //comprobamos si el archivo ha subido
		    if ($file && move_uploaded_file($_FILES['rmb_document_img']['tmp_name'], $path.$nom_file)){		    	
		    	$campo .= ", rmb_document_img";$valor .= ", '$path"."$nom_file'";
		    	echo "Documento cargado correctamente.\n";
		    }
		    else{echo "El Documento NO se cargo.\n";}
		}
		else{echo "El Documento NO se cargo.\n";}
	}

	$sql_ins = "INSERT INTO ".$tabla." (".$campo.") VALUES (".$valor.")";
	$res_ins = mysql_query($sql_ins, conexion());
	if($res_ins){echo "Registro ingresado correctamente";}
	else{echo $sql_ins;}
}
?>