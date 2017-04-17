<?php
session_start();
require_once ("../conexion/conexion.php");
require_once ("../php/funciones.php");
//////////////////////////////////////////////////////////////////////////////////////
// Aplicación PHP usando Bootstrap, jquery, HTML5 y CSS - PH                        //
// Copyright 2014 Wilson Giovanny Velandia Barreto 3204274564 - willyv78@gmail.com  //
//////////////////////////////////////////////////////////////////////////////////////

$disabled = "";
$id_eva = "";
$res_cate_eva = false;
if(isset($_GET['id_ver']) || isset($_GET['id_upd'])){
    if(isset($_GET['id_ver'])){
        $id_eva = $_GET['id_ver'];
        $disabled = "disabled";
    }
    else{
        $id_eva = $_GET['id_upd'];
        $disabled = "";
    }

    $res_cate_eva = registroCampo("rmb_eva_cate_x_eva ce", "ce.rmb_eva_cate_x_eva_id, ce.rmb_eva_cate_x_eva_peso, ce.rmb_eva_cate_x_eva_punt, c.rmb_eva_cate_nom, ce.rmb_eva_cate_id", "LEFT JOIN rmb_eva_cate c USING(rmb_eva_cate_id) WHERE ce.rmb_eva_id = '$id_eva'", "", "ORDER BY c.rmb_eva_cate_nom");

}
?>
<!-- Titulo de la pagina -->
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 titulo-pagina">
   <input id="id_eva" name="id_eva" type="hidden" value="<?php echo $id_eva;?>">
   <h3 class="text-left">Evaluación: <?php echo nombreCampo($id_eva, "rmb_eva");?><button type="button" class="btn btn-default btn-lg btn-regresar pull-right" style="margin-bottom: 10px;margin-top: -10px;">Regresar</button></h3>
</div>
<div class="clearfix">&nbsp;</div>
<div id="categorias-evaluacion" class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
    <div class="panel-body">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th class='col-xs-8 col-sm-6 col-md-4 col-lg-4 text-center'>Nombre</th>
                    <th class='hidden-xs hidden-sm col-md-2 col-lg-2 text-center'>Peso</th>
                    <th class='hidden-xs hidden-sm col-md-2 col-lg-2 text-center'>Puntaje</th>
                    <th class='hidden-xs col-sm-2 col-md-2 col-lg-2 text-center'>Calificación</th>
                    <th class='col-xs-4 col-sm-4 col-md-2 col-lg-2 text-center'>Calificar</th>
                </tr>
            </thead>
            <tbody><?php 
            if($res_cate_eva){
                if(mysql_num_rows($res_cate_eva) > 0){
                    while ($row_cate_eva = mysql_fetch_array($res_cate_eva)) {
                        $total = 0;
                        $res_cal_tema_cate_eva = registroCampo("rmb_eva_tema_x_cate_cal cal", "SUM(cal.rmb_eva_tema_x_cate_cal_cal), COUNT(cal.rmb_eva_tema_x_cate_cal_cal)", "LEFT JOIN rmb_eva_tema_x_cate tc USING(rmb_eva_tema_x_cate_id) WHERE tc.rmb_eva_cate_id = ".$row_cate_eva[4]." AND rmb_residente_id = ".$_SESSION['UsuID'], "", "");
                        if($res_cal_tema_cate_eva){
                            if(mysql_num_rows($res_cal_tema_cate_eva) > 0){
                                $row_cal_tema_cate_eva = mysql_fetch_array($res_cal_tema_cate_eva);
                                $cal = $row_cal_tema_cate_eva[0];
                                $can = $row_cal_tema_cate_eva[1];
                                $total = $cal / $can;
                                if($total < 1){$total = 0;}
                            }
                        }?>
                        <tr class="">
                            <td class='col-xs-7 col-sm-4 col-md-4 col-lg-4 text-center'><?php echo $row_cate_eva[3];?></td>
                            <td class='hidden-xs col-sm-4 col-md-2 col-lg-2 text-center'><?php echo $row_cate_eva[1];?></td>
                            <td class='hidden-xs hidden-sm col-md-2 col-lg-2 text-center'><?php echo $row_cate_eva[2];?></td>
                            <td class='hidden-xs hidden-sm col-md-2 col-lg-2 text-center'><?php echo $total;?></td>

                            <td class="vertical-middle lista-cate-eva" name="<?php echo $row_cate_eva[4];?>">
                                <button type="button" class="btn btn-default btn-accion" title="Calificar Categoría" alt="Calificar Categoría" style="padding: 5px 10px;"><?php 
                                for($i = 1; $i <= 5; $i++){
                                    if($i > $total){$clase = "glyphicon-star-empty";}
                                    else{$clase = "glyphicon-star";}
                                    echo '<i class="glyphicon '.$clase.'"></i>';
                                }?>
                                </button>
                            </td>

                        </tr><?php 
                    }
                }
                else{?>
                    <tr>
                        <td colspan="4">
                            <div class="input-group input-group-md btn_est">
                                No se encontró información
                            </div>
                        </td>
                    </tr><?php 
                }
            }
            else{?>
                <tr>
                    <td colspan="4">
                        <div class="input-group input-group-md btn_est">
                            No se encontró información
                        </div>
                    </td>
                </tr><?php 
            }?>
            </tbody>
        </table>
    </div>
</div>
<script>
    $(document).ready(function() {
        cargaFormCalificaEva();
    });
</script>