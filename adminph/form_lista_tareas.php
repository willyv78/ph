<?php
session_start();
require_once ("../conexion/conexion.php");
require_once ("../php/funciones.php");
//////////////////////////////////////////////////////////////////////////////////////
// Aplicación PHP usando Bootstrap, jquery, HTML5 y CSS - PH                        //
// Copyright 2014 Wilson Giovanny Velandia Barreto 3204274564 - willyv78@gmail.com  //
//////////////////////////////////////////////////////////////////////////////////////

$id_tareas = "";$tareas_id = "";$tareas_nom = "";$tareas_fini = "";$tareas_ffin = "";$tareas_desc = "";$tareas_obs = "";$disabled = "";
if(isset($_GET['id_tareas'])){
    $id_tareas = $_GET['id_tareas'];
    $res_tareas = registroCampo("rmb_calendario c", "c.rmb_calendario_id, c.rmb_calendario_nom, c.rmb_calendario_fini, c.rmb_calendario_ffin, c.rmb_calendario_desc, c.rmb_calendario_det_cada, c.rmb_est_id", "WHERE c.rmb_calendario_id = '$id_tareas'", "", "");
    if($res_tareas){
        if(mysql_num_rows($res_tareas) > 0){
            $row_tareas = mysql_fetch_array($res_tareas);
            $tareas_id = $row_tareas[0];
            $tareas_nom = $row_tareas[1];
            $tareas_fini = $row_tareas[2];
            $tareas_ffin = $row_tareas[3];
            $tareas_desc = $row_tareas[4];
            $tareas_obs = $row_tareas[5];
            $tareas_est = $row_tareas[6];
        }
    }
    $res_aptos_x_tareas = registroCampo("rmb_aptos_x_tareas t", "t.rmb_aptos_nom", "WHERE t.rmb_calendario_id = '$id_tareas'", "", "ORDER BY LENGTH(t.rmb_aptos_nom), t.rmb_aptos_nom ASC");
}
if(isset($_GET['ver'])){
    $disabled = "disabled";
}
?>
<!-- Titulo de la pagina -->
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 titulo-pagina">
   <input type="hidden" value="rmb_residente">
   <h3 class="text-left">Farmulario Tareas</h3>
</div>
<div class="text-left">
    <form id="form_tareas" name="form_tareas" action="" method="POST" class="form-horizontal" role="form" enctype="multipart/form-data">
        <div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6">
            <label class="col-xs-12 col-sm-4 col-md-4 col-lg-4 control-label" for="rmb_calendario_nom">Nombre: </label>
            <div class="col-xs-12 col-sm-7 col-md-7 col-lg-7">
                <input type="text" name="rmb_calendario_nom" id="rmb_calendario_nom" class="form-control" value="<?php echo $tareas_nom;?>" placeholder="Nombre de la tarea" alt="Nombre de la tarea" title="Nombre de la tarea" <?php echo $disabled;?>>
            </div>
        </div>
        <div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6">
            <label class="col-xs-12 col-sm-4 col-md-3 col-lg-2 control-label" for="rmb_calendario_fini">Fecha Inicio: </label>
            <div class="col-xs-12 col-sm-7 col-md-7 col-lg-7">
                <input type="text" name="rmb_calendario_fini" id="rmb_calendario_fini" class="form-control" value="<?php echo $tareas_fini;?>" placeholder="Fecha de inicio de la tarea" alt="Fecha de inicio de la tarea" title="Fecha de inicio de la tarea" <?php echo $disabled;?>>
            </div>
        </div>
        <div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6">
            <label class="col-xs-12 col-sm-4 col-md-4 col-lg-4 control-label" for="rmb_calendario_ffin">Fecha Final: </label>
            <div class="col-xs-12 col-sm-7 col-md-7 col-lg-7">
                <input type="text" name="rmb_calendario_ffin" id="rmb_calendario_ffin" class="form-control" value="<?php echo $tareas_ffin;?>" placeholder="Fecha final de la tarea" alt="Fecha final de la tarea" title="Fecha final de la tarea" <?php echo $disabled;?>>
            </div>
        </div>
        <div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6">
            <label class="col-xs-12 col-sm-4 col-md-3 col-lg-2 control-label" for="rmb_est_id">Estado: </label>
            <div class="col-xs-12 col-sm-7 col-md-7 col-lg-7">
                <div class="radio">
                    <label>
                        <input type="radio" name="rmb_est_id" id="rmb_est_id_15" value="15" <?php if(($tareas_est == '15') || ($tareas_est == '')){echo "checked='checked'";}?>>
                        Realizada
                    </label>
                    <label>
                        <input type="radio" name="rmb_est_id" id="rmb_est_id_16" value="16" <?php if($tareas_est == '16'){echo "checked='checked'";}?>>
                        NO Realizada
                    </label>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6">
            <label class="col-xs-12 col-sm-4 col-md-4 col-lg-4 control-label" for="rmb_calendario_desc">Observación: </label>
            <div class="col-xs-12 col-sm-7 col-md-7 col-lg-7">
                <textarea name="rmb_calendario_desc" id="rmb_calendario_desc" class="form-control" rows="3" placeholder="Observación" alt="Observación" title="Observación" <?php echo $disabled;?>><?php echo $tareas_desc;?></textarea>
            </div>
        </div>
        <div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6">
            <label class="col-xs-12 col-sm-4 col-md-3 col-lg-2 control-label" for="rmb_calendario_det_cada">Historial: </label>
            <div class="col-xs-12 col-sm-7 col-md-7 col-lg-7">
                <textarea name="rmb_calendario_det_cada" id="rmb_calendario_det_cada" class="form-control" rows="3" placeholder="Observaciones de realización o no de la tarea" alt="Observaciones de realización o no de la tarea" title="Observaciones de realización o no de la tarea" <?php echo $disabled;?>><?php echo $tareas_obs;?></textarea>
            </div>
        </div>
        <div class="clearfix">&nbsp;</div>
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center"><?php 
            if($id_tareas){?>
                <input type="hidden" name="id_upd" id="id_upd" class="form-control" value="<?php echo $id_tareas;?>">
            <?php }?>
            <button type="submit" class="btn btn-default btn-lg" <?php echo $disabled;?>>Actualizar</button>
            <button type="button" class="btn btn-default btn-lg btn-regresar">Regresar</button>
        </div>
        <div class="clearfix">&nbsp;</div>
    </form>
</div>
<div class="clearfix">&nbsp;</div>
<script src="../js/jquery.min.js"></script>
<script type="text/javascript" src='../js/moment-with-locales.js'></script>
<!-- Libreria java script que realiza la validacion de los formulariosP -->
<script type="text/javascript" src="../js/bootstrap-datetimepicker.min.js"></script> <!-- Datetimepicker -->
<script src="../js/bootstrapValidator.js"></script>
<script>
    $(document).ready(function() {
        // Validación formulario de datos del propietario
        $('#form_tareas').bootstrapValidator({
            message: 'Este valor no es valido',
            feedbackIcons: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                rmb_calendario_nom: {
                    message: 'El nombre de la tarea no es valido',
                    validators: {
                        notEmpty: {
                            message: 'El nombre de la tarea es requerido'
                        }
                    }
                },
                rmb_calendario_fini: {
                    message: 'La fecha de inicio de la tarea no es valida',
                    validators: {
                        notEmpty: {
                            message: 'La fecha de inicio de la tarea es requerida'
                        },
                        date: {
                            format: 'YYYY-MM-DD H:i',
                            message: 'La fecha de inicio de la tarea no es valida'
                        }
                    }
                }
            }
        })
        .on('success.form.bv', function(e) {
            // Prevent form submission
            e.preventDefault();
            espereshow();
            // asignamos los campos del formulario con sus valores a la variable
            var datos_form = new FormData($("#form_tareas")[0]);
            $.ajax({
                url:"../php/ins_upd_tareas.php",
                cache:false,
                type:"POST",
                contentType:false,
                data:datos_form,
                processData:false,
                success: function(datos){
                    if(datos !== ''){
                        // alert(datos);
                        setTimeout(esperehide, 500);
                        $("#col-md-12").load('tareas.php');
                        history.pushState({page: "tareas.php"}, "Lista tareas", "tareas.html");
                        swal({
                            title: "Felicidades!",
                            text: "El registro se ha guardado correctamente!",
                            type: "success",
                            confirmButtonText: "Continuar",
                            confirmButtonColor: "#94B86E"
                        });
                    }
                    else{
                        setTimeout(esperehide, 500);
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
        cargaFormTareas();
    });
    $(function () {
        $('#rmb_calendario_fini').datetimepicker({autoclose: true});
        $('#rmb_calendario_ffin').datetimepicker({autoclose: true});
    });
</script>