<?php
session_start();
require_once ("../conexion/conexion.php");
require_once ("../php/funciones.php");
//////////////////////////////////////////////////////////////////////////////////////
// Aplicación PHP usando Bootstrap, jquery, HTML5 y CSS - PH                        //
// Copyright 2014 Wilson Giovanny Velandia Barreto 3204274564 - willyv78@gmail.com  //
//////////////////////////////////////////////////////////////////////////////////////

$apto_id = "";
$tipo_res = "";
$tipo_nom = "";
$num_hab = 0;
$res_autori = false;
$where = "";

if(isset($_GET['id_apto'])){
    $apto_id = $_GET['id_apto'];
}
if(isset($_GET['tipo_res'])){
    $tipo_res = $_GET['tipo_res'];
}
if(isset($_GET['tipo_nom'])){
    $tipo_nom = $_GET['tipo_nom'];
}
// validamos el tipo de residente para mostrar el titulo de la tercera columna de la tabla de acuerdo a este
if($tipo_res == '1'){
    $col_nom_3 = "¿Vive aquí?";
}
elseif($tipo_res == '2'){
    $col_nom_3 = "Vínculo";
    $where = "OR r.rmb_residente_vive = '1'";
}
elseif($tipo_res == '5'){
    $col_nom_3 = "Foto";
}
elseif($tipo_res == '9'){
    $col_nom_3 = "Teléfono";
}
else{
    $col_nom_3 = "Vínculo";
}

if($apto_id && $tipo_res){
    $res_autori = registroCampo("rmb_residente_x_aptos rxa", "r.rmb_residente_id, r.rmb_residente_nom, r.rmb_residente_ape, r.rmb_vinculo_id, r.rmb_residente_vive, r.rmb_residente_tel, r.rmb_residente_cel, r.rmb_residente_foto, r.rmb_gen_id, rxa.rmb_tres_id", "LEFT JOIN rmb_residente r USING(rmb_residente_id) WHERE rxa.rmb_aptos_id = '$apto_id' AND (rxa.rmb_tres_id = '".$tipo_res."' $where)", "", "ORDER BY rxa.rmb_tres_id ASC");
}
// Numero de habitantes en el apto
$res_apto = registroCampo("rmb_aptos a", "a.rmb_aptos_numhab", "WHERE a.rmb_aptos_id = '$apto_id'", "", "");
if($res_apto){
    if(mysql_num_rows($res_apto) > 0){
        $row_apto = mysql_fetch_array($res_apto);
        $num_hab = $row_apto[0];
    }
}
?>
<div class="panel-body">
    <table class="table table-hover">
        <thead>
            <tr>
                <th class='col-xs-7 col-sm-4 col-md-2 col-lg-3 text-center'>Nombres</th>
                <th class='hidden-xs col-sm-4 col-md-3 col-lg-3 text-center'>Apellidos</th>
                <th class='hidden-xs hidden-sm col-md-3 col-lg-3 text-center'><?php echo $col_nom_3;?></th>
                <th class='col-xs-5 col-sm-4 col-md-4 col-lg-3 text-center'>
                    <input id="tipo_res" name="tipo_res" type="hidden" value="<?php echo $tipo_res;?>">
                    <input id="tipo_nom" name="tipo_nom" type="hidden" value="<?php echo $tipo_nom;?>"><?php 
                    if($tipo_res <> '2'){?>
                        <span class="col-xs-12 col-sm-12 col-md-12 col-lg-12 btn btn-warning" title="Nuevo registro"><i class="glyphicon glyphicon-plus"></i></span><?php 
                    }?>
                </th>
            </tr>
        </thead>
        <tbody><?php 
        if($res_autori){
            if(mysql_num_rows($res_autori) > 0){
                $num_res = mysql_num_rows($res_autori);
                while ($row_autori = mysql_fetch_array($res_autori)) {
                    // validamos el tipo de residente para mostrar el titulo de la tercera columna de la tabla de acuerdo a este
                    if($tipo_res == '1'){
                        if($row_autori[4] == '1'){
                            $vive = "SI";
                        }
                        else{
                            $vive = "NO";
                        }
                        $col_val_3 = $vive;
                    }
                    elseif($tipo_res == '2'){
                        if(($row_autori[3] == '') || ($row_autori[3] == NULL) || ($row_autori[3] == 0)){
                            $col_val_3 = nombreCampo($row_autori[9], "rmb_tres");
                        }
                        else{
                            $col_val_3 = nombreCampo($row_autori[3], "rmb_vinculo");
                        }
                    }
                    elseif($tipo_res == '9'){
                        $col_val_3 = $row_autori[5]." ".$row_autori[6];
                    }
                    elseif($tipo_res == '5'){
                        $col_val_3 = $row_autori[7];
                        if(!$col_val_3){
                            $col_val_3 = "<img src='../images/fotos/man.jpeg' class='img-responsive' alt='Image' style='margin: auto;width:20%;'>";
                            if($row_autori[8] == '2'){
                                $col_val_3 = "<img src='../images/fotos/woman.jpeg' class='img-responsive' alt='Image' style='margin: auto;width: 20%;'>";
                            }
                        }
                        else{
                            $col_val_3 = "<img src='".$col_val_3."' class='img-responsive' alt='Image' style='margin: auto;width: 20%;'>";
                        }
                    }
                    else{
                        $col_val_3 = nombreCampo($row_autori[3], "rmb_vinculo");
                    }?>
                    <tr class="">
                        <td class='col-xs-7 col-sm-4 col-md-2 col-lg-2 text-center vertical-middle'><?php echo $row_autori[1];?></td>
                        <td class='hidden-xs col-sm-4 col-md-3 col-lg-3 text-center vertical-middle'><?php echo $row_autori[2];?></td>
                        <td class='hidden-xs hidden-sm col-md-3 col-lg-3 text-center vertical-middle'><?php echo $col_val_3;?></td>
                        <td class='col-xs-5 col-sm-4 col-md-4 col-lg-4 text-center vertical-middle'>
                            <div name="<?php echo $row_autori[0];?>" class="input-group input-group-md btn_est">
                                <span class="btn btn-info input-group-addon" title="Ver Información"><i class="glyphicon glyphicon-eye-open"></i></span><?php 
                                if((($tipo_res <> '2') && ($row_autori[9] <> '2')) || (($tipo_res == '2') && ($row_autori[9] == '2'))){?>
                                    <span class="btn btn-success input-group-addon" title="Editar Información"> <i class="glyphicon glyphicon-pencil"></i></span>
                                    <span class="btn btn-danger input-group-addon" name="perm" title="Eliminar"> <i class="glyphicon glyphicon-remove"></i></span><?php 
                                }?>
                            </div>
                        </td>
                    </tr><?php 
                }
            }
            else{
                if($tipo_res <> '2'){?>
                    <tr>
                        <td colspan="4">
                            <div class="input-group input-group-md btn_est">
                                No se encontró información
                            </div>
                        </td>
                    </tr><?php 
                }
            }
        }
        else{
            if($tipo_res <> '2'){?>
                <tr>
                    <td colspan="4">
                        <div class="input-group input-group-md btn_est">
                            No se encontró información
                        </div>
                    </td>
                </tr><?php 
            }
        }

        if($tipo_res == '2'){
            if($num_hab > 0){
                if($num_res < $num_hab){
                    $num_dif = $num_hab - $num_res;
                    for($i = 0; $i < $num_dif; $i++){?>
                        <tr class="">
                            <td class='col-xs-7 col-sm-4 col-md-2 col-lg-2 text-center vertical-middle'>N/A</td>
                            <td class='hidden-xs col-sm-4 col-md-3 col-lg-3 text-center vertical-middle'>N/A</td>
                            <td class='hidden-xs hidden-sm col-md-3 col-lg-3 text-center vertical-middle'>N/A</td>
                            <td class='col-xs-5 col-sm-4 col-md-4 col-lg-4 text-center vertical-middle'>
                                <div name="" class="input-group input-group-md btn_est">
                                    <span class="btn btn-success input-group-addon" title="Nuevo registro"><i class="glyphicon glyphicon-pencil"></i></span>
                                </div>
                            </td>
                        </tr><?php 
                    }
                }
            }
        }
        ?>
        </tbody>
    </table>
</div>
<script>accionLista();</script>