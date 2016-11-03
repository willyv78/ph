<?php session_start();
require_once ("../conexion/conexion.php");
require_once ("../php/funciones.php");
//////////////////////////////////////////////////////////////////////////////////////
// Aplicación PHP usando Bootstrap, jquery, HTML5 y CSS - PH                        //
// Copyright 2014 Wilson Giovanny Velandia Barreto 3204274564 - willyv78@gmail.com  //
//////////////////////////////////////////////////////////////////////////////////////
?>
<div class="col-xs-12 col-sm-offset-1 col-sm-10 col-md-offset-1 col-md-10 col-lg-offset-2 col-lg-8">
    <div class="modal-content">
        <div class="modal-header">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 titulo-pagina">
                <div class="clearfix">&nbsp;</div>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" alt="Cerrar Ventana" title="Cerrar Ventana"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">
                    <span style="font-weight: bold;color: #546E7A">
                        <i class="glyphicon glyphicon-file"></i>Solicitud de actualización de datos</span>
                </h4>
                <div class="clearfix">&nbsp;</div>
            </div>
        </div>
        <div class="modal-body">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <form class="form-horizontal" id="form_cont" name="form_cont" action="" method="POST" role="form">
                    <div class="clearfix">&nbsp;</div>
                    <div class="form-group">
                        <div class="alert alert-info">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <strong>Importante!</strong> Describa la información que desea actualizar. Los cambios estan sujetos de verificación.
                        </div>
                        <input id="rmb_mens_asunto" type="hidden" name="rmb_mens_asunto" class="form-control" value="Solicitud actualización de datos" >
                    </div>
                    <div class="form-group">
                        <label class="text-left col-xs-12 col-sm-12 col-md-12 col-lg-12" for="rmb_mens_mens">Descripción:</label>
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <textarea id="rmb_mens_mens" name="rmb_mens_mens" class="form-control" rows="4" placeholder="Escriba un mensaje en 1000 caractéres" alt="Escriba un mensaje en 1000 caractéres" title="Escriba un mensaje en 1000 caractéres"></textarea>
                        </div>
                    </div>
                    <div class="form-group text-center">
                        <button type="submit" class="btn btn-default">Enviar</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="modal-footer"></div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $(".close").on("click", cerrarModalDocs);
        $('#form_cont').bootstrapValidator({
            message: 'Este valor no es valido',
            feedbackIcons: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                rmb_mens_asunto: {
                    message: 'El asunto del mensaje no es valido',
                    validators: {
                        notEmpty: {
                            message: 'El asunto del mensaje es requerido'
                        },
                        stringLength: {
                            min: 3,
                            max: 250,
                            message: 'El asunto del mensaje debe contener de 3 a 250 caracteres'
                        }
                    }
                },
                rmb_mens_mens: {
                    message: 'El mensaje no es valido',
                    validators: {
                        notEmpty: {
                            message: 'El mensaje es requerido'
                        },
                        stringLength: {
                            min: 3,
                            max: 1000,
                            message: 'El mensaje debe contener de 3 a 1000 caracteres'
                        }
                    }
                }
            }
        })
        .on('success.form.bv', function(e) {
            // Prevent form submission
            e.preventDefault();
            var datos_form = new FormData($("#form_cont")[0]);
            $.ajax({
                url:"../php/ins_upd_contac_mens.php",
                cache:false,
                type:"POST",
                contentType:false,
                data:datos_form,
                processData:false,
                success: function(datos){
                    setTimeout(esperehide, 500);
                    if(datos !== ''){
                        $(".ing-cal").addClass('hidden');
                        swal({
                            title: "Felicidades!",
                            text: "El registro se ha guardado correctamente!",
                            type: "success",
                            confirmButtonText: "Continuar",
                            confirmButtonColor: "#94B86E"
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
    });
</script>