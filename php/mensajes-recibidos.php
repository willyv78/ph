<?php
session_start();
require_once ("../conexion/conexion.php");
require_once ("funciones.php");
//////////////////////////////////////////////////////////////////////////////////////
// Aplicación javascript usando jquery - Juego Crucigrama                           //
// Copyright 2014 Wilson Giovanny Velandia Barreto 3204274564 - willyv78@gmail.com  //
//////////////////////////////////////////////////////////////////////////////////////
$id_usu = $_SESSION['UsuID'];
$tipo = "para";
$res_val = MensajesRecibidos($id_usu, $tipo);
$sq = 0;
if ($res_val) {
  if (mysql_num_rows($res_val) > 0) {
    while ($row_val = mysql_fetch_array($res_val)) {
      if ($row_val[7] == '5') {
        $sq += 1;
      }
    }
  }
}
echo $sq;
?>