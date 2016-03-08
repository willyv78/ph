<?php
session_start();
require_once ("../conexion/conexion.php");
require_once ("../php/funciones.php");
//////////////////////////////////////////////////////////////////////////////////////
// Aplicación javascript usando jquery - Juego Crucigrama                           //
// Copyright 2014 Wilson Giovanny Velandia Barreto 3204274564 - willyv78@gmail.com  //
//////////////////////////////////////////////////////////////////////////////////////
$id_usu = $_SESSION['UsuID'];
$nom_tipo = "Recibidos";
$tipo = "para";
$remite = "De";
if (isset($_GET['tipo'])) {
    $tipo = $_GET['tipo'];
}
if($tipo == 'de'){
  $remite = "Para";
  $nom_tipo = "Enviados";
  $res_val = MensajesEnviados($id_usu);
}
else{
  $res_val = MensajesRecibidos($id_usu);
}

$datos = "";
$table = "";
$nom_rem = "";
$sq = 0;
if($res_val) {
    if (mysql_num_rows($res_val) > 0) {
        while ($row_val = mysql_fetch_array($res_val)) {
          if($row_val[7] == '5'){
            $clase_est = "btn-danger";
            $sq += 1;
          }
          elseif($row_val[7] == '7'){
            $clase_est = "btn-info";
          }
          else{
            $clase_est = "btn-success"; 
          }

          $table .= "
			      <!-- Contenido mensajes encontrados -->
            <div class='panel panel-default' data-toggle='collapse' href='#collapseExample".$row_val[0]."' aria-expanded='false' aria-controls='collapseExample".$row_val[0]."'>
              <div class='mens-est ".$clase_est."'></div>
              <div class='panel-heading'>
                <span class='col-xs-7 col-sm-8 col-md-4 col-lg-4 text-nowrap modal-open' alt='".$row_val[1]."' title='".$remite.": ".$row_val[1]."'>".$remite.": ".$row_val[1]."</span>
                <span class='hidden-xs hidden-sm col-md-4 col-lg-5 text-nowrap modal-open'>".$row_val[3]."</span>
                <span class='col-xs-4 col-sm-3 col-md-3 col-lg-2 text-nowrap modal-open'>".$row_val[5]."</span><br>
              </div>
            </div>";
        }
    }
    else{
        $table .= "
          <div class='col-xs-12 col-sm-12 col-md-12 col-lg-12'>
              <div class='alert alert-warning text-left'>
                  <strong>Atención!</strong>
                  <p>No tiene mensajes en la bandeja de ".$nom_tipo.".</p>
                  <footer>Si tiene una inquietud o sugerencia, comuniquese con el desarrollador de la aplicación al correo <cite title='Source Title'>info@rmasb.com</cite> o al telefono <cite title='Source Title'>(+057 1) 7569919</cite></footer>
              </div>
          </div>
        ";
    }
}
else{
    $table .= "
      <div class='col-xs-12 col-sm-12 col-md-12 col-lg-12'>
          <div class='alert alert-danger text-left'>
              <strong>Atención!</strong>
              <p>Se presento un error en la consulta.</p>
              <footer>Si el error persiste, comuníquese con el desarrollador de la aplicación al correo <cite title='Source Title'>info@rmasb.com</cite> o al telefono <cite title='Source Title'>(+057 1) 7569919</cite></footer>
          </div>
      </div>
    ";
}
$table .= "
    <!-- Contenido estado mensajes -->
    <div class='clearfix'>&nbsp;</div>
    <div class='col-xs-12 col-sm-12 col-md-12 col-lg-12'>
      <div class='col-sm-offset-4 col-md-offset-6 col-lg-offset-7 col-xs-12 col-sm-8 col-md-6 col-lg-5'>
        <div class='col-xs-12 col-sm-4 col-md-4 col-lg-4 text-right'>
          <div class='mens-est-nom btn-info'></div>
          <span>Sin responder&nbsp;</span>
        </div>
        <div class='col-xs-12 col-sm-4 col-md-4 col-lg-4 text-right'>
          <div class='mens-est-nom btn-success'></div>
          <span>Atendido&nbsp;</span>
        </div>
        <div class='col-xs-12 col-sm-4 col-md-4 col-lg-4 text-right'>
          <div class='mens-est-nom btn-danger'></div>
          <span>Sin Leer&nbsp;</span>
          <input type='hidden' name='sq' id='sq' class='form-control' value='".$sq."'>
        </div>
      </div>
    </div>";
echo $table;
?><input type="hidden" name="tipo" id="tipo" class="form-control" value="<?php echo $tipo;?>">
<script>
  $(document).ready(function () {
    cargarListaMensajes();
  });
</script>