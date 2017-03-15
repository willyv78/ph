<?php session_start();
require_once ("../conexion/conexion.php");
require_once ("../php/funciones.php");
//////////////////////////////////////////////////////////////////////////////////////
// Aplicación PHP usando Bootstrap, jquery, HTML5 y CSS - PH                        //
// Copyright 2014 Wilson Giovanny Velandia Barreto 3204274564 - willyv78@gmail.com  //
//////////////////////////////////////////////////////////////////////////////////////
$id_apto = "";
$id_proy = $_SESSION['ProyId'];
$anyo = date("Y");
$mes = date('m');
$dia = date('d');
$mes_hoy = date('m');
$nom_apto = "";
if(isset($_GET['id_apto'])){
    $id_apto = $_GET['id_apto'];
    $nom_apto = nombreCampo($id_apto, "rmb_aptos");
}
if(isset($_GET['anio'])){
    $anio = $_GET['anio'];
    $fecha_hoy = date('Y-m-d', strtotime(($anio)."-12-31"));
}
else{
    $anio = $anyo;
    $fecha_hoy = date('Y-m-d');
}
$anio1 = $anio - 1;
$anio2 = $anio + 1;
$est_tes = 20; // Estado de tesoreria al día
$clase = "btn-warning";
$est_clase = 18; // Estado de tesoreria Mora de 1 mes
$valor_saldo = 0;
$valor_debe = 0;
$deuda_ant = 0;
$pago_ant = 0;
$anio_ini = 2016; // Año inicial desde que se cobra administración.
$fechaini_admin = 1; // Día en que arranca el cobro de administración.
$fechafin_admin = 30; // día del mes en que se determina mora.
$fechadec_admin = 15; // Día del mes hasta que se aplica descuento.
$porc_desc_consejo = 0;
// variable que almacena el valor de la administración del apartamento
$valor_admin = 0;
// realizamos la consulta de los parametros del proyecto año desde que se cobra administración, fecha hasta que aplica el descuento por pronto pago y la fecha hasta que se aplica mora
$res_proy = registroCampo("rmb_proyecto p", "p.rmb_proyecto_finiadmin, p.rmb_proyecto_ffinadmin, p.rmb_proyecto_fdescadmin", "WHERE p.rmb_proyecto_id = '$id_proy'", "", "");
if($res_proy){
    if(mysql_num_rows($res_proy) > 0){
        $row_proy = mysql_fetch_array($res_proy);
        $fechaini_admin = $row_proy[0];
        $fechafin_admin = $row_proy[1];
        $fechadec_admin = $row_proy[2];
        // $porc_desc_consejo = $row_proy[3];
    }
}
// realizamos la consulta del valor de la administracion por tipo de apartamento
$res_admin = registroCampo("rmb_aptos a", "ta.rmb_taptos_admin", "LEFT JOIN rmb_taptos ta USING(rmb_taptos_id) WHERE a.rmb_aptos_id = '$id_apto'", "", "");
if($res_admin){
    if(mysql_num_rows($res_admin) > 0){
        $row_admin = mysql_fetch_array($res_admin);
        $valor_admin = $row_admin[0];
    }
}
$sq = 0;
// recorremos los años desde el inicio de cobro de administración segun variable del proyecto hasta el año actual
for($i = round($anio_ini); $i <= round($anyo); $i++){
    // si esta en el año actual los meses equivale a el mes actual
    if($i == round($anyo)){$meses_anyo = round($mes);}
    // Si son años anteriores los meses serán 12
    else{$meses_anyo = 12;}
    // recorremos los meses del año
    for($j = 1; $j <= $meses_anyo; $j++){
        // si el mes es menor a 10 agrega un cero al inicio
        if(strlen($j) < 2){$mess_anyo = "0".$j;}
        else{$mess_anyo = $j;}
        // Se consulta si existe un cobro para el mes y el año
        $res_tes = registroCampo("rmb_tesoreria tes", "tes.rmb_tesoreria_id, tes.rmb_tesoreria_val, tes.rmb_est_id", "WHERE tes.rmb_aptos_id = '$id_apto' AND DATE_FORMAT(tes.rmb_tesoreria_fpag,'%Y') = '$i' AND DATE_FORMAT(tes.rmb_tesoreria_fpag,'%m') = '$mess_anyo'", "", "");
        // si hace la consulta correctamente hace esto
        if($res_tes){
            // si encuentra algun registro hace esto
            if(mysql_num_rows($res_tes) > 0){
                $row_tes = mysql_fetch_array($res_tes);
                $valor_debe = $row_tes[1];
                $est_tes = $row_tes[2];
                // consultamos si existe un concepto asignado al cobro actual
                $res_concepto = registroCampo("rmb_tes_concep c", "tp.rmb_tpago_nom, tp.rmb_tpago_ope, c.rmb_tes_concep_cant, c.rmb_tes_concep_val", "LEFT JOIN rmb_tpago tp USING(rmb_tpago_id) WHERE c.rmb_tesoreria_id = '".$row_tes[0]."'", "", "");
                // si realiza la consulta correctamente hace esto
                if($res_concepto){
                    // si no encuentra resultados hace esto
                    if(mysql_num_rows($res_concepto) < 1){
                        // insertamos un registro por concepto de administracion con valor segun el tipo de apartamento
                        $sql_concept = "INSERT INTO rmb_tes_concep (rmb_tesoreria_id, rmb_tpago_id, rmb_tes_concep_cant, rmb_tes_concep_val) VALUES ('".$row_tes[0]."', '1', '1', $valor_admin)";
                        $query_concept = mysql_query($sql_concept, conexion());
                        // Consultamos los conceptos y sus tipo de operacion para actualizar el cobro
                        $sql_tes_concept = "SELECT c.rmb_tes_concep_val, tp.rmb_tpago_ope FROM rmb_tes_concep c LEFT JOIN rmb_tpago tp USING(rmb_tpago_id) WHERE c.rmb_tesoreria_id = '".$row_tes[0]."'";
                        $res_tes_concept = mysql_query($sql_tes_concept, conexion());
                        if($res_tes_concept){
                            if(mysql_num_rows($res_tes_concept) > 0){
                                while($row_tes_concept = mysql_fetch_array($res_tes_concept)){
                                    $valor = $row_tes_concept[0];
                                    $opera = $row_tes_concept[1];
                                    if($opera == "1"){
                                        $valor_tes += $valor;
                                    }
                                    else{
                                        if($valor_tes >= $valor){
                                            $valor_tes = $valor_tes - $valor;
                                        }
                                        else{
                                            $valor_tes = $valor - $valor_tes;
                                        }
                                    }
                                }
                            }
                        }
                        // si el estado del registro anterior o mes anterior es al dia hace esto
                        if($est_tes == 17){
                            $new_est = 18;
                        }
                        // Si el estado del mes anterior es mora de un mes hace esto
                        elseif($est_tes == 18){
                            $new_est = 19;
                        }
                        // si el estado del mes anterior es mora de 2 meses hace esto
                        elseif($est_tes == 19){
                            $new_est = 20;
                        }
                        // si el estado del mes anterior es mora de más de 2 meses hace esto
                        else{
                            $new_est = 20;
                        }
                        // Actualizamos el valor del cobro
                        $sql_upd_tes = "UPDATE rmb_tesoreria SET rmb_tesoreria_val = $valor_tes, rmb_est_id = $new_est WHERE rmb_tesoreria_id = '".$row_tes[0]."'";
                        $res_upd_tes = mysql_query($sql_upd_tes, conexion());
                    }
                }
            }
            // si no hay cobro para el mes y año hace esto
            else{
                // Obtenemos el primer dia del mes
                $fecha_anyomes = new DateTime($i."-".$mess_anyo);
                $fecha_primerdia = $fecha_anyomes->modify('first day of this month');
                $primer_dia = $fecha_primerdia->format('d');
                // Obtenemos el ultimo del dia del mes
                $fecha_ultimodia = $fecha_anyomes->modify('last day of this month');
                $ultimo_dia = $fecha_ultimodia->format('d');
                // se arma las fechas de inicio del mes y la final del mes
                $fpag = $i."-".$mess_anyo."-".$primer_dia;
                $fven = $i."-".$mess_anyo."-".$ultimo_dia;
                $mes_letras = mesesLetras($j);
                // Consultamos si existe un cobro o deuda con fecha inferior al primer dia del mes
                $res_deuda = registroCampo("rmb_tesoreria tes", "SUM(tes.rmb_tesoreria_val)", "WHERE tes.rmb_aptos_id = '$id_apto' AND DATE_FORMAT(tes.rmb_tesoreria_fpag,'%Y-%m-%d') <= '$fpag'", "GROUP BY tes.rmb_aptos_id", "");
                if($res_deuda){
                    if(mysql_num_rows($res_deuda) > 0){
                        $row_deuda = mysql_fetch_array($res_deuda);
                        $deuda_ant = $row_deuda[0];
                        $sq++;
                    }
                }
                // consultamos el valor total pagado hasta la fecha dada segun año dado, mes de la iteración y ultimo dia del mes
                $res_pago = registroCampo("rmb_pagos p", "SUM(p.rmb_pagos_valor)", "LEFT JOIN rmb_tesoreria tes USING(rmb_tesoreria_id) WHERE tes.rmb_aptos_id = '$id_apto' AND DATE_FORMAT(p.rmb_pagos_fpago,'%Y-%m-%d') <= '$fpag'", "GROUP BY tes.rmb_aptos_id", "");
                if($res_pago){
                    if(mysql_num_rows($res_pago) > 0){
                        $row_pago = mysql_fetch_array($res_pago);
                        $pago_ant = $row_pago[0];
                        // echo "Pago anterior = ".$pago_ant;
                    }
                }
                // si existe algun cobro o deuda anterior hace esto
                if($sq > 0){
                    // consultamos el estado del ultimo cobro de la tabla tesorería
                    $res_est_tes = registroCampo("rmb_tesoreria tes", "tes.rmb_est_id", "WHERE tes.rmb_aptos_id = '$id_apto'", "", "ORDER BY tes.rmb_tesoreria_id DESC LIMIT 1");
                    // si hace la consulta correctamente hace esto
                    if($res_est_tes){
                        // si obtiene algun resultado hace esto
                        if(mysql_num_rows($res_est_tes) > 0){
                            $row_est_tes = mysql_fetch_array($res_est_tes);
                            $est_tes = $row_est_tes[0];
                            // echo "est_tes=".$est_tes;
                        }
                    }
                    // si el estado del registro anterior o mes anterior es al dia hace esto
                    if($est_tes == 17){
                        $clase = "btn-warning";
                        $new_est = 18;
                    }
                    // Si el estado del mes anterior es mora de un mes hace esto
                    elseif($est_tes == 18){
                        $clase = "borange";
                        $new_est = 19;
                    }
                    // si el estado del mes anterior es mora de 2 meses hace esto
                    elseif($est_tes == 19){
                        $clase = "btn-danger";
                        $new_est = 20;
                    }
                    // si el estado del mes anterior es mora de más de 2 meses hace esto
                    else{
                        $clase = "btn-danger";
                        $new_est = 20;
                    }
                }
                else{
                    $clase = "btn-warning";
                    $new_est = 20;
                }
                // obtenermos el proximo id de la tabla tesoreria
                $nex_id = NextID('rmb_admon', 'rmb_tesoreria');
                // hacemos el insert del registro en la tabla rmb_tesorería para el mes actual
                $sql_tes_mes = "INSERT INTO rmb_tesoreria (rmb_tesoreria_fpag, rmb_tesoreria_fven, rmb_tesoreria_obs, rmb_tesoreria_val, rmb_aptos_id, rmb_est_id, rmb_tesoreria_fecha, rmb_tesoreria_user) VALUES ('$fpag', '$fven', 'Pago de administración del mes de $mes_letras', $valor_admin, $id_apto, $new_est, NOW(), ".$_SESSION['UsuID'].")";
                $query_tes_mens = mysql_query($sql_tes_mes, conexion());
                if($query_tes_mens){
                    if(mysql_affected_rows() > 0){
                        // hacemos un insert del concepto administración
                        $sql2 = "INSERT INTO rmb_tes_concep (rmb_tesoreria_id, rmb_tpago_id, rmb_tes_concep_cant, rmb_tes_concep_val) VALUES ('$nex_id', '1', '1', $valor_admin)";
                        $query2 = mysql_query($sql2, conexion());
                    }
                }
            }
        }
    }
}
$res_tes_apto = registroCampo("rmb_tesoreria tes", "tes.rmb_est_id", "WHERE tes.rmb_aptos_id = '$id_apto'", "", "ORDER BY tes.rmb_tesoreria_id DESC LIMIT 1");
if($res_tes_apto){
    if(mysql_num_rows($res_tes_apto) > 0){
        $row_tes_apto = mysql_fetch_array($res_tes_apto);
        $sql_upd_apto = "UPDATE rmb_aptos SET rmb_est_id = ".$row_tes_apto[0]." WHERE rmb_aptos_id = '$id_apto'";
        $res_upd_apto = mysql_query($sql_upd_apto, conexion());
    }
}
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
                        Estado Financiero <?php if($nom_apto){
                            echo "apto. " . $nom_apto;
                            }?>
                    </span>
                </h4>
                <div class="clearfix">&nbsp;</div>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="col-xs-12 col-sm-10 col-md-8 col-lg-6">
                        <i class="glyphicon glyphicon-triangle-left"></i>
                        <button type="button" class="btn btn-default btn-anios <?php if($anio1 < $anio_ini){echo "disabled";}?>"><?php echo $anio1;?></button>
                        <button type="button" class="btn btn-default btn-anios active"><?php echo $anio;?></button>
                        <button type="button" class="btn btn-default btn-anios <?php if($anio2 > $anyo){echo "disabled";}?>"><?php echo $anio2;?></button>
                        <i class="glyphicon glyphicon-triangle-right"></i>
                    </div>

                    <div class="col-xs-12 col-sm-2 col-md-4 col-lg-6 text-right">
                        <button type="button" class="btn btn-default btn-nuevo" data-tipo="pago">Nuevo Pago</button>
                        <button type="button" class="btn btn-default btn-nuevo" data-tipo="cobro">Nuevo Cobro</button>
                    </div>
                </div>
                <div class="clearfix">&nbsp;</div>
            </div>
        </div>
        <!-- En este div se carga el contenido con los meses y sus valores -->
        <div class="modal-body"><?php 
        $res_tes = registroCampo("rmb_tesoreria tes", "tes.rmb_tesoreria_id, tes.rmb_tesoreria_val, tes.rmb_est_id, DATE_FORMAT(tes.rmb_tesoreria_fpag,'%c')", "WHERE tes.rmb_aptos_id = '$id_apto' AND DATE_FORMAT(tes.rmb_tesoreria_fpag,'%Y') = '$anio'", "", "ORDER BY tes. rmb_tesoreria_fpag DESC");
        if($res_tes){
            if(mysql_num_rows($res_tes) > 0){
                while($row_tes = mysql_fetch_array($res_tes)){
                    $tes_id = $row_tes[0];
                    $tes_val = $row_tes[1];
                    $tes_est = $row_tes[2];
                    $tes_mes = mesesLetras($row_tes[3]);
                    if($tes_est == 17){$clase = "btn-success";}
                    elseif($tes_est == 18){$clase = "btn-warning";}
                    elseif($tes_est == 19){$clase = "borange";}
                    elseif($tes_est == 20){$clase = "btn-danger";}
                    else{$clase = "btn-warning";}

                    // Obtenemos el primer dia del mes
                    $fecha_anyomes = new DateTime($anio."-".$row_tes[3]);
                    $fecha_primerdia = $fecha_anyomes->modify('first day of this month');
                    $primer_dia = $fecha_primerdia->format('d');
                    // Obtenemos el ultimo del dia del mes
                    $fecha_ultimodia = $fecha_anyomes->modify('last day of this month');
                    $ultimo_dia = $fecha_ultimodia->format('d');
                    // se arma las fechas de inicio del mes y la final del mes
                    $fpag = $anio."-".$row_tes[3]."-".$primer_dia;
                    $fven = $anio."-".$row_tes[3]."-".$ultimo_dia;
                    // echo "fecha de pag0:".$fpag." fecha vence:".$fven;
                    // inicializamos la variable lo que debe
                    $debe = 0;
                    $res_debe = registroCampo("rmb_tesoreria tes", "SUM(tes.rmb_tesoreria_val)", "WHERE tes.rmb_aptos_id = '$id_apto' AND tes.rmb_tesoreria_fpag < '$fpag'", "GROUP BY tes.rmb_aptos_id", "ORDER BY tes. rmb_tesoreria_fpag DESC");
                    if($res_debe){
                        if(mysql_num_rows($res_debe) > 0){
                            $row_debe = mysql_fetch_array($res_debe);
                            $debe = $row_debe[0];
                        }
                    }
                    // Inicializamos la variable de lo que pago
                    $pago = 0;
                    $res_pago = registroCampo("rmb_pagos p", "SUM(p.rmb_pagos_valor)", "LEFT JOIN rmb_tesoreria tes USING(rmb_tesoreria_id) WHERE tes.rmb_aptos_id = '$id_apto' AND p.rmb_pagos_fpago < '$fven'", "GROUP BY p.rmb_tesoreria_id", "ORDER BY p.rmb_pagos_id DESC");
                    if($res_pago){
                        if(mysql_num_rows($res_pago) > 0){
                            $row_pago = mysql_fetch_array($res_pago);
                            $pago = $row_pago[0];
                        }
                    }
                    $tiene = $pago - $debe;
                    if($tiene < 0){$total = ($tiene * -1) + $tes_val;}
                    else{$total = $tiene - $tes_val;}
                    if($total < 0){$total = $total * -1;}?>
                    <div class="panel panel-default" data-toggle="collapse" href="#historial-financiero-<?php echo $tes_id;?>" aria-expanded="false" aria-controls="historial-financiero-<?php echo $tes_id;?>">
                        <div class="mens-est <?php echo $clase;?>"></div>
                        <div class="panel-heading">
                            <div class="text-nowrap modal-open div-mes">&nbsp;<?php echo $tes_mes;?></div>
                            <div class="text-nowrap modal-open text-right div-valor"><?php echo number_format($total);?></div>
                        </div>
                        <div class="panel-body collapse" id="historial-financiero-<?php echo $tes_id;?>" data-mes="<?php echo $row_tes[3];?>" data-anio="<?php echo $anio;?>">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12"><?php 
                                $res_concept = registroCampo("rmb_tes_concep c", "tp.rmb_tpago_nom, tp.rmb_tpago_ope, c.rmb_tes_concep_cant, c.rmb_tes_concep_val", "LEFT JOIN rmb_tpago tp USING(rmb_tpago_id) WHERE c.rmb_tesoreria_id = '".$row_tes[0]."'", "", "");
                                if($res_concept){
                                    if(mysql_num_rows($res_concept) > 0){?>
                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                            <div class="col-xs-10 col-sm-10 col-md-10 col-lg-10"><strong>Concepto</strong></div>
                                            <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 text-right"><strong>Valor</strong></div><?php
                                            while($row_concept = mysql_fetch_array($res_concept)){?>
                                                <div class="col-xs-10 col-sm-10 col-md-10 col-lg-10 text-left"><?php echo $row_concept[0];?></div>
                                                <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 text-right"><?php echo number_format($row_concept[3]);?></div><?php 
                                            }
                                            if($tiene <> 0){
                                                if($tiene < 0){?>
                                                    <div class="col-xs-10 col-sm-10 col-md-10 col-lg-10 text-left">Más saldo negativo anterior</div>
                                                    <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 text-right"><?php echo number_format(($tiene * -1));?></div><?php 
                                                }
                                                elseif($tiene > 0){?>
                                                    <div class="col-xs-10 col-sm-10 col-md-10 col-lg-10 text-left">Menos saldo positivo</div>
                                                    <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 text-right"><?php echo number_format($tiene);?></div><?php 
                                                }
                                            }?>
                                            <div class="clearfix">&nbsp;</div>
                                            <div data-id="<?php echo $tes_id;?>" class="btn-group pull-right">
                                                <button type="button" class="btn btn-default btn-editar">Editar Cobro</button>
                                            </div>
                                        </div><?php 
                                    }
                                }
                                $res_pagos = registroCampo("rmb_pagos p", "p.rmb_pagos_id, p.rmb_pagos_fpago, p.rmb_pagos_valor, p.rmb_fpago_id", "WHERE p.rmb_tesoreria_id = $row_tes[0]", "", "ORDER BY p.rmb_pagos_id DESC");
                                if($res_pagos){
                                    if(mysql_num_rows($res_pagos) > 0){?>
                                        <div class="clearfix">&nbsp;</div>
                                        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4"><strong>Fecha de pago</strong></div>
                                        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4"><strong>Forma de pago</strong></div>
                                        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 text-right"><strong>Valor</strong></div><?php 
                                        while($row_pagos = mysql_fetch_array($res_pagos)){?>
                                            <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 text-left"><?php echo $row_pagos[1];?></div>
                                            <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 text-left"><?php echo nombreCampo($row_pagos[3], 'rmb_fpago');?></div>
                                            <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 text-right"><?php echo number_format($row_pagos[2]);?></div>
                                            <div class="clearfix">&nbsp;</div>
                                            <div data-id="<?php echo $row_pagos[0];?>" class="btn-group pull-right">
                                                <button type="button" class="btn btn-default btn-editar">Editar Pago</button>
                                            </div><?php 
                                        }
                                    }
                                }?>
                            </div>
                        </div>
                    </div><?php
                }
            }
        }
        ?>
        </div>
        <!-- fin del contenido -->
        <div class="modal-footer">
            <div class="clearfix">&nbsp;</div>
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
              <div class="col-lg-offset-2 col-xs-12 col-sm-12 col-md-12 col-lg-10">
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-2 text-right">
                  <div class="mens-est-nom btn-success"></div>
                  <span>Al día&nbsp;</span>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3 text-right">
                  <div class="mens-est-nom btn-warning"></div>
                  <span>Mora 1 mes&nbsp;</span>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3 text-right">
                  <div class="mens-est-nom borange"></div>
                  <span>Mora 2 meses&nbsp;</span>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-4 text-right">
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