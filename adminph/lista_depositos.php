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
    
$res_autori = registroCampo("rmb_depos d", "d.rmb_depos_id, d.rmb_depos_nom, t.rmb_torres_nom, z.rmb_zonas_nom", "LEFT JOIN rmb_zonas z USING(rmb_zonas_id) LEFT JOIN rmb_torres t USING(rmb_torres_id) WHERE d.rmb_aptos_id = '$apto_id'", "", "");
?>
<div class="panel-body">
    <table class="table table-hover">
        <thead>
            <tr>
                <th class='col-xs-7 col-sm-4 col-md-2 col-lg-3 text-center'>Depósito</th>
                <th class='hidden-xs col-sm-4 col-md-3 col-lg-3 text-center'>Torre</th>
                <th class='hidden-xs hidden-sm col-md-3 col-lg-3 text-center'>Ubicación</th>
                <th class='col-xs-5 col-sm-4 col-md-4 col-lg-3 text-center'>
                    <input id="tipo_nom" name="tipo_nom" type="hidden" value="<?php echo $tipo_nom;?>">
                    <span class="col-xs-12 col-sm-12 col-md-12 col-lg-12 btn btn-warning" title="Nuevo registro"><i class="glyphicon glyphicon-plus"></i></span>
                </th>
            </th>
            </tr>
        </thead>
        <tbody><?php 
        if($res_autori){
            if(mysql_num_rows($res_autori) > 0){
                while ($row_autori = mysql_fetch_array($res_autori)) {?>
                    <tr class="">
                        <td class='col-xs-7 col-sm-4 col-md-2 col-lg-2 text-center vertical-middle'><?php echo $row_autori[1];?></td>
                        <td class='hidden-xs col-sm-4 col-md-3 col-lg-3 text-center vertical-middle'><?php echo $row_autori[2];?></td>
                        <td class='hidden-xs hidden-sm col-md-3 col-lg-3 text-center vertical-middle'><?php echo $row_autori[3];?></td>
                        <td class='col-xs-5 col-sm-4 col-md-4 col-lg-4 text-center vertical-middle'>
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
<script>accionListaDepos();</script>