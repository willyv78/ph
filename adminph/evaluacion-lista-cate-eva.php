<?php
session_start();
require_once ("../conexion/conexion.php");
require_once ("../php/funciones.php");
//////////////////////////////////////////////////////////////////////////////////////
// Aplicación PHP usando Bootstrap, jquery, HTML5 y CSS - PH                        //
// Copyright 2014 Wilson Giovanny Velandia Barreto 3204274564 - willyv78@gmail.com  //
//////////////////////////////////////////////////////////////////////////////////////

$id_eva = "";
$disabled = "";
if(isset($_GET['id_eva'])){
    $id_eva = $_GET['id_eva'];
}
if(isset($_GET['ver'])){
    $ver = $_GET['ver'];
    $disabled = "disabled";
}
    
$res_cate_eva = registroCampo("rmb_eva_cate_x_eva ce", "ce.rmb_eva_cate_x_eva_id, ce.rmb_eva_cate_x_eva_peso, ce.rmb_eva_cate_x_eva_punt, c.rmb_eva_cate_nom", "LEFT JOIN rmb_eva_cate c USING(rmb_eva_cate_id) WHERE ce.rmb_eva_id = '$id_eva'", "", "ORDER BY c.rmb_eva_cate_nom");
?>
<div class="panel-body">
    <table class="table table-hover">
        <thead>
            <tr>
                <th class='col-xs-7 col-sm-4 col-md-2 col-lg-3 text-center'>Nombre</th>
                <th class='hidden-xs col-sm-4 col-md-3 col-lg-3 text-center'>Peso</th>
                <th class='hidden-xs hidden-sm col-md-3 col-lg-3 text-center'>Puntaje</th>
                <th class='col-xs-5 col-sm-4 col-md-4 col-lg-3 text-center'>
                    <span class="col-xs-12 col-sm-12 col-md-12 col-lg-12 btn btn-warning btn-accion-cate-eva <?php echo $disabled;?>" title="Nuevo registro"><i class="glyphicon glyphicon-plus"></i></span>
                </th>
            </tr>
        </thead>
        <tbody><?php 
        if($res_cate_eva){
            if(mysql_num_rows($res_cate_eva) > 0){
                while ($row_cate_eva = mysql_fetch_array($res_cate_eva)) {?>
                    <tr class="">
                        <td class='col-xs-7 col-sm-4 col-md-2 col-lg-2 text-center'><?php echo $row_cate_eva[3];?></td>
                        <td class='hidden-xs col-sm-4 col-md-3 col-lg-3 text-center'><?php echo $row_cate_eva[1];?></td>
                        <td class='hidden-xs hidden-sm col-md-3 col-lg-3 text-center'><?php echo $row_cate_eva[2];?></td>

                        <td class="vertical-middle lista_cate-eva" name="<?php echo $row_cate_eva[0];?>">

                            <button type="button" class="btn btn-default btn-accion-cate-eva <?php echo $disabled;?>" title="Consultar información" alt="Consultar información" style="padding: 5px 10px;width: 32%;">
                                <i class="glyphicon glyphicon-eye-open"></i>
                            </button>

                            <button type="button" class="btn btn-default btn-accion-cate-eva <?php echo $disabled;?>" title="Editar Información" alt="Editar Información" style="padding: 5px 10px;width: 32%;">
                                <i class="glyphicon glyphicon-pencil"></i>
                            </button>

                            <button type="button" class="btn btn-default btn-accion-cate-eva <?php echo $disabled;?>" title="Borrar registro" alt="Borrar registro" style="padding: 5px 10px;width: 32%;">
                                <i class="glyphicon glyphicon-remove"></i>
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
<script>accionListaCateEva();</script>