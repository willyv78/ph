<?php
//////////////////////////////////////////////////////////////////////////////////////
// Aplicación PHP usando Bootstrap, jquery, HTML5 y CSS - PH                        //
// Copyright 2014 Wilson Giovanny Velandia Barreto 3204274564 - willyv78@gmail.com  //
//////////////////////////////////////////////////////////////////////////////////////
function conexion(){
	// $con = mysql_connect("localhost","rmas2784","rmasbconfig001");
    $con = mysql_connect("localhost","root","gemelo22");
	//$con = mysql_connect("localhost","root","Ubuntu123");
	//$con = mysql_connect("localhost","hache","nrv%8Pz1Ncqy");
	if (!$con){die('No se pudo conectar: ' . mysql_error());}
	mysql_select_db("rmb_admon", $con);
	//mysql_select_db("rmas2784_rmb_admon", $con);
    //mysql_select_db("hache_rmb_admon", $con);
	return $con;
}
?>