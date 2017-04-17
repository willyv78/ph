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
$res_cate_eva = false;
if(isset($_GET['ver'])){
    $ver = $_GET['ver'];
    $disabled = "disabled";
}
if((isset($_GET['id_eva'])) && (isset($_GET['id_cat']))){
    $id_eva = $_GET['id_eva'];
    $id_cat = $_GET['id_cat'];
    $res_cate_eva = registroCampo("rmb_eva_tema_x_cate tc", "tc.rmb_eva_tema_x_cate_id, t.rmb_eva_tema_nom", "LEFT JOIN rmb_eva_tema t USING(rmb_eva_tema_id) WHERE rmb_eva_cate_id = $id_cat AND rmb_eva_id = $id_eva", "", "ORDER BY t.rmb_eva_tema_nom ASC");
}?>
<div class="panel-body">
    <table class="table table-hover">
        <thead>
            <tr>
                <th class='col-xs-7 col-sm-8 col-md-8 col-lg-8 text-center'>Tema</th>
                <th class='col-xs-5 col-sm-4 col-md-4 col-lg-4 text-center'>
                    <span class="col-xs-12 col-sm-12 col-md-12 col-lg-12 btn btn-warning btn-accion-tema-cate-eva <?php echo $disabled;?>" title="Nuevo registro"><i class="glyphicon glyphicon-plus"></i></span>
                </th>
            </tr>
        </thead>
        <tbody><?php 
        if($res_cate_eva){
            if(mysql_num_rows($res_cate_eva) > 0){
                while ($row_cate_eva = mysql_fetch_array($res_cate_eva)) {?>
                    <tr class="">
                        <td class='col-xs-7 col-sm-8 col-md-8 col-lg-8 text-center'><?php echo $row_cate_eva[1];?></td>
                        <td class="vertical-middle lista-tema-cate-eva" name="<?php echo $row_cate_eva[0];?>">

                            <button type="button" class="btn btn-default btn-accion-tema-cate-eva <?php echo $disabled;?>" title="Consultar información" alt="Consultar información" style="padding: 5px 10px;width: 32%;">
                                <i class="glyphicon glyphicon-eye-open"></i>
                            </button>

                            <button type="button" class="btn btn-default btn-accion-tema-cate-eva <?php echo $disabled;?>" title="Editar Información" alt="Editar Información" style="padding: 5px 10px;width: 32%;">
                                <i class="glyphicon glyphicon-pencil"></i>
                            </button>

                            <button type="button" class="btn btn-default btn-accion-tema-cate-eva <?php echo $disabled;?>" title="Borrar registro" alt="Borrar registro" style="padding: 5px 10px;width: 32%;">
                                <i class="glyphicon glyphicon-remove"></i>
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
<script>accionListaTemaCateEva();</script>