<?php
session_start();
require_once ("../conexion/conexion.php");
require_once ("../php/funciones.php");
//////////////////////////////////////////////////////////////////////////////////////
// Aplicación PHP usando Bootstrap, jquery, HTML5 y CSS - PH                        //
// Copyright 2014 Wilson Giovanny Velandia Barreto 3204274564 - willyv78@gmail.com  //
//////////////////////////////////////////////////////////////////////////////////////

$proyecto_id = $_GET['id_apto'];
$tipo_res = $_GET['tipo_res'];
$tipo_nom = $_GET['tipo_nom'];
    
$res_autori = registroCampo("rmb_emplados_x_proyecto exp", "r.rmb_residente_id, r.rmb_residente_nom, r.rmb_residente_ape, r.rmb_vinculo_id, r.rmb_residente_vive, r.rmb_residente_tel, r.rmb_residente_cel, r.rmb_residente_foto, r.rmb_gen_id", "LEFT JOIN rmb_residente r USING(rmb_residente_id) WHERE exp.rmb_proyecto_id = '$proyecto_id' AND exp.rmb_tres_id = '".$tipo_res."'", "", "");
// validamos el tipo de residente para mostrar el titulo de la tercera columna de la tabla de acuerdo a este
if($tipo_res == '1'){
    $col_nom_3 = "¿Vive aquí?";
}
elseif($tipo_res == '9'){
    $col_nom_3 = "Teléfono";
}
elseif($tipo_res == '5'){
    $col_nom_3 = "Foto";
}
else{
    $col_nom_3 = "Foto";
}

?>
<!-- Titulo de la pagina -->
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 titulo-pagina">
   <input type="hidden" value="rmb_residente">
   <h3 class="text-left">Lista de Empleados</h3>
</div>
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
    <div class="alert alert-danger text-left">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <strong>Atención!</strong>
          <p>En esta pestaña encontrará la lista de los empleados del edificio registrados en la aplicación.</p>
          <footer>Si no esta seguro de los cambios a realizar o si el cambio afectará el funcionamiento de la aplicación, comuniquese con el desarrollador de la aplicación al correo <cite title="Source Title">info@rmasb.com</cite> o al teléfono <cite title="Source Title">7569919</cite></footer>
          
    </div>
</div>
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
    <div class="table-responsive">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th class='col-xs-7 col-sm-4 col-md-2 col-lg-3 text-center'>Nombres</th>
                    <th class='hidden-xs col-sm-4 col-md-3 col-lg-3 text-center'>Apellidos</th>
                    <th class='hidden-xs hidden-sm col-md-2 col-lg-2 text-center'>Cargo</th>
                    <th class='hidden-xs hidden-sm col-md-2 col-lg-2 text-center'><?php echo $col_nom_3;?></th>
                    <th class='col-xs-5 col-sm-4 col-md-3 col-lg-2 text-center'>
                        <input id="tipo_res" name="tipo_res" type="hidden" value="<?php echo $tipo_res;?>">
                        <input id="tipo_nom" name="tipo_nom" type="hidden" value="<?php echo $tipo_nom;?>">
                        <span class="col-xs-12 col-sm-12 col-md-12 col-lg-12 btn btn-warning" title="Nuevo registro"><i class="glyphicon glyphicon-plus"></i></span>
                    </th>
                </tr>
            </thead>
            <tbody><?php 
            if($res_autori){
                if(mysql_num_rows($res_autori) > 0){
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
                        elseif($tipo_res == '9'){
                            $col_val_3 = $row_autori[5]." ".$row_autori[6];
                        }
                        elseif($tipo_res == '5'){
                            $col_val_3 = $row_autori[7];
                            if(!$col_val_3){
                                $col_val_3 = "<img src='../images/fotos/man.jpeg' class='img-responsive' alt='Image' width='20%' style='margin: auto;'>";
                                if($row_autori[8] == '2'){
                                    $col_val_3 = "<img src='../images/fotos/woman.jpeg' class='img-responsive' alt='Image' width='20%' style='margin: auto;'>";
                                }
                            }
                            else{
                                $col_val_3 = "<img src='".$col_val_3."' class='img-responsive' alt='Image' width='20%' style='margin: auto;'>";
                            }
                        }
                        else{
                            $col_val_3 = nombreCampo($row_autori[3], "rmb_vinculo");
                        }?>
                        <tr class="">
                            <td class='col-xs-7 col-sm-4 col-md-3 col-lg-3 text-center'><?php echo $row_autori[1];?></td>
                            <td class='hidden-xs col-sm-4 col-md-3 col-lg-3 text-center'><?php echo $row_autori[2];?></td>
                            <td class='hidden-xs hidden-sm col-md-2 col-lg-2 text-center'><?php echo $col_val_3;?></td>
                            <td class='hidden-xs hidden-sm col-md-2 col-lg-2 text-center'><?php echo "Temporal";?></td>
                            <td class='col-xs-5 col-sm-4 col-md-3 col-lg-2 text-center'>
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
</div>
<script>accionListaEmp();</script>