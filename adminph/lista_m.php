<?php
session_start();
require_once ("../conexion/conexion.php");
require_once ("../php/funciones.php");
//////////////////////////////////////////////////////////////////////////////////////
// Aplicación javascript usando jquery - Juego Crucigrama                           //
// Copyright 2014 Wilson Giovanny Velandia Barreto 3204274564 - willyv78@gmail.com  //
//////////////////////////////////////////////////////////////////////////////////////
$id_usu = $_SESSION['UsuID'];
$row_usu = ResidenteDatosId($id_usu);
$de = $row_usu[3]; //correo electronico del usuario
$nentrada = 0;
$nsalida = 0;
if (isset($_GET['tipo'])) {
    $tipo = $_GET['tipo'];
}//2 = recibidos 1 = enviados
else {
    $tipo = 2;
}
if ($tipo == '1') {
    $tipo2 = 2;
    $res_val = Mensajes($de, $tipo);
    $res_val2 = Mensajes($de, $tipo2);
    $nentrada = mysql_num_rows($res_val2);
    $nsalida = mysql_num_rows($res_val);
} else {
    $tipo2 = 1;
    $res_val = Mensajes($de, $tipo);
    $res_val2 = Mensajes($de, $tipo2);
    $nentrada = mysql_num_rows($res_val);
    $nsalida = mysql_num_rows($res_val2);
}
$datos = "";
$table = "";
if ($res_val) {
    if (mysql_num_rows($res_val) > 0) {
        while ($row_val = mysql_fetch_array($res_val)) {
            $table .= "
				      <!-- Contenido mensajes encontrados -->
              <div class='panel panel-danger' style='margin-top: 4px' data-toggle='collapse' href='#collapseExample".$row_val[0]."' aria-expanded='false' aria-controls='collapseExample".$row_val[0]."'>
                <div class='panel-heading'>
                  <span style='font-weight: bold;'>Remitente:</span><span style='color:#000000;font-family:Verdana;font-size:14px;margin-left: 10px'>$row_val[1] $row_val[2]</span>
                  <span style='margin-left: 10px;font-weight: bold;'>Fecha:</span><span style='color:#000000;font-family:Verdana;font-size:14px;margin-left: 10px'>$row_val[9]</span>
                  <span style='color: #546E7A;font-weight: bold;margin-right: 10px;font-size: 15px;margin-left: 10px'>Asunto:</span><span style='color:#000000;font-family:Verdana;font-size:15px;'>$row_val[7]</span><br>
                </div>
                <div class='panel-body collapse' id='collapseExample".$row_val[0]."'>
                  <div style='color:#000000;font-family:Arial;font-size:13px;'>$row_val[8]</div>
                  <div class='btn-group pull-right' role='group' aria-label='...'>
                    <button type='button' class='btn btn-default'>Responder</button>
                    <button type='button' class='btn btn-default'>Reenviar</button>
                  </div>
                </div>
              </div>";
        }
    } else {
        $table .= "
			<!-- Contenido mensajes encontrados -->
			<div id='administracionLayer5' style='text-align:left; left:250px; width:550px; height:132px; z-index:124;' title=''>
				<span style='color:#000000;font-family:Arial;font-size:13px;'>No hay registros</span>
			</div>";
    }
} else {
    $table .= "
		<!-- Contenido mensajes encontrados -->
		<div id='administracionLayer5' style='text-align:left; left:250px; width:550px; height:132px; z-index:124;' title=''>
			<span style='color:#000000;font-family:Arial;font-size:13px;'>Error en la consulta</span>
		</div>";
}
echo $table;
?>



<script>
  $(document).ready(function () {
    cargarLista();
  });
</script>