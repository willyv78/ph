<form class="form-horizontal" id="form_cont" name="form_cont" action="" method="POST" role="form">
    <div class="clearfix">&nbsp;</div>
    <div class="form-group">
        <label class="text-left col-xs-12 col-sm-12 col-md-12 col-lg-12" for="rmb_mens_asunto">Asunto:</label>
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <input id="rmb_mens_asunto" type="text" name="rmb_mens_asunto" class="form-control" value="" placeholder="Asunto del mensaje">
        </div>
    </div>
    <div class="form-group">
        <label class="text-left col-xs-12 col-sm-12 col-md-12 col-lg-12" for="rmb_mens_mens">Mensaje:</label>
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <textarea id="rmb_mens_mens" name="rmb_mens_mens" class="form-control" rows="4" placeholder="Escriba un mensaje en 250 caractéres"></textarea>
        </div>
    </div>
    <div class="form-group text-center">
        <button type="submit" class="btn btn-danger">Enviar</button>
    </div>
</form>
<script>
    $(document).ready(function() {
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
                        $(".box_contac.form-contacto").load("form_mens.php");
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