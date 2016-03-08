<?php
session_start();
require_once ("../conexion/conexion.php");
require_once ("../php/funciones.php");
//////////////////////////////////////////////////////////////////////////////////////
// Aplicación PHP usando Bootstrap, jquery, HTML5 y CSS - PH                        //
// Copyright 2014 Wilson Giovanny Velandia Barreto 3204274564 - willyv78@gmail.com  //
//////////////////////////////////////////////////////////////////////////////////////

$apto_id = $_GET['id_apto'];
$tipo_nom = $_GET['tipo_nom'];
    
$res_autori = registroCampo("rmb_vulnera v", "v.rmb_vulnera_id, v.rmb_tvulnera_id, v.rmb_vulnera_obs", "WHERE v.rmb_aptos_id = '$apto_id'", "", "");
?>
<div class="panel-body">
    <table class="table table-hover">
        <thead>
            <tr>
                <th class='col-xs-7 col-sm-4 col-md-2 col-lg-3 text-center'>Tipo</th>
                <th class='hidden-xs col-sm-4 col-md-6 col-lg-6 text-center'>Observación</th>
                <th class='col-xs-5 col-sm-4 col-md-4 col-lg-3 text-center'>
                    <input id="tipo_nom" name="tipo_nom" type="hidden" value="<?php echo $tipo_nom;?>">
                    <span class="col-xs-12 col-sm-12 col-md-12 col-lg-12 btn btn-warning" title="Nuevo registro"><i class="glyphicon glyphicon-plus"></i></span>
                </th>
            </tr>
        </thead>
        <tbody><?php 
        if($res_autori){
            if(mysql_num_rows($res_autori) > 0){
                while ($row_autori = mysql_fetch_array($res_autori)) {?>
                    <tr class="">
                        <td class='col-xs-7 col-sm-4 col-md-2 col-lg-2 text-center'><?php echo nombreCampo($row_autori[1], "rmb_tvulnera");?></td>
                        <td class='hidden-xs col-sm-4 col-md-6 col-lg-6 text-center'><?php echo $row_autori[2];?></td>
                        <td class='col-xs-5 col-sm-4 col-md-4 col-lg-4 text-center'>
                            <div name="<?php echo $row_autori[0];?>" class="input-group input-group-md btn_est">
                                <span class="btn btn-info input-group-addon" title="Ver Información"><i class="glyphicon glyphicon-eye-open"></i></span>
                                <span class="btn btn-success input-group-addon" title="Editar Información"> <i class="glyphicon glyphicon-pencil"></i></span>
                                <span class="btn btn-danger input-group-addon" name="perm" title="Eliminar"> <i class="glyphicon glyphicon-remove"></i></span>
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
<script>accionListaVuln();</script>