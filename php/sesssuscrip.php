<?php session_start();
require_once ("conexion/conexion.php");
//////////////////////////////////////////////////////////////////////////////////////
// Aplicación PHP usando Bootstrap, jquery, HTML5 y CSS - PH                        //
// Copyright 2014 Wilson Giovanny Velandia Barreto 3204274564 - willyv78@gmail.com  //
//////////////////////////////////////////////////////////////////////////////////////
$LibID = $_POST['LibID'];
$_SESSION['LibID'] = $LibID;
$con=conexion();

$user=$_SESSION['UsuID'];
$libro=$_SESSION['LibID'];
$session_id = session_id();

$val = "SELECT id_session FROM users WHERE id = ".$user;
$res_val = mysql_query($val, $con);
if($res_val){
	if(mysql_num_rows($res_val) > 0){
		$row_val = mysql_fetch_array($res_val);
		if($row_val[0] != $session_id){
			echo "";
			session_destroy();
			}
		else{echo $session_id;}
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