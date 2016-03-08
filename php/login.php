<?php session_start();
require_once ("../conexion/conexion.php");
//////////////////////////////////////////////////////////////////////////////////////
// Aplicación javascript usando jquery - Juego Crucigrama                           //
// Copyright 2014 Wilson Giovanny Velandia Barreto 3204274564 - willyv78@gmail.com  //
//////////////////////////////////////////////////////////////////////////////////////
$Email = $_POST['email'];
$Pass = $_POST['pass'];//md5()
$session_id = session_id();

$val = "SELECT rmb_residente_id, rmb_perf_id, rmb_est_id, rmb_residente_nom FROM rmb_residente WHERE rmb_residente_email = '$Email' AND rmb_residente_pass = '$Pass'";
$res_val = mysql_query($val, conexion());
if($res_val){
	if(mysql_num_rows($res_val) > 0){
		$row_val = mysql_fetch_array($res_val);
		$_SESSION['UsuID'] = $row_val[0];
		$_SESSION['PerfID'] = $row_val[1];
		$_SESSION['EstID'] = $row_val[2];
		$_SESSION['UsuNom'] = $row_val[3];
		$_SESSION['UsuEmail'] = $Email;
		$datos = $row_val[0].",".$row_val[1].",".$row_val[2].",".$row_val[3];
		echo $datos;
		}
	else{
		echo "";
		session_destroy();
		}
	}
else{
	echo "";
	session_destroy();
	}
?>