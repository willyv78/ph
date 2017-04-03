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
    $res_eva = registroCampo("rmb_eva e", "e.rmb_eva_id, e.rmb_eva_nom", "WHERE e.rmb_eva_id = '$id_eva'", "", "ORDER BY e.rmb_eva_id DESC");
    if($res_eva){
        if(mysql_num_rows($res_eva) > 0){
            $row_eva = mysql_fetch_array($res_eva);
            $eva_id = $row_eva[0];
            $eva_nom = $row_eva[1];
        }
    }
}?>
<!-- Titulo de la pagina -->
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 titulo-pagina">
   <input type="hidden" value="rmb_residente">
   <h3 class="text-left">Formulario Evaluación</h3>
</div>
<div class="text-left">
    <form id="form_eva" name="form_eva" action="" method="POST" class="form-horizontal" role="form" enctype="multipart/form-data">
        <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <label class="col-xs-12 col-sm-4 col-md-4 col-lg-4 control-label" for="rmb_eva_nom">Nombre: </label>
            <div class="col-xs-12 col-sm-7 col-md-7 col-lg-7">
                <input type="text" name="rmb_eva_nom" id="rmb_eva_nom" class="form-control" value="<?php echo $eva_nom;?>" placeholder="Nombre de la evaluación" alt="Nombre de la evaluación" title="Nombre de la evaluación" <?php echo $disabled;?>>
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
<div id="categorias-evaluacion" class="col-xs-12 col-sm-12 col-md-12 col-lg-12"></div>
<script src="../js/jquery.min.js"></script>
<script src="../js/bootstrapValidator.js"></script>
<script>
    $(document).ready(function() {
        // Validación formulario de datos del propietario
        $('#form_eva').bootstrapValidator({
            message: 'Este valor no es valido',
            feedbackIcons: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                rmb_eva_nom: {
                    message: 'El nombre de la evaluación no es valido',
                    validators: {
                        notEmpty: {
                            message: 'El nombre de la evaluación es requerido'
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
            var datos_form = new FormData($("#form_eva")[0]);
            $.ajax({
                url:"../php/ins_upd_eva.php",
                cache:false,
                type:"POST",
                contentType:false,
                data:datos_form,
                processData:false,
                success: function(datos){
                    if(datos !== ''){
                        // alert(datos);
                        setTimeout(esperehide, 500);
                        $("#col-md-12").load("evaluacion-form.php?id_upd=" + datos);
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
        var id_eva = '<?php echo $id_eva;?>';
        if(id_eva){
            $("#categorias-evaluacion").load("evaluacion-lista-cate-eva.php?id_eva="+id_eva);
        }
        cargaFormEvaluacion();
    });
</script>