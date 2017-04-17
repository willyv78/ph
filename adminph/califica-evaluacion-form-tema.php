<?php
session_start();
require_once ("../conexion/conexion.php");
require_once ("../php/funciones.php");
//////////////////////////////////////////////////////////////////////////////////////
// Aplicación PHP usando Bootstrap, jquery, HTML5 y CSS - PH                        //
// Copyright 2014 Wilson Giovanny Velandia Barreto 3204274564 - willyv78@gmail.com  //
//////////////////////////////////////////////////////////////////////////////////////

$desactivar = "";$id_eva = "";$id_cat = "";$tema_cate_eva_id = "";$tema_cate_eva_tema = "";$cal_tema = "";
if(isset($_GET['id_eva'])){
    $id_eva = $_GET['id_eva'];
}
if(isset($_GET['id_cat'])){
    $id_cat = $_GET['id_cat'];
}
if(isset($_GET['id_ver']) || isset($_GET['id_upd'])){
    if(isset($_GET['id_ver'])){
        $id_tema = $_GET['id_ver'];
        $desactivar = "";
    }
    else{
        $id_tema = $_GET['id_upd'];
        $desactivar = "";
    }
    $res_tema_cate_eva = registroCampo("rmb_eva_tema_x_cate_cal cal", "cal.rmb_eva_tema_x_cate_cal_id, tc.rmb_eva_tema_id, tc.rmb_eva_id, tc.rmb_eva_cate_id, cal.rmb_eva_tema_x_cate_cal_cal", "LEFT JOIN rmb_eva_tema_x_cate tc USING(rmb_eva_tema_x_cate_id) WHERE cal.rmb_eva_tema_x_cate_id = $id_tema AND cal.rmb_residente_id = ".$_SESSION['UsuID'], "", "");
    if($res_tema_cate_eva){
        if(mysql_num_rows($res_tema_cate_eva) > 0){
            $row_tema_cate_eva = mysql_fetch_array($res_tema_cate_eva);
            $tema_cate_eva_cal_id = $row_tema_cate_eva[0];
            $tema_cate_eva_tema = $row_tema_cate_eva[1];
            $id_eva = $row_tema_cate_eva[2];
            $id_cat = $row_tema_cate_eva[3];
            $cal_tema = $row_tema_cate_eva[4];
        }
    }
}?>
<!-- Titulo de la pagina -->
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 titulo-pagina">
   <h3 class="text-left">Tema de la Categoria de la Evaluación: <?php echo nombreCampo($tema_cate_eva_tema, "rmb_eva_tema");?><button type="button" class="btn btn-default btn-lg btn-regresar pull-right" style="margin-bottom: 10px;margin-top: -10px;">Regresar</button></h3>
</div>
<div class="text-left">
    <form id="form_tema_cate_eva" name="form_tema_cate_eva" action="" method="POST" class="form-horizontal" role="form" enctype="multipart/form-data">
        <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <input id="id_eva" name="id_eva" type="hidden" value="<?php echo $id_eva;?>">
            <input id="id_cat" name="id_cat" type="hidden" value="<?php echo $id_cat;?>">
            <input id="id_tema" name="id_tema" type="hidden" value="<?php echo $id_tema;?>">
            <label class="col-xs-12 col-sm-5 col-md-5 col-lg-5 control-label" for="rmb_eva_tema_x_cate_cal_cal">Calificación: </label>
            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
                <div class="radio">
                    <label>
                        <input type="radio" name="rmb_eva_tema_x_cate_cal_cal" id="rmb_eva_tema_x_cate_cal_cal1" value="1" <?php if($cal_tema == '1'){echo 'checked="checked"';}?>>1&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    </label>
                    <label>
                        <input type="radio" name="rmb_eva_tema_x_cate_cal_cal" id="rmb_eva_tema_x_cate_cal_cal2" value="2" <?php if($cal_tema == '2'){echo 'checked="checked"';}?>>2&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    </label>
                    <label>
                        <input type="radio" name="rmb_eva_tema_x_cate_cal_cal" id="rmb_eva_tema_x_cate_cal_cal3" value="3" <?php if($cal_tema == '3'){echo 'checked="checked"';}?>>3&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    </label>
                    <label>
                        <input type="radio" name="rmb_eva_tema_x_cate_cal_cal" id="rmb_eva_tema_x_cate_cal_cal4" value="4" <?php if($cal_tema == '4'){echo 'checked="checked"';}?>>4&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    </label>
                    <label>
                        <input type="radio" name="rmb_eva_tema_x_cate_cal_cal" id="rmb_eva_tema_x_cate_cal_cal5" value="5" <?php if($cal_tema == '5'){echo 'checked="checked"';}?>>5
                    </label>
                </div>
            </div>
        </div>
        <div class="clearfix">&nbsp;</div>
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center" id="btn-form-edit-cate-eva"><?php 
            if($cal_tema <> ''){?>
                <input type="hidden" name="id_upd" id="id_upd" class="form-control" value="<?php echo $tema_cate_eva_cal_id;?>">
                <button type="submit" class="btn btn-default btn-lg" <?php echo $disabled;?>>Actualizar</button>
            <?php }
            else{?>
                <button type="submit" class="btn btn-default btn-lg" <?php echo $disabled;?>>Calificar</button>
            <?php }?>
        </div>
        <div class="clearfix">&nbsp;</div>
    </form>
</div>
<div class="clearfix">&nbsp;</div>
<script src="../js/jquery.min.js"></script>
<script src="../js/bootstrapValidator.js"></script>
<script>
    $(document).ready(function() {
        var id_eva = $("#id_eva").val();
        var id_cat = $("#id_cat").val();
        var id_tema = $("#id_tema").val();
        // Validación formulario de datos del propietario
        $('#form_tema_cate_eva').bootstrapValidator({
            message: 'Este valor no es valido',
            feedbackIcons: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                rmb_eva_tema_x_cate_cal_cal: {
                    message: 'La calificación no es valido',
                    validators: {
                        notEmpty: {
                            message: 'La calificación es requerido'
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
            var datos_form = new FormData($("#form_tema_cate_eva")[0]);
            $.ajax({
                url:"../php/ins_upd_cal_tema_cate_eva.php",
                cache:false,
                type:"POST",
                contentType:false,
                data:datos_form,
                processData:false,
                success: function(datos){
                    if(datos !== ''){
                        // alert(datos);
                        setTimeout(esperehide, 500);
                        $("#col-md-12").load('califica-evaluacion-form-cate.php?id_eva='+id_eva+"&id_cat="+id_cat);
                        swal({
                            title: "Felicidades!",
                            text: "El registro se ha guardado correctamente!",
                            type: "success",
                            confirmButtonText: "Continuar",
                            confirmButtonColor: "#94B86E"
                        },
                        function(){
                            $("#btn-form-edit-cate-eva").removeClass('hidden');
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
        cargaFormCalificaTemaEva();
    });
</script>