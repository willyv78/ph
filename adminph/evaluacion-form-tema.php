<?php
session_start();
require_once ("../conexion/conexion.php");
require_once ("../php/funciones.php");
//////////////////////////////////////////////////////////////////////////////////////
// Aplicación PHP usando Bootstrap, jquery, HTML5 y CSS - PH                        //
// Copyright 2014 Wilson Giovanny Velandia Barreto 3204274564 - willyv78@gmail.com  //
//////////////////////////////////////////////////////////////////////////////////////

$desactivar = "";$cate_id = "";$id_cat = "";
if(isset($_GET['id_ver']) || isset($_GET['id_upd'])){
    if(isset($_GET['id_ver'])){
        $id_cat = $_GET['id_ver'];
        $desactivar = "disabled";
    }
    else{
        $id_cat = $_GET['id_upd'];
        $desactivar = "";
    }
    $res_cate = registroCampo("rmb_eva_tema c", "c.rmb_eva_tema_id, c.rmb_eva_tema_nom", "WHERE c.rmb_eva_tema_id = $id_cat", "", "");
    if($res_cate){
        if(mysql_num_rows($res_cate) > 0){
            $row_cate = mysql_fetch_array($res_cate);
            $cate_id = $row_cate[0];
            $cate_nom = $row_cate[1];
        }
    }
}?>
<!-- Titulo de la pagina -->
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 titulo-pagina">
   <input id="id_cat" name="id_cat" type="hidden" value="<?php echo $id_cat;?>">
   <h3 class="text-left">Formulario Categoria</h3>
</div>
<div class="text-left">
    <form id="form_tema" name="form_tema" action="" method="POST" class="form-horizontal" role="form" enctype="multipart/form-data">
        <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <label class="col-xs-12 col-sm-2 col-md-3 col-lg-3 control-label" for="rmb_eva_tema_nom">Categoría: </label>
            <div class="col-xs-12 col-sm-9 col-md-8 col-lg-7">
                <input type="text" name="rmb_eva_tema_nom" id="rmb_eva_tema_nom" class="form-control" value="<?php echo $cate_nom;?>" placeholder="Peso de la categoría" alt="Peso de la categoría" title="Peso de la categoría" <?php echo $disabled;?>>
            </div>
        </div>
        <div class="clearfix">&nbsp;</div>
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center" id="btn-form-edit-cate-eva"><?php 
            if(isset($_GET['id_upd'])){?>
                <input type="hidden" name="id_upd" id="id_upd" class="form-control" value="<?php echo $id_cat;?>">
                <button type="submit" class="btn btn-default btn-lg" <?php echo $disabled;?>>Actualizar</button>
            <?php }
            elseif((!isset($_GET['id_upd'])) && (!isset($_GET['id_ver']))){?>
                <button type="submit" class="btn btn-default btn-lg" <?php echo $disabled;?>>Agregar</button>
            <?php }?>
            <button type="button" class="btn btn-default btn-lg btn-regresar-tema">Regresar</button>
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
        $('#form_tema').bootstrapValidator({
            message: 'Este valor no es valido',
            feedbackIcons: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                rmb_eva_tema_nom: {
                    message: 'La categoría no es valido',
                    validators: {
                        notEmpty: {
                            message: 'La categoría es requerido'
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
            var datos_form = new FormData($("#form_tema")[0]);
            $.ajax({
                url:"../php/ins_upd_tema.php",
                cache:false,
                type:"POST",
                contentType:false,
                data:datos_form,
                processData:false,
                success: function(datos){
                    if(datos !== ''){
                        // alert(datos);
                        setTimeout(esperehide, 500);
                        $("#col-md-12").load("evaluacion-lista-tema.php");
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
        cargaFormTema();
    });
</script>