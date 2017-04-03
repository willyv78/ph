<?php
session_start();
require_once ("../conexion/conexion.php");
require_once ("../php/funciones.php");
//////////////////////////////////////////////////////////////////////////////////////
// Aplicación PHP usando Bootstrap, jquery, HTML5 y CSS - PH                        //
// Copyright 2014 Wilson Giovanny Velandia Barreto 3204274564 - willyv78@gmail.com  //
//////////////////////////////////////////////////////////////////////////////////////

$desactivar = "";
if(isset($_GET['id_ver']) || isset($_GET['id_upd'])){
    if(isset($_GET['id_ver'])){
        $id_eva = $_GET['id_ver'];
        $desactivar = "disabled";
    }
    else{
        $id_eva = $_GET['id_upd'];
        $desactivar = "";
    }
    $res_cate_eva = registroCampo("rmb_eva_cate_x_eva ce", "ce.rmb_eva_cate_x_eva_id, ce.rmb_eva_cate_x_eva_peso, ce.rmb_eva_cate_x_eva_punt, c.rmb_eva_cate_id", "LEFT JOIN c.rmb_eva_cate USING(rmb_eva_cate_id) WHERE ce., ce.rmb_eva_cate_x_eva_id = '$id_eva'", "", "ORDER BY c.rmb_eva_cate_nom");
    if($res_eva){
        if(mysql_num_rows($res_eva) > 0){
            $row_eva = mysql_fetch_array($res_eva);
            $eva_id = $row_eva[0];
            $eva_cat = $row_eva[3];
            $eva_pes = $row_eva[1];
            $eva_pun = $row_eva[2];
        }
    }
}?>
<!-- Titulo de la pagina -->
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 titulo-pagina">
   <input type="hidden" value="rmb_residente">
   <h3 class="text-left">Formulario Categoria de la Evaluación</h3>
</div>
<div class="text-left">
    <form id="form_cate_eva" name="form_cate_eva" action="" method="POST" class="form-horizontal" role="form" enctype="multipart/form-data">
        <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <label class="col-xs-12 col-sm-3 col-md-3 col-lg-1 control-label" for="rmb_eva_cate_id">Nombre: </label>
            <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3"><?php 
                echo campoSelect($eva_cat, "rmb_eva_cate", $disabled);?>
            </div>
            <label class="col-xs-12 col-sm-3 col-md-3 col-lg-1 control-label" for="rmb_eva_cate_x_eva_peso">Peso: </label>
            <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
                <input type="text" name="rmb_eva_cate_x_eva_peso" id="rmb_eva_cate_x_eva_peso" class="form-control" value="<?php echo $eva_pes;?>" placeholder="Peso de la categoría" alt="Peso de la categoría" title="Peso de la categoría" <?php echo $disabled;?>>
            </div>
            <label class="col-xs-12 col-sm-3 col-md-3 col-lg-1 control-label" for="rmb_eva_cate_x_eva_punt">Puntuación: </label>
            <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
                <input type="text" name="rmb_eva_cate_x_eva_punt" id="rmb_eva_cate_x_eva_punt" class="form-control" value="<?php echo $eva_pes;?>" placeholder="Puntuación de la categoría" alt="Puntuación de la categoría" title="Puntuación de la categoría" <?php echo $disabled;?>>
            </div>
        </div>
        <div class="clearfix">&nbsp;</div>
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center">
            <input type="hidden" name="id_upd" id="id_upd" class="form-control" value="<?php echo $id_eva;?>"><?php 
            if(isset($_GET['id_upd'])){?>
                <button type="submit" class="btn btn-default btn-lg" <?php echo $disabled;?>>Actualizar</button>
            <?php }
            elseif((!isset($_GET['id_upd'])) && (!isset($_GET['id_ver']))){?>
                <button type="submit" class="btn btn-default btn-lg" <?php echo $disabled;?>>Agregar</button>
            <?php }?>
            <button type="button" class="btn btn-default btn-lg btn-regresar">Regresar</button>
        </div>
        <div class="clearfix">&nbsp;</div>
    </form>
</div>
<div class="clearfix">&nbsp;</div>
<script src="../js/jquery.min.js"></script>
<script src="../js/bootstrapValidator.js"></script>
<script>
    $(document).ready(function() {
        // Validación formulario de datos del propietario
        $('#form_cate_eva').bootstrapValidator({
            message: 'Este valor no es valido',
            feedbackIcons: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                rmb_eva_cate_id: {
                    message: 'La categoría de la evaluación no es valido',
                    validators: {
                        notEmpty: {
                            message: 'La categoría de la evaluación es requerido'
                        }
                    }
                },
                rmb_eva_cate_x_eva_peso: {
                    message: 'El peso de la categoría de la evaluación no es valido',
                    validators: {
                        notEmpty: {
                            message: 'El peso de la categoría de la evaluación es requerido'
                        }
                    }
                },
                rmb_eva_cate_x_eva_punt: {
                    message: 'La puntuación de la categoría de la evaluación no es valido',
                    validators: {
                        notEmpty: {
                            message: 'La puntuación de la categoría de la evaluación es requerido'
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
            var datos_form = new FormData($("#form_cate_eva")[0]);
            $.ajax({
                url:"../php/ins_upd_cate_eva.php",
                cache:false,
                type:"POST",
                contentType:false,
                data:datos_form,
                processData:false,
                success: function(datos){
                    if(datos !== ''){
                        // alert(datos);
                        setTimeout(esperehide, 500);
                        $("#categorias-evaluacion").load("evaluacion-lista-cate-eva.php?id_upd=" + datos);
                        history.pushState({page: "evaluacion-form.php"}, "Formulario de evaluación", "evaluacion-form.html");
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
        cargaFormEvaluacion();
    });
</script>