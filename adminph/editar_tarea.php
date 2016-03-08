<?php session_start();
require ("../conexion/conexion.php");
//////////////////////////////////////////////////////////////////////////////////////
// Aplicación javascript usando jquery - Juego Crucigrama                           //
// Copyright 2014 Wilson Giovanny Velandia Barreto 3204274564 - willyv78@gmail.com  //
//////////////////////////////////////////////////////////////////////////////////////

$id_tarea = $_POST['tarea'];
$id_estado = $_POST['id_est'];

$sql_ins = "UPDATE rmb_calendario SET rmb_est_id = $id_estado WHERE rmb_calendario_id = $id_tarea";
$res_ins = mysql_query($sql_ins, conexion());
if($res_ins){echo "Registro actualizado correctamente";}
else{echo "";}
	
?>