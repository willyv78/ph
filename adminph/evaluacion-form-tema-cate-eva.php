<?php
session_start();
require_once ("../conexion/conexion.php");
require_once ("../php/funciones.php");
//////////////////////////////////////////////////////////////////////////////////////
// Aplicación PHP usando Bootstrap, jquery, HTML5 y CSS - PH                        //
// Copyright 2014 Wilson Giovanny Velandia Barreto 3204274564 - willyv78@gmail.com  //
//////////////////////////////////////////////////////////////////////////////////////

$desactivar = "";$eva_id = "";$eva_cat = "";$eva_pes = "";$eva_pun = "";
if(isset($_GET['id_ver']) || isset($_GET['id_upd'])){
    if(isset($_GET['id_ver'])){
        $id_tema = $_GET['id_ver'];
        $desactivar = "disabled";
    }
    else{
        $id_tema = $_GET['id_upd'];
        $desactivar = "";
    }
    $res_tema_cate_eva = registroCampo("rmb_eva_tema_x_cate tc", "tc.rmb_eva_tema_x_cate_id, tc.rmb_eva_tema_id", "WHERE tc.rmb_eva_tema_x_cate_id = $id_tema", "", "");
    if($res_tema_cate_eva){
        if(mysql_num_rows($res_tema_cate_eva) > 0){
            $row_tema_cate_eva = mysql_fetch_array($res_tema_cate_eva);
            $tema_cate_eva_id = $row_tema_cate_eva[0];
            $tema_cate_eva_tema = $row_tema_cate_eva[1];
        }
    }
}?>
<!-- Titulo de la pagina -->
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 titulo-pagina">
   <input id="id_tema" name="id_tema" type="hidden" value="<?php echo $id_tema;?>">
   <h3 class="text-left">Formulario Temas Categoria de la Evaluación</h3>
</div>
<div class="text-left">
    <form id="form_tema_cate_eva" name="form_tema_cate_eva" action="" method="POST" class="form-horizontal" role="form" enctype="multipart/form-data">
        <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <label class="col-xs-12 col-sm-5 col-md-5 col-lg-5 control-label" for="rmb_eva_cate_id">Tema: </label>
            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4"><?php 
                echo campoSelect($tema_cate_eva_tema, "rmb_eva_tema", $disabled);?>
            </div>
        </div>
        <div class="clearfix">&nbsp;</div>
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center" id="btn-form-edit-cate-eva"><?php 
            if(isset($_GET['id_upd'])){?>
                <input type="hidden" name="id_upd" id="id_upd" class="form-control" value="<?php echo $id_tema;?>">
                <button type="submit" class="btn btn-default btn-lg" <?php echo $disabled;?>>Actualizar</button>
            <?php }
            elseif((!isset($_GET['id_upd'])) && (!isset($_GET['id_ver']))){?>
                <button type="submit" class="btn btn-default btn-lg" <?php echo $disabled;?>>Agregar</button>
            <?php }?>
            <input type="hidden" name="rmb_tema_eva_id" id="rmb_tema_eva_id" class="form-control" value="">
            <input type="hidden" name="rmb_tema_eva_cate_id" id="rmb_tema_eva_cate_id" class="form-control" value="">
            <button type="button" class="btn btn-default btn-lg btn-regresar-tema">Regresar</button>
        </div>
        <div class="clearfix">&nbsp;</div>
    </form>
</div>
<div class="clearfix">&nbsp;</div>
<div id="temas-categorias-evaluacion" class="col-xs-12 col-sm-12 col-md-12 col-lg-12"></div>
<script src="../js/jquery.min.js"></script>
<script src="../js/bootstrapValidator.js"></script>
<script>
    $(document).ready(function() {
        var id_eva = $("#id_eva").val();
        var id_cat = $("#id_cat").val();
        var id_tema = $("#id_tema").val();
        $("#rmb_tema_eva_id").val(id_eva);
        $("#rmb_tema_eva_cate_id").val(id_cat);
        // Validación formulario de datos del propietario
        $('#form_tema_cate_eva').bootstrapValidator({
            message: 'Este valor no es valido',
            feedbackIcons: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                rmb_eva_tema_id: {
                    message: 'La categoría de la evaluación no es valido',
                    validators: {
                        notEmpty: {
                            message: 'La categoría de la evaluación es requerido'
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
                url:"../php/ins_upd_eva_cate_tema.php",
                cache:false,
                type:"POST",
                contentType:false,
                data:datos_form,
                processData:false,
                success: function(datos){
                    if(datos !== ''){
                        // alert(datos);
                        setTimeout(esperehide, 500);
                        $("#temas-categorias-evaluacion").load("evaluacion-lista-tema-cate-eva.php?id_cat="+id_cat+"&id_eva="+id_eva);
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
        cargaFormTemaEvaluacion();
    });
</script>