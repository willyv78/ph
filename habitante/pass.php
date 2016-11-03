<?php session_start();
require_once ("../conexion/conexion.php");
require_once ("../php/funciones.php");
//////////////////////////////////////////////////////////////////////////////////////
// Aplicación PHP usando Bootstrap, jquery, HTML5 y CSS - PH                        //
// Copyright 2014 Wilson Giovanny Velandia Barreto 3204274564 - willyv78@gmail.com  //
//////////////////////////////////////////////////////////////////////////////////////
?>
<!-- Titulo de la pagina -->
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 titulo-pagina">
   <h3 class="pull-left">Cambiar contraseña</h3>
</div>
<div class="clearfix"></div>
<form class="col-xs-12 col-sm-10 col-md-8 col-lg-6 form-quienes form-horizontal" id="form-contraseña" name="form-contraseña" method="POST" role="form" enctype="multipart/form-data">
    <div class="form-group">
        <label class="col-xs-12 col-sm-4 col-md-5 col-lg-6 text-right" for="actual">Actual:</label>
        <div class="col-xs-12 col-sm-8 col-md-7 col-lg-6">
            <input type="password" class="form-control" id="actual" name="actual" placeholder="Título del contacto" alt="Título del contacto" title="Título del contacto" value="<?php echo $titulo;?>">
        </div>
    </div>
    <div class="form-group">
        <label class="col-xs-12 col-sm-4 col-md-5 col-lg-6 text-right" for="nueva">Nueva:</label>
        <div class="col-xs-12 col-sm-8 col-md-7 col-lg-6">
            <input type="password" class="form-control" id="nueva" name="nueva" placeholder="Nombre del contacto" alt="Nombre del contacto" title="Nombre del contacto" value="<?php echo $nom;?>">
        </div>
    </div>
    <div class="form-group">
        <label class="col-xs-12 col-sm-4 col-md-5 col-lg-6 text-right" for="confirm">Confirmar:</label>
        <div class="col-xs-12 col-sm-8 col-md-7 col-lg-6">
            <input type="password" class="form-control" id="confirm" name="confirm" placeholder="Teléfono de contacto" alt="Teléfono de contacto" title="Teléfono de contacto" value="<?php echo $tel;?>">
        </div>
    </div>
    <div class="clearfix">&nbsp;</div>
    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 text-right">
        <input type="hidden" name="id_upd" id="id_upd" class="form-control" value="<?php echo $id;?>">
        <button type="submit" class="btn btn-default">Actualizar</button>
    </div>
    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 text-left">
        <button type="button" class="btn btn-default regresar">Regresar</button>
    </div>
</form>
<script>
    $(document).ready(function() {
        $('#form-contraseña').bootstrapValidator({
            message: 'Este valor no es valido',
            feedbackIcons: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                actual: {
                    message: 'La contraseña no es valido',
                    validators: {
                        notEmpty: {
                            message: 'La contraseña es requerido'
                        },
                        stringLength: {
                            min: 3,
                            max: 50,
                            message: 'La contraseña debe contener de 3 a 40 caracteres'
                        },
                        regexp: {
                            regexp: /^[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ_ .:,@#&*/-/+]+$/,
                            message: 'La contraseña debe contener letras, numeros, acentos espacios y algunos caracteres especiales (_ . : , @ # & * - +).'
                        },
                        different: {
                            field: 'nueva',
                            message: 'La contraseña debe ser diferente a la actual'
                        }
                    }
                },
                nueva: {
                    message: 'La nueva contraseña no es valido',
                    validators: {
                        notEmpty: {
                            message: 'La nueva contraseña es requerido'
                        },
                        regexp: {
                            regexp: /^[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ_ .:,@#&*/-/+]+$/,
                            message: 'La nueva contraseña debe contener letras, numeros, acentos espacios y algunos caracteres especiales (_ . : , @ # & * - +).'
                        },
                        identical: {
                            field: 'confirm',
                            message: 'La nueva contraseña y confirmar contraseña no son iguales'
                        },
                        different: {
                            field: 'actual',
                            message: 'La nueva contraseña debe ser diferente a la actual'
                        }
                    }
                },
                confirm: {
                    message: 'La confirmación de contraseña no es valido',
                    validators: {
                        notEmpty: {
                            message: 'La confirmación de contraseña es requerido'
                        },
                        regexp: {
                            regexp: /^[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ_ .:,@#&*/-/+]+$/,
                            message: 'La confirmación de contraseña debe contener letras, numeros, acentos espacios y algunos caracteres especiales (_ . : , @ # & * - +).'
                        },
                        identical: {
                            field: 'nueva',
                            message: 'La confirmación de contraseña y la nueva contraseña no son iguales'
                        },
                        different: {
                            field: 'actual',
                            message: 'La confirmación de contraseña debe ser diferente a la actual'
                        }
                    }
                }
            }
        })
        .on('success.form.bv', function(e) {
            // Prevent form submission
            e.preventDefault();
            var datos_form = new FormData($("#form-contraseña")[0]);
            $.ajax({
                url:"../php/ins_upd_pass.php",
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
                            text: "La contraseña a cambiado correctamente!",
                            type: "success",
                            confirmButtonText: "Continuar",
                            confirmButtonColor: "#94B86E"
                        },
                        function(){
                            $("#col-md-12").load("home.php");
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
        cargaFormPass();
    });
</script>













