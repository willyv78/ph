<?php
session_start();
require_once ("../conexion/conexion.php");
require_once ("../php/funciones.php");
//////////////////////////////////////////////////////////////////////////////////////
// Aplicación PHP usando Bootstrap, jquery, HTML5 y CSS - PH                        //
// Copyright 2014 Wilson Giovanny Velandia Barreto 3204274564 - willyv78@gmail.com  //
//////////////////////////////////////////////////////////////////////////////////////

$id_cat = "";
$id_eva = "";
$disabled = "";
$cal = 0;
$res_tema_eva = false;
if(isset($_GET['ver'])){
    $ver = $_GET['ver'];
    $disabled = "disabled";
}
if((isset($_GET['id_eva'])) && (isset($_GET['id_cat']))){
    $id_eva = $_GET['id_eva'];
    $id_cat = $_GET['id_cat'];
    $res_tema_eva = registroCampo("rmb_eva_tema_x_cate tc", "tc.rmb_eva_tema_x_cate_id, t.rmb_eva_tema_nom", "LEFT JOIN rmb_eva_tema t USING(rmb_eva_tema_id) WHERE rmb_eva_cate_id = $id_cat AND rmb_eva_id = $id_eva", "", "ORDER BY t.rmb_eva_tema_nom ASC");
}?>
<!-- Titulo de la pagina -->
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 titulo-pagina">
    <input id="id_eva" name="id_eva" type="hidden" value="<?php echo $id_eva;?>">
    <input id="id_cat" name="id_cat" type="hidden" value="<?php echo $id_cat;?>">
    <h3 class="text-left">Categoria de la Evaluación: <?php echo nombreCampo($id_cat, "rmb_eva_cate");?><button type="button" class="btn btn-default btn-lg btn-regresar pull-right" style="margin-bottom: 10px;margin-top: -10px;">Regresar</button></h3>
</div>
<div class="clearfix">&nbsp;</div>
<div id="temas-categorias-evaluacion" class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
    <div class="panel-body">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th class='col-xs-7 col-sm-8 col-md-8 col-lg-8 text-center'>Tema</th>
                    <th class='col-xs-5 col-sm-4 col-md-4 col-lg-4 text-center'>Calificar</th>
                </tr>
            </thead>
            <tbody><?php 
            if($res_tema_eva){
                if(mysql_num_rows($res_tema_eva) > 0){
                    while ($row_tema_cate_eva = mysql_fetch_array($res_tema_eva)) {
                        $cal = 0;?>
                        <tr class="">
                            <td class='col-xs-7 col-sm-8 col-md-8 col-lg-8 text-center'><?php echo $row_tema_cate_eva[1];?></td>
                            <td class="vertical-middle lista-tema-cate-eva" name="<?php echo $row_tema_cate_eva[0];?>"><?php 
                                $res_cal_tema_cate_eva = registroCampo("rmb_eva_tema_x_cate_cal cal", "cal.rmb_eva_tema_x_cate_cal_cal", "WHERE cal.rmb_eva_tema_x_cate_id = ".$row_tema_cate_eva[0]." AND rmb_residente_id = ".$_SESSION['UsuID'], "", "");
                                if($res_cal_tema_cate_eva){
                                    if(mysql_num_rows($res_cal_tema_cate_eva) > 0){
                                        $row_cal_tema_cate_eva = mysql_fetch_array($res_cal_tema_cate_eva);
                                        $cal = $row_cal_tema_cate_eva[0];
                                    }
                                }?>
                                <button type="button" class="btn btn-default btn-accion" title="Calificar Tema" alt="Calificar Tema" style="padding: 5px 10px;"><?php 
                                for($i = 1; $i <= 5; $i++){
                                    if($i > $cal){$clase = "glyphicon-star-empty";}
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
                        <td colspan="2">
                            <div class="input-group input-group-md btn_est">
                                No se encontró información
                            </div>
                        </td>
                    </tr><?php 
                }
            }
            else{?>
                <tr>
                    <td colspan="2">
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
        cargaFormCalificaCateEva();
    });
</script>