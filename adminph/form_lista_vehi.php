<?php
session_start();
require_once ("../conexion/conexion.php");
require_once ("../php/funciones.php");
//////////////////////////////////////////////////////////////////////////////////////
// Aplicación PHP usando Bootstrap, jquery, HTML5 y CSS - PH                        //
// Copyright 2014 Wilson Giovanny Velandia Barreto 3204274564 - willyv78@gmail.com  //
//////////////////////////////////////////////////////////////////////////////////////

$id_apto = "";$id_vehi = "";$veh_id = "";$veh_placa = "";$veh_marca = "";$veh_mod = "";$veh_color = "";$veh_obs = "";$veh_tipo = "";$veh_parq = "";
if(isset($_GET['id_apto'])){
    $id_apto = $_GET['id_apto'];
}
if(isset($_GET['id_vehi'])){
    $id_vehi = $_GET['id_vehi'];
    $res_veh = registroCampo("rmb_veh v", "*", "WHERE v.rmb_veh_id = '$id_vehi'", "", "");
    if($res_veh){
        if(mysql_num_rows($res_veh) > 0){
            $row_veh = mysql_fetch_array($res_veh);
            $veh_id = $row_veh[0];
            $veh_placa = $row_veh[1];
            $veh_marca = $row_veh[2];
            $veh_mod = $row_veh[3];
            $veh_color = $row_veh[4];
            $veh_obs = $row_veh[5];
            $veh_tipo = $row_veh[6];
            $veh_parq = $row_veh[7];
        }
    }
}
?>
<div class="text-left">
    <form id="form_vehi" name="form_vehi" action="" method="POST" class="form-horizontal" role="form" enctype="multipart/form-data">
        <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <label class="col-xs-12 col-sm-5 col-md-5 col-lg-5 control-label" for="rmb_veh_placa">Placa: </label>
            <div class="col-xs-10 col-sm-5 col-md-5 col-lg-5">
                <input type="text" name="rmb_veh_placa" id="rmb_veh_placa" class="form-control" value="<?php echo $veh_placa;?>" placeholder="Placa del Vehículo">
            </div>
        </div>
        <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <label class="col-xs-12 col-sm-5 col-md-5 col-lg-5 control-label" for="rmb_veh_marca">Marca: </label>
            <div class="col-xs-10 col-sm-5 col-md-5 col-lg-5">
                <input type="text" name="rmb_veh_marca" id="rmb_veh_marca" class="form-control" value="<?php echo $veh_marca;?>" placeholder="Marca del Vehículo">
            </div>
        </div>
        <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <label class="col-xs-12 col-sm-5 col-md-5 col-lg-5 control-label" for="rmb_veh_mod">Modelo: </label>
            <div class="col-xs-10 col-sm-5 col-md-5 col-lg-5">
                <input type="text" name="rmb_veh_mod" id="rmb_veh_mod" class="form-control" value="<?php echo $veh_mod;?>" placeholder="Modelo del Vehículo">
            </div>
        </div>
        <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <label class="col-xs-12 col-sm-5 col-md-5 col-lg-5 control-label" for="rmb_veh_color">Color: </label>
            <div class="col-xs-10 col-sm-5 col-md-5 col-lg-5">
                <input type="text" name="rmb_veh_color" id="rmb_veh_color" class="form-control" value="<?php echo $veh_color;?>" placeholder="Color del Vehículo">
            </div>
        </div>
        <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <label class="col-xs-12 col-sm-5 col-md-5 col-lg-5 control-label" for="rmb_tveh_id">Tipo: </label>
            <div class="col-xs-10 col-sm-5 col-md-5 col-lg-5"><?php 
                echo campoSelect($veh_tipo, "rmb_tveh");?>
            </div>
        </div>
        <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <label class="col-xs-12 col-sm-5 col-md-5 col-lg-5 control-label" for="rmb_parq_id">Parqueadero: </label>
            <div class="col-xs-10 col-sm-5 col-md-5 col-lg-5"><?php 
                echo campoSelectMaster("rmb_parq p", $veh_parq, "p.rmb_parq_id, p.rmb_parq_nom, z.rmb_zonas_nom, t.rmb_torres_nom", "LEFT JOIN rmb_zonas z USING (rmb_zonas_id) LEFT JOIN rmb_torres t USING (rmb_torres_id) WHERE (p.rmb_aptos_id = '$id_apto')", "", "ORDER BY LENGTH(p.rmb_parq_nom), p.rmb_parq_nom, p.rmb_zonas_id ASC");?>
            </div>
        </div>
        <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <label class="col-xs-12 col-sm-5 col-md-5 col-lg-5 control-label" for="rmb_veh_obs">Observación: </label>
            <div class="col-xs-10 col-sm-5 col-md-5 col-lg-5">
                <textarea name="rmb_veh_obs" id="rmb_veh_obs" class="form-control" rows="3" placeholder="Observaciones"><?php echo $veh_obs;?></textarea>
            </div>
        </div>
        <div class="clearfix">&nbsp;</div>
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center"><?php 
            if($id_vehi){?>
                <input type="hidden" name="id_upd" id="id_upd" class="form-control" value="<?php echo $id_vehi;?>">
            <?php }?>
            <input type="hidden" name="id_apto" id="id_apto" class="form-control" value="<?php echo $id_apto;?>">
            <button type="submit" class="btn" alt="Ingresar / Actualizar datos del vehículo" title="Ingresar / Actualizar datos del vehículo" style="border: none;background-color: transparent;"><img src="../css/plantilla1/img/actualizar.png" alt=""></button>
        </div>
        <div class="clearfix">&nbsp;</div>
    </form>
</div>
<div class="clearfix">&nbsp;</div>
<script>
    $(document).ready(function() {
        setTimeout(esperehide, 1000);
        var id_apto = '<?php echo $id_apto;?>';
        // Validación formulario de datos del propietario
        $('#form_vehi').bootstrapValidator({
            message: 'Este valor no es valido',
            feedbackIcons: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                rmb_veh_placa: {
                    message: 'La placa o identificación no es valido',
                    validators: {
                        notEmpty: {
                            message: 'La placa o identificación es requerido'
                        }
                    }
                },
                rmb_tveh_id: {
                    message: 'El tipo de Vehículo no es valido',
                    validators: {
                        notEmpty: {
                            message: 'El tipo de Vehículo es requerido'
                        }
                    }
                }
            }
        })
        .on('success.form.bv', function(e) {
            // Prevent form submission
            e.preventDefault();
            espereshow();
            var datos_form = new FormData($("#form_vehi")[0]);
            $.ajax({
                url:"../php/ins_upd_vehi.php",
                cache:false,
                type:"POST",
                contentType:false,
                data:datos_form,
                processData:false,
                success: function(datos){
                    if(datos !== ''){
                        // alert(datos);
                        $("#col-md-12").load('detalle-del-apartamento.php?id_apto='+id_apto);
                        swal({
                            title: "Felicidades!",
                            text: "El registro se ha guardado correctamente!",
                            type: "success",
                            confirmButtonText: "Continuar",
                            confirmButtonColor: "#94B86E"
                        },
                        function(){
                            $("#vehiculo").addClass('activo');
                            pag = "lista_vehiculos.php?id_apto="+id_apto+"&tipo_nom=vehiculos";
                            $("#vehiculo").parent().next().load(pag);
                            $("#vehiculo").parent().next().show();
                        });
                    }
                    else{
                        setTimeout(esperehide, 1000);
                        swal({
                            title: "Error!",
                            text: "Ha ocurrido un error,\nNo se ha realizado cambios,\nrevise la información diligenciada he intentelo nuevamente.",
                            type: "error",
                            confirmButtonText: "Aceptar",
                            confirmButtonColor: "#E25856"
                        });
                        return;
                    }
                }
            });
        });
    });
</script>