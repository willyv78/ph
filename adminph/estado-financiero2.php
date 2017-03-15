<?php session_start();
require_once ("../conexion/conexion.php");
require_once ("../php/funciones.php");
//////////////////////////////////////////////////////////////////////////////////////
// Aplicación PHP usando Bootstrap, jquery, HTML5 y CSS - PH                        //
// Copyright 2014 Wilson Giovanny Velandia Barreto 3204274564 - willyv78@gmail.com  //
//////////////////////////////////////////////////////////////////////////////////////
$id_apto = "";
$anio = date("Y");
if(isset($_GET['id_apto'])){
    $id_apto = $_GET['id_apto'];
}
if(isset($_GET['anio'])){
    $anio = $_GET['anio'];
}
$anio1 = $anio - 1;
$anio2 = $anio + 1;
$res_tes = registroCampo("rmb_tesoreria tes", "tes.rmb_tesoreria_id, tes.rmb_tesoreria_fpag, tes.rmb_tesoreria_fven, tes.rmb_tesoreria_obs, SUM(tes.rmb_tesoreria_val), tes.rmb_est_id, tes.rmb_tesoreria_fecha, tes.rmb_tesoreria_user", "WHERE tes.rmb_aptos_id = '$id_apto' AND DATE_FORMAT(tes.rmb_tesoreria_fpag,'%Y') = '$anio'", "GROUP BY DATE_FORMAT(tes.rmb_tesoreria_fpag,'%m'), DATE_FORMAT(tes.rmb_tesoreria_fpag,'%Y')", "ORDER BY tes.rmb_tesoreria_fpag DESC");
?>
<!-- Inicio página estado financiero -->
<div class="col-xs-12 col-sm-offset-1 col-sm-10 col-md-offset-1 col-md-10 col-lg-offset-2 col-lg-8">
    <div class="modal-content">
        <div class="modal-header">
            <div class="titulo-pagina">
                <div class="clearfix">&nbsp;</div>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">
                    <span style="font-weight: bold;color: #546E7A">
                        <i class="glyphicon glyphicon-send"></i>&nbsp;Historial Estado Financiero
                    </span>
                </h4>
                <div class="clearfix">&nbsp;</div>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="col-xs-12 col-sm-10 col-md-8 col-lg-6">
                        <i class="glyphicon glyphicon-triangle-left"></i>
                        <button type="button" class="btn btn-default btn-anios"><?php echo $anio1;?></button>
                        <button type="button" class="btn btn-default btn-anios active"><?php echo $anio;?></button>
                        <button type="button" class="btn btn-default btn-anios"><?php echo $anio2;?></button>
                        <i class="glyphicon glyphicon-triangle-right"></i>
                    </div>
                </div>
                <div class="clearfix">&nbsp;</div>
            </div>
        </div>
            
        <div class="modal-body"><?php 
            if($res_tes){
                if(mysql_num_rows($res_tes) > 0){
                    while($row_tes = mysql_fetch_array($res_tes)){
                        $clase = "btn-success";
                        if($row_tes[5] == '18'){$clase = "btn-warning";}
                        elseif($row_tes[5] == '19'){$clase = "borange";}
                        elseif($row_tes[5] == '20'){$clase = "btn-danger";}?>
                        <div class="panel panel-default" data-toggle="collapse" href="#historial-financiero-<?php echo $row_tes[0];?>" aria-expanded="false" aria-controls="historial-financiero-<?php echo $row_tes[0];?>">
                            <div class="mens-est <?php echo $clase;?>"></div>
                            <div class="panel-heading">
                                <span class="col-xs-7 col-sm-8 col-md-6 col-lg-8 text-nowrap modal-open" style="float:none !important;"><?php echo mesesLetras(date('m', strtotime($row_tes[1])));?></span>
                                <span class="col-xs-5 col-sm-4 col-md-6 col-lg-4 text-nowrap modal-open text-right pull-right">Total $ <?php echo $row_tes[4];?></span>
                            </div>
                            <div class="panel-body collapse" id="historial-financiero-<?php echo $row_tes[0];?>">
                                <div>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quo quia facere perspiciatis laboriosam, harum facilis molestias sapiente, officiis vel distinctio beatae consequuntur iure ea maiores nisi nulla repudiandae, architecto aspernatur.</div>
                                <div id-mensaje="1" class="btn-group pull-right" role="group" aria-label="...">
                                    <button type="button" class="btn btn-default btn-editar">Editar</button>
                                </div>
                            </div>
                        </div><?php 
                    }
                }
                else{?>
                    <div class='col-xs-12 col-sm-12 col-md-12 col-lg-12'>
                        <div class='alert alert-warning text-left'>
                            <strong>Atención!</strong>
                            <p>No se encontraron resultados para el año <?php echo $anio;?>.</p>
                            <footer>Si tiene una inquietud o sugerencia, comuniquese con el desarrollador de la aplicación al correo <cite title='Source Title'>info@rmasb.com</cite> o al teléfono <cite title='Source Title'>(+057 1) 7569919</cite></footer>
                        </div>
                    </div><?php 
                }
            }
            else{?>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="alert alert-danger text-left">
                        <strong>Atención!</strong>
                        <p>Se presento un error en la consulta.</p>
                        <footer>Si el error persiste, comuníquese con el desarrollador de la aplicación al correo <cite title="Source Title">info@rmasb.com</cite> o al teléfono <cite title="Source Title">(+057 1) 7569919</cite></footer>
                    </div>
                </div><?php 
            }?>
        </div>
        <div class="modal-footer">
            <div class="clearfix">&nbsp;</div>
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <button type="button" class="btn btn-default btn-nuevo">Nuevo</button>
            </div>
            <div class="clearfix">&nbsp;</div>
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
              <div class="col-lg-offset-2 col-xs-12 col-sm-12 col-md-12 col-lg-10">
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3 text-right">
                  <div class="mens-est-nom btn-success"></div>
                  <span>Al día&nbsp;</span>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3 text-right">
                  <div class="mens-est-nom btn-warning"></div>
                  <span>Mora de 1 mes&nbsp;</span>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3 text-right">
                  <div class="mens-est-nom borange"></div>
                  <span>Mora de 2 meses&nbsp;</span>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3 text-right">
                  <div class="mens-est-nom btn-danger"></div>
                  <span>Mora más de 2 meses&nbsp;</span>
                </div>
                <input type="hidden" name="id_apto" id="id_apto" class="form-control" value="<?php echo $id_apto;?>">
              </div>
            </div>
        </div>
    </div>
</div>
<script>cargaEstadoFinanciero();</script>
<!-- FIN Pagina estado financiero -->