<?php session_start();
require_once ("../conexion/conexion.php");
require_once ("../php/funciones.php");
//////////////////////////////////////////////////////////////////////////////////////
// Aplicación PHP usando Bootstrap, jquery, HTML5 y CSS - PH                        //
// Copyright 2014 Wilson Giovanny Velandia Barreto 3204274564 - willyv78@gmail.com  //
//////////////////////////////////////////////////////////////////////////////////////
$id_apto = "";
$anyo = date("Y");
$mes = date('m');
$mes_hoy = date('m');
if(isset($_GET['id_apto'])){
    $id_apto = $_GET['id_apto'];
}
if(isset($_GET['anio'])){
    $anio = $_GET['anio'];
    if($anyo > $anio){
        $mes = 12;
    }
    elseif($anyo < $anio){
        $mes = 0;
    }
}
else{
    $anio = $anyo;
}
$anio1 = $anio - 1;
$anio2 = $anio + 1;
?>
<!-- Inicio página estado financiero -->
<div class="modal-dialog">
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
        if($mes > 0){
            $valor_global_total = 0;
            $array_meses = array();
            // variable que almacena el valor de la administración del apartamento
            $valor_admin = "";
            // realizamos la consulta del valor de la administracion por tipo de apartamento
            $res_admin = registroCampo("rmb_aptos a", "ta.rmb_taptos_admin", "LEFT JOIN rmb_taptos ta USING(rmb_taptos_id) WHERE a.rmb_aptos_id = '$id_apto'", "", "");
            if($res_admin){
                if(mysql_num_rows($res_admin) > 0){
                    $row_admin = mysql_fetch_array($res_admin);
                    $valor_admin = $row_admin[0];
                }
            }
            for($i = 1; $i <= $mes; $i++){
                if(strlen($i) < 2){$mess = "0".$i;}
                else{$mess = $i;}
                $row_tes = "";
                $cont_meses = "";
                $clase = "btn-success";
                $res_tes = registroCampo("rmb_tesoreria tes", "tes.rmb_tesoreria_id, SUM(tes.rmb_tesoreria_val)", "WHERE tes.rmb_aptos_id = '$id_apto' AND DATE_FORMAT(tes.rmb_tesoreria_fpag,'%Y') = '$anio' AND DATE_FORMAT(tes.rmb_tesoreria_fpag,'%m') = '$mess'", "GROUP BY DATE_FORMAT(tes.rmb_tesoreria_fpag,'%m'), DATE_FORMAT(tes.rmb_tesoreria_fpag,'%Y')", "");
                if($res_tes){
                    if(mysql_num_rows($res_tes) > 0){
                        $row_tes = mysql_fetch_array($res_tes);
                        $valor_debe = $row_tes[1];
                        $res_concepto = registroCampo("rmb_tes_concep c", "tp.rmb_tpago_nom, tp.rmb_tpago_ope, c.rmb_tes_concep_cant, c.rmb_tes_concep_val", "LEFT JOIN rmb_tpago tp USING(rmb_tpago_id) WHERE c.rmb_tesoreria_id = '".$row_tes[0]."'", "", "");
                        if($res_concepto){
                            if(mysql_num_rows($res_concepto) < 1){
                                $sql_concept = "INSERT INTO rmb_tes_concep (rmb_tesoreria_id, rmb_tpago_id, rmb_tes_concep_cant, rmb_tes_concep_val) VALUES ('".$row_tes[0]."', '1', '1', $valor_admin)";
                                $query_concept = mysql_query($sql_concept, conexion());
                            }
                        }
                    }
                    else{
                        $fpag = $anio."-".$mess."-01";
                        $fven = $anio."-".$mess."-30";
                        $mes_letras = mesesLetras($i);
                        $nex_id = NextID('rmb_admon', 'rmb_tesoreria');
                        $sql = "INSERT INTO rmb_tesoreria (rmb_tesoreria_fpag, rmb_tesoreria_fven, rmb_tesoreria_obs, rmb_tesoreria_val, rmb_aptos_id, rmb_tesoreria_fecha, rmb_tesoreria_user) VALUES ('$fpag', '$fven', 'Pago de administración del mes de $mes_letras', $valor_admin, $id_apto, NOW(), ".$_SESSION['UsuID'].")";
                        $query = mysql_query($sql, conexion());
                        if($query){
                            $sql2 = "INSERT INTO rmb_tes_concep (rmb_tesoreria_id, rmb_tpago_id, rmb_tes_concep_cant, rmb_tes_concep_val) VALUES ('$nex_id', '1', '1', $valor_admin)";
                            $query = mysql_query($sql2, conexion());
                        }
                    }
                }
                $res_pagos = registroCampo("rmb_pagos p", "SUM(p.rmb_pagos_valor)", "WHERE p.rmb_tesoreria_id = '".$row_tes[0]."'", "GROUP BY p.rmb_tesoreria_id", "ORDER BY p.rmb_pagos_id DESC");
                if($res_pagos){
                    if(mysql_num_rows($res_pagos) > 0){
                        $row_pagos = mysql_fetch_array($res_pagos);
                        $valor_paga = $row_pagos[0];
                        if($valor_debe > $valor_paga){
                            $signo = "-";
                            $valor_saldo = round($valor_debe - $valor_paga);
                            $clase = "btn-warning";
                        }
                        elseif($valor_debe <= $valor_paga){
                            $signo = "+";
                            $valor_saldo = round($valor_paga - $valor_debe);
                            $clase = "btn-success";
                        }
                    }
                    else{
                        $clase = "btn-warning";
                        $valor_saldo = $valor_debe;
                        $signo = "-";
                    }
                }
                else{
                    $clase = "btn-warning";
                    $valor_saldo = $valor_debe;
                    $signo = "-";
                }
                // verificamos si el valor del saldo es negativo
                if($signo == '-'){
                    // restamos del valor negativo del saldo del mes el valor que tenemos en el saldo total del año
                    $valor_saldo_total = $valor_global_total - $valor_saldo;
                    // obtenemos el numero de meses diferencia entre el mes actual y el que se esta liquidando
                    $mes_dif = $mes_hoy - $i;
                    // si la diferencia es mayor a dos meses
                    if($mes_dif > 2){
                        $clase = "btn-danger";
                    }
                    // si la diferencia es mayor a un mes y menor o igual a dos
                    elseif(($mes_dif > 1) && ($mes_dif <= 2)){
                        $clase = "borange";
                    }
                    // si la diferencia es menor o igual a un mes
                    elseif($mes_dif == 1){
                        $clase = "btn-warning";
                    }
                    // si se obtiene otro dato hace esto
                    else{
                        $clase = "btn-success";
                    }
                }
                // el saldo del mes es positivo
                else{
                    // restamos del valor negativo del saldo del mes el valor que tenemos en el saldo total del año
                    $valor_saldo_total = $valor_global_total + $valor_saldo;
                    if($valor_saldo_total < 0){
                        // obtenemos el numero de meses diferencia entre el mes actual y el que se esta liquidando
                        $mes_dif = $mes_hoy - $i;
                        // si la diferencia es mayor a dos meses
                        if($mes_dif > 2){
                            $clase = "btn-danger";
                        }
                        // si la diferencia es mayor a un mes y menor o igual a dos
                        elseif(($mes_dif > 1) && ($mes_dif <= 2)){
                            $clase = "borange";
                        }
                        // si la diferencia es menor o igual a un mes
                        elseif($mes_dif == 1){
                            $clase = "btn-warning";
                        }
                        // si se obtiene otro dato hace esto
                        else{
                            $clase = "btn-success";
                        }
                    }
                    else{
                        $clase = "btn-success";
                    }
                }
                $cont_meses .= '
                    <div class="panel panel-default" data-toggle="collapse" href="#historial-financiero-'.$i.'" aria-expanded="false" aria-controls="historial-financiero-'.$i.'">
                        <div class="mens-est '.$clase.'"></div>
                        <div class="panel-heading">
                            <span class="col-xs-7 col-sm-8 col-md-6 col-lg-8 text-nowrap modal-open" style="float:none !important;">'.mesesLetras($i).'</span>
                            <span class="col-xs-5 col-sm-4 col-md-6 col-lg-4 text-nowrap modal-open sleeptext-right pull-right">Total $ '.number_format($valor_saldo_total).'</span>
                        </div>
                        <div class="panel-body collapse" id="historial-financiero-'.$i.'">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">';

                            $res_concept = registroCampo("rmb_tes_concep c", "tp.rmb_tpago_nom, tp.rmb_tpago_ope, c.rmb_tes_concep_cant, c.rmb_tes_concep_val", "LEFT JOIN rmb_tpago tp USING(rmb_tpago_id) WHERE c.rmb_tesoreria_id = '".$row_tes[0]."'", "", "");
                            if($res_concept){
                                if(mysql_num_rows($res_concept) > 0){
                                    while($row_concept = mysql_fetch_array($res_concept)){
                                        $cont_meses .= '
                                        <div class="col-xs-10 col-sm-10 col-md-10 col-lg-10 text-left">'.utf8_decode($row_concept[0]).'
                                        </div>
                                        <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 text-right">'.number_format($row_concept[3]).'
                                        </div>';
                                    }
                                    if($valor_global_total <> 0){
                                        if($valor_global_total > 0){
                                            $cont_meses .= '
                                            <div class="col-xs-10 col-sm-10 col-md-10 col-lg-10 text-left">Menos saldo positivo mes anterior</div>
                                            <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 text-right">'.number_format($valor_global_total).'
                                            </div>';
                                        }
                                        else{
                                            $cont_meses .= '
                                            <div class="col-xs-10 col-sm-10 col-md-10 col-lg-10 text-left">Más saldo negativo mes anterior</div>
                                            <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 text-right">'.number_format($valor_global_total).'
                                            </div>';
                                        }
                                    }
                                }
                                else{
                                    if($valor_global_total <> 0){
                                        if($valor_global_total > 0){
                                            $cont_meses .= '
                                            <div class="col-xs-10 col-sm-10 col-md-10 col-lg-10 text-left">Menos saldo positivo mes anterior</div>
                                            <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 text-right">'.number_format($valor_global_total).'
                                            </div>';
                                        }
                                        elseif($valor_global_total < 0){
                                            $cont_meses .= '
                                            <div class="col-xs-10 col-sm-10 col-md-10 col-lg-10 text-left">Más saldo negativo mes anterior</div>
                                            <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 text-right">'.number_format($valor_global_total).'
                                            </div>';
                                        }
                                        else{
                                            $cont_meses .= '
                                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                                <div class="alert alert-warning text-left">
                                                    <strong>Atención!</strong>
                                                    <p>No se encontraron resultados para el mes delll '.mesesLetras($i).'.</p>
                                                    <footer>Si tiene una inquietud o sugerencia, comuniquese con el desarrollador de la aplicación al correo <cite title="Source Title">info@rmasb.com</cite> o al telefono <cite title="Source Title">(+057 1) 7569919</cite></footer>
                                                </div>
                                            </div>';
                                        }
                                    }
                                }
                            }
                            else{
                                $cont_meses .= '
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                        <div class="alert alert-warning text-left">
                                            <strong>Atención!</strong>
                                            <p>No se encontraron resultados para el mes de '.mesesLetras($i).'.</p>
                                            <footer>Si tiene una inquietud o sugerencia, comuniquese con el desarrollador de la aplicación al correo <cite title="Source Title">info@rmasb.com</cite> o al telefono <cite title="Source Title">(+057 1) 7569919</cite></footer>
                                        </div>
                                    </div>';
                            }
                            $cont_meses .= '
                                </div>
                                <div class="clearfix">&nbsp;</div>
                                <div id-mensaje="'.$row_tes[0].'" class="btn-group pull-right" role="group" aria-label="...">
                                    <button type="button" class="btn btn-default btn-editar">Editar Cobro</button>';
                                    if(mysql_num_rows($res_pagos) > 0){
                                        $cont_meses .= '
                                        <button type="button" class="btn btn-default btn-editar">Editar Pago</button>';
                                    }
                                    else{
                                        $cont_meses .= '
                                        <button type="button" class="btn btn-default btn-editar">Nuevo Pago</button>';
                                    }
                                $cont_meses .= '
                                </div>
                            </div>
                        </div>';
                $array_meses[] = $cont_meses;
                // le damos el nuevo valor que tendriamos en el valor total del año
                $valor_global_total = $valor_saldo_total;
                // array_push($array_meses, $cont_meses);
                // echo $cont_meses;
            }
            for($j = count($array_meses); $j >= 0; $j--){
                echo $array_meses[$j];
            }
            
        }
        else{?>
            <div class='col-xs-12 col-sm-12 col-md-12 col-lg-12'>
                <div class='alert alert-warning text-left'>
                    <strong>Atención!</strong>
                    <p>No se encontraron resultados para el año <?php echo $anio;?>.</p>
                    <footer>Si tiene una inquietud o sugerencia, comuniquese con el desarrollador de la aplicación al correo <cite title='Source Title'>info@rmasb.com</cite> o al telefono <cite title='Source Title'>(+057 1) 7569919</cite></footer>
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