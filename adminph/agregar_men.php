<?php session_start();
require ("../conexion/conexion.php");
require_once ("../php/funciones.php");
//////////////////////////////////////////////////////////////////////////////////////
// Aplicación javascript usando jquery - Juego Crucigrama                           //
// Copyright 2014 Wilson Giovanny Velandia Barreto 3204274564 - willyv78@gmail.com  //
//////////////////////////////////////////////////////////////////////////////////////

$para = $_POST['para'];
$copia = $_POST['copia'];
$asunto = $_POST['asunto'];
$mensaje = $_POST['mensaje'];

$id_usu = $_SESSION['UsuID'];
$row_usu = ResidenteDatosId($id_usu);
$de = $row_usu[3];

if(isset($_POST['id_mens_b'])){
	$sql_ins = "DELETE FROM rmb_mens WHERE rmb_mens_id = ".$_POST['id_mens_b']."";
	$res_ins = mysql_query($sql_ins, conexion());
	if($res_ins){echo "Registro BORRADO correctamente";}
	else{echo "";}
}
elseif(isset($_POST['id_mens_u'])){
	$sql_ins = "UPDATE rmb_mens SET rmb_tveh_id = $tipo, rmb_veh_placa = '$placa', rmb_veh_marca = '$marca', rmb_veh_nparq = '$nparq', rmb_veh_obs = '$obs', rmb_residente_id = $id_usu, rmb_veh_fecha = NOW(), rmb_veh_user = ".$_SESSION['UsuID']." WHERE rmb_veh_id = ".$_POST['id_veh_u']."";
	$res_ins = mysql_query($sql_ins, conexion());
	if($res_ins){echo "Registro ACTUALIZADO correctamente";}
	else{echo "";}
}
else{
	//ini_set("SMTP","localhost");
	//ini_set('smtp_port',25);
	//ini_set('sendmail_from',''.$de.'');
	// Para enviar un correo HTML mail, la cabecera Content-type debe fijarse
	$cabeceras  = 'MIME-Version: 1.0' . "\r\n";
	$cabeceras .= 'Content-type: text/html; charset=utf-8' . "\r\n";

	// Cabeceras adicionales
	//$cabeceras .= 'To: Mary <mary@example.com>, Kelly <kelly@example.com>' . "\r\n";
	$cabeceras .= 'From: '. $de . "\r\n";
	$cabeceras .= 'Cc: '. $copia . "\r\n";
	$cabeceras .= 'Bcc: wilsonvelandia@editoreshache.com' . "\r\n";

	// Mail it
	//$env_email = ;

	if(mail($para, $asunto, $mensaje, $cabeceras)){
		$sql_ins = "INSERT INTO rmb_mens (rmb_residente_id, rmb_mens_de, rmb_mens_para, rmb_mens_cc, rmb_mens_asunto, rmb_mens_mens, rmb_mens_fenv, rmb_est_id, rmb_mens_tipo) VALUES (".$_SESSION['UsuID'].", '$de', '$para', '$copia', '$asunto', '$mensaje', NOW(), 5, 1)";
		$res_ins = mysql_query($sql_ins, conexion());
		if($res_ins){
			$des_para = explode(',', $para);
			$des_copia = explode(',', $copia);
			for ($i = 0; $i < count($des_para); $i++) { 
				$sql_ins = "INSERT INTO rmb_mens (rmb_residente_id, rmb_mens_de, rmb_mens_para, rmb_mens_cc, rmb_mens_asunto, rmb_mens_mens, rmb_mens_fenv, rmb_est_id, rmb_mens_tipo) VALUES (".$_SESSION['UsuID'].", '$de', '".$des_para[$i]."', '', '$asunto', '$mensaje', NOW(), 6, 2)";
				$res_ins = mysql_query($sql_ins, conexion());
			}
			for ($i = 0; $i < count($des_copia); $i++) { 
				$sql_ins = "INSERT INTO rmb_mens (rmb_residente_id, rmb_mens_de, rmb_mens_para, rmb_mens_cc, rmb_mens_asunto, rmb_mens_mens, rmb_mens_fenv, rmb_est_id, rmb_mens_tipo) VALUES (".$_SESSION['UsuID'].", '$de', '".$des_copia[$i]."', '', '$asunto', '$mensaje', NOW(), 6, 2)";
				$res_ins = mysql_query($sql_ins, conexion());
			}
			echo "Registro INGRESADO correctamente";
		}
		else{echo "";}
	}
	else{echo "";}
}

?>