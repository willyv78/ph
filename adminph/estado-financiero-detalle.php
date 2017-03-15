<?php session_start();
require_once ("../conexion/conexion.php");
require_once ("../php/funciones.php");
//////////////////////////////////////////////////////////////////////////////////////
// Aplicación PHP usando Bootstrap, jquery, HTML5 y CSS - PH                        //
// Copyright 2014 Wilson Giovanny Velandia Barreto 3204274564 - willyv78@gmail.com  //
//////////////////////////////////////////////////////////////////////////////////////
$id_proy = $_SESSION['ProyId'];
$id_tes = $_GET['id_tes'];
$mes = $_GET['mes'];
$anio = $_GET['anio'];
$id_apto = $_GET['id_apto'];?>

<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 class-edit-cobro"><?php 
    $res_concept = registroCampo("rmb_tes_concep c", "tp.rmb_tpago_nom, tp.rmb_tpago_ope, c.rmb_tes_concep_cant, c.rmb_tes_concep_val", "LEFT JOIN rmb_tpago tp USING(rmb_tpago_id) WHERE c.rmb_tesoreria_id = '".$id_tes."'", "", "");
    if($res_concept){
        if(mysql_num_rows($res_concept) > 0){?>
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="col-xs-10 col-sm-10 col-md-10 col-lg-10"><strong>Concepto</strong></div>
                <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 text-right"><strong>Valor</strong></div><?php
                while($row_concept = mysql_fetch_array($res_concept)){

                    // Obtenemos el primer dia del mes
                    $fecha_anyomes = new DateTime($anio."-".$mes);
                    $fecha_primerdia = $fecha_anyomes->modify('first day of this month');
                    $primer_dia = $fecha_primerdia->format('d');
                    // Obtenemos el ultimo del dia del mes
                    $fecha_ultimodia = $fecha_anyomes->modify('last day of this month');
                    $ultimo_dia = $fecha_ultimodia->format('d');
                    // se arma las fechas de inicio del mes y la final del mes
                    $fpag = $anio."-".$mes."-".$primer_dia;
                    $fven = $anio."-".$mes."-".$ultimo_dia;
                    // echo "fecha de pag0:".$fpag." fecha vence:".$fven;
                    // inicializamos la variable lo que debe
                    $debe = 0;
                    $res_debe = registroCampo("rmb_tesoreria tes", "SUM(tes.rmb_tesoreria_val)", "WHERE tes.rmb_aptos_id = '$id_apto' AND tes.rmb_tesoreria_fpag < '$fpag'", "GROUP BY tes.rmb_aptos_id", "ORDER BY tes. rmb_tesoreria_fpag DESC");
                    if($res_debe){
                        // echo "SELECT SUM(tes.rmb_tesoreria_val) FROM rmb_tesoreria tes WHERE tes.rmb_aptos_id = '$id_apto' AND tes.rmb_tesoreria_fpag < '$fpag' GROUP BY tes.rmb_aptos_id ORDER BY tes. rmb_tesoreria_fpag DESC";
                        if(mysql_num_rows($res_debe) > 0){
                            $row_debe = mysql_fetch_array($res_debe);
                            $debe = $row_debe[0];
                        }
                    }
                    // Inicializamos la variable de lo que pago
                    $pago = 0;
                    $res_pago = registroCampo("rmb_pagos p", "SUM(p.rmb_pagos_valor)", "LEFT JOIN rmb_tesoreria tes USING(rmb_tesoreria_id) WHERE tes.rmb_aptos_id = '$id_apto' AND p.rmb_pagos_fpago < '$fven'", "GROUP BY p.rmb_tesoreria_id", "ORDER BY p.rmb_pagos_id DESC");
                    if($res_pago){
                        // echo "SELECT SUM(p.rmb_pagos_valor) FROM rmb_pagos p LEFT JOIN rmb_tesoreria tes USING(rmb_tesoreria_id) WHERE tes.rmb_aptos_id = '$id_apto' AND p.rmb_pagos_fpago < '$fven' GROUP BY p.rmb_tesoreria_id ORDER BY p.rmb_pagos_id DESC";
                        if(mysql_num_rows($res_pago) > 0){
                            $row_pago = mysql_fetch_array($res_pago);
                            $pago = $row_pago[0];
                        }
                    }
                    $tiene = $pago - $debe;
                    // echo "pago=".$pago." debe=".$debe."<br>";
                    if($tiene < 0){$total = ($tiene * -1) + $tes_val;}
                    else{$total = $tiene - $tes_val;}
                    if($total < 0){$total = $total * -1;}?>
                    <div class="col-xs-10 col-sm-10 col-md-10 col-lg-10 text-left">
                        <?php echo $row_concept[0];?>  
                    </div>
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
                <div data-id="<?php echo $id_tes;?>" class="btn-group pull-right">
                    <button type="button" class="btn btn-default btn-editar">Editar Cobro</button>
                </div>
            </div><?php 
        }
    }?>
</div>
<script>cargaEstadoFinanciero();</script>
<!-- FIN Pagina estado financiero -->