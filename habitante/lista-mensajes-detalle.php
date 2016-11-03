<?php
session_start();
require_once ("../conexion/conexion.php");
require_once ("../php/funciones.php");
//////////////////////////////////////////////////////////////////////////////////////
// Aplicación PHP usando Bootstrap, jquery, HTML5 y CSS - PH                        //
// Copyright 2014 Wilson Giovanny Velandia Barreto 3204274564 - willyv78@gmail.com  //
//////////////////////////////////////////////////////////////////////////////////////
if(isset($_GET['id_mens'])){
  $id_usu = $_SESSION['UsuID'];
  $nom_tipo = "Recibidos";
  $tipo = "para";
  $id_mens = $_GET['id_mens'];
  if (isset($_GET['tipo'])) {$tipo = $_GET['tipo'];}//2 = recibidos 1 = enviados
  if($tipo == 'de'){
    $nom_tipo = "Enviados";
  }
  // SELECT m.rmb_mens_id, m.rmb_mens_asunto, m.rmb_mens_mens, m.rmb_mens_fenv, m.rmb_mens_frec, m.rmb_est_id, m.rmb_mens_flee, (SELECT GROUP_CONCAT(r.rmb_residente_nom,' ', r.rmb_residente_ape SEPARATOR ', ') FROM rmb_mens_dest d LEFT JOIN rmb_residente r USING(rmb_residente_id) WHERE d.rmb_mens_id = m.rmb_mens_id) AS id_residente FROM rmb_mens m WHERE m.rmb_mens_id = 23 OR m.rmb_mens_pad = 23 ORDER BY rmb_mens_fenv ASC 

  $res_val = registroCampo("rmb_mens m", "m.rmb_mens_id, m.rmb_mens_asunto, m.rmb_mens_mens, m.rmb_mens_fenv, m.rmb_mens_frec, m.rmb_est_id, m.rmb_mens_flee, (SELECT GROUP_CONCAT(d.rmb_mens_dest_tipo, ': ', r.rmb_residente_nom,' ', r.rmb_residente_ape SEPARATOR ', ') FROM rmb_mens_dest d LEFT JOIN rmb_residente r USING(rmb_residente_id) WHERE d.rmb_mens_id = m.rmb_mens_id AND d.rmb_residente_id <> $id_usu) AS destinatarios", "WHERE m.rmb_mens_id = $id_mens OR m.rmb_mens_pad = $id_mens", "", "ORDER BY m.rmb_mens_fenv ASC");
  $datos = "";
  $table = "";
  $nom_rem = "";
  $sq = 0;
  if($res_val) {
      if (mysql_num_rows($res_val) > 0) {
          while ($row_val = mysql_fetch_array($res_val)) {
            if($row_val[5] == '5'){
              $clase_est = "btn-danger";
              $sq += 1;
            }
            elseif($row_val[5] == '7'){
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
                  <span class='col-xs-7 col-sm-8 col-md-4 col-lg-4 text-nowrap modal-open' alt='".$row_val[7]."' title='".$row_val[7]."'>".ucfirst($row_val[7])."</span>
                  <span class='hidden-xs hidden-sm col-md-4 col-lg-5 text-nowrap modal-open' alt='".$row_val[1]."' title='".$row_val[1]."'> ".$row_val[1]."</span>
                  <span class='col-xs-4 col-sm-3 col-md-3 col-lg-2 text-nowrap modal-open' alt='".$row_val[3]."' title='".$row_val[3]."'>".$row_val[3]."</span><br>
                </div>
                <div class='panel-body collapse' id='collapseExample".$row_val[0]."'>
                  <div>".$row_val[2]."</div>
                  <div id-mensaje='".$row_val[0]."' class='btn-group pull-right' role='group' aria-label='...'>";
                  if($row_val[5] != '6'){
                    if($tipo == 'para'){
                      $table .= "<button type='button' class='btn btn-default'>Responder</button>&nbsp;&nbsp;&nbsp;";
                    }
                  }
                  // $table .= "<button type='button' class='btn btn-default'>Reenviar</button>";
                  $table .= "
                  </div>
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
            <div class='mens-est-nom btn-success'></div>
            <span>Atendido&nbsp;</span>
          </div>
          <div class='col-xs-12 col-sm-4 col-md-4 col-lg-4 text-right'>
            <div class='mens-est-nom btn-info'></div>
            <span>Sin responder&nbsp;</span>
          </div>
          <div class='col-xs-12 col-sm-4 col-md-4 col-lg-4 text-right'>
            <div class='mens-est-nom btn-danger'></div>
            <span>Sin Leer&nbsp;</span>
            <input type='hidden' name='sq' id='sq' class='form-control' value='".$sq."'>
          </div>
        </div>
      </div>";
  echo $table;
  ?>
  <input type="hidden" name="tipo" id="tipo" class="form-control" value="<?php echo $tipo;?>">
  <script>
    $(document).ready(function () {
      cargarListaMensajesDetalle();
    });
  </script><?php 
}?>