<?php session_start();
require_once ("../conexion/conexion.php");
require_once ("../php/funciones.php");
//////////////////////////////////////////////////////////////////////////////////////
// Aplicación PHP usando Bootstrap, jquery, HTML5 y CSS - PH                        //
// Copyright 2014 Wilson Giovanny Velandia Barreto 3204274564 - willyv78@gmail.com  //
//////////////////////////////////////////////////////////////////////////////////////
$id = "";$res_question = false;$pre = "";$res = "";

if(isset($_GET['id_upd'])){
    $id = $_GET['id_upd'];
    $res_question = registroCampo("rmb_question q", "q.rmb_question_id, q.rmb_question_pre, q.rmb_question_res", "WHERE rmb_question_id = $id", "", "");
}
if($res_question){
    if(mysql_num_rows($res_question) > 0){
        $row_question = mysql_fetch_array($res_question);
        $id = $row_question[0];$pre = $row_question[1];$res = $row_question[2];
    }
}
?>
<!-- Titulo de la pagina -->
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 titulo-pagina">
   <h3 class="pull-left">Formulario Preguntas frecuentes</h3>
</div>
<div class="clearfix"></div>
<form class="col-xs-12 col-sm-10 col-md-8 col-lg-6 form-quienes form-horizontal" id="form-question" name="form-question" method="POST" role="form" enctype="multipart/form-data">
    <div class="form-group">
        <label class="col-xs-12 col-sm-4 col-md-5 col-lg-6 text-right" for="rmb_question_pre">Pregunta:</label>
        <div class="col-xs-12 col-sm-8 col-md-7 col-lg-6">
            <input type="text" class="form-control" id="rmb_question_pre" name="rmb_question_pre" placeholder="Pregunta frecuente" alt="Pregunta frecuente" title="Pregunta frecuente" value="<?php echo $pre;?>">
        </div>
    </div>
    <div class="form-group">
        <label class="col-xs-12 col-sm-4 col-md-5 col-lg-6 text-right" for="rmb_question_res">Respuesta:</label>
        <div class="col-xs-12 col-sm-8 col-md-7 col-lg-6">
            <textarea name="rmb_question_res" id="rmb_question_res" class="form-control" rows="3" placeholder="Respuesta a la pregunta frecuente" alt="Respuesta a la pregunta frecuente" title="Respuesta a la pregunta frecuente"><?php echo $res;?></textarea>
        </div>
    </div>
    <div class="clearfix">&nbsp;</div><?php 
    if($id){?>
        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 text-right">
            <input type="hidden" name="id_upd" id="id_upd" class="form-control" value="<?php echo $id;?>">
            <button type="submit" class="btn btn-default">Actualizar</button>
        </div><?php 
    }
    else{?>
        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 text-right">
            <button type="submit" class="btn btn-default">Agregar</button>
        </div><?php 
    }?>
    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 text-left">
        <button type="button" class="btn btn-default regresar">Regresar</button>
    </div>
</form>
<script>
    $(document).ready(function() {
        $('#form-question').bootstrapValidator({
            message: 'Este valor no es valido',
            feedbackIcons: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                rmb_question_pre: {
                    message: 'La pregunta es requerida no es valido',
                    validators: {
                        notEmpty: {
                            message: 'La pregunta es requerida es requerido'
                        },
                        stringLength: {
                            min: 3,
                            max: 250,
                            message: 'La pregunta es requerida debe contener de 3 a 250 caracteres'
                        }
                    }
                },
                rmb_question_res: {
                    message: 'La respuesta no es valido',
                    validators: {
                        notEmpty: {
                            message: 'La respuesta es requerido'
                        },
                        stringLength: {
                            min: 3,
                            max: 10000,
                            message: 'La respuesta debe contener de 3 a 40 caracteres'
                        }
                    }
                }
            }
        })
        .on('success.form.bv', function(e) {
            // Prevent form submission
            e.preventDefault();
            var datos_form = new FormData($("#form-question")[0]);
            $.ajax({
                url:"../php/ins_upd_question.php",
                cache:false,
                type:"POST",
                contentType:false,
                data:datos_form,
                processData:false,
                success: function(datos){
                    setTimeout(esperehide, 500);
                    if(datos !== ''){
                        swal({
                            title: "Felicidades!",
                            text: "El registro se ha guardado correctamente!",
                            type: "success",
                            confirmButtonText: "Continuar",
                            confirmButtonColor: "#94B86E"
                        },
                        function(){
                            $("#col-md-12").load("question.php");
                        });
                    }
                    else{
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
        cargaFormQuestion();
    });
</script>













