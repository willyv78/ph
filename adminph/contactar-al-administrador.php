<?php session_start();
require_once ("../conexion/conexion.php");
require_once ("../php/funciones.php");
?>
<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">
                <span style="font-weight: bold;color: #546E7A">Agregar Estado Financiero</span>
            </h4>
            <input type="hidden" name="rmb_cdoc_id" id="rmb_cdoc_id" class="form-control" value="<?php echo $tipo;?>">
        </div>
        <div class="modal-body">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <form id="form_cal" name="form_cal" action="" method="POST" class="form-horizontal" role="form" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="rmb_document_nom">Mes Año :</label>
                        <input type="month" name="" id="" class="form-control" value="" required="required" title="">
                    </div>
                    <div class="form-group">
                        <label for="rmb_document_desc">Concepto :</label>
                        <select name="" id="concepto" class="form-control" required="required">
                            <option value="">Seleccione...</option>
                            <option value="1">Administración</option>
                            <option value="2">Parqueadero</option>
                            <option value="3">Cuota Extraordinaria</option>
                            <option value="4">Otro</option>
                            <option value="5">Abono</option>
                            <option value="6">Descuento Pronto Pago</option>
                            <option value="6">Descuento Miembro Consejo</option>
                            <option value="6">Otros Descuentos</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="rmb_context_id">Valor :</label>
                        <input class="form-control" class="form-control" type="text" id="valor" name="" value="">
                    </div>
                    <div class="form-group">
                        <button id="agrega_concepto" type="button" class="btn btn-success">Agregar Concepto</button>
                    </div>
                    <div class="form-group" id="conceptos"></div>
                    <div class="form-group">
                        <label for="rmb_document_img">Estado :</label>
                        <div class="radio">
                            <label>
                                <input type="radio" id="1" name="input" value="" checked="checked">&nbsp;Al Día&nbsp;&nbsp;&nbsp;
                            </label>
                            <label>
                                <input type="radio" id="2" name="input" value="">&nbsp;Mora 1 mes&nbsp;&nbsp;&nbsp;
                            </label>
                            <label>
                                <input type="radio" id="3" name="input" value="">&nbsp;Mora 2 meses&nbsp;&nbsp;&nbsp;
                            </label>
                            <label>
                                <input type="radio" id="4" name="input" value="">&nbsp;Mora 3 meses +&nbsp;&nbsp;&nbsp;
                            </label>
                        </div>
                    </div>
                    <div class="clearfix">&nbsp;</div>
                    <div class="fom-group">Nota: Si desea agregar varios concepto para el mes haga click en el boton agregar concepto.</div>
                    <div class="clearfix">&nbsp;</div>
                    <div class="form-group text-center">
                        <button type="submit" class="btn btn-success">Agregar</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
        </div>
    </div>
</div>

<!-- jQuery -->
<script src="../js/jquery.min.js"></script>
<script src="../js/sweet-alert.js"></script><!-- Personalizar alertas -->

<!-- Libreria java script que realiza la validacion de los formulariosP -->
<script src="../js/bootstrap-datepicker.js"></script> <!-- Datetimepicker -->
<script src="../js/bootstrapValidator.js"></script>
<script>
    $(document).ready(function() {
        var tipocal = $("#rmb_calendario_tipo").val();
        $('#form_cal').bootstrapValidator({
            message: 'Este valor no es valido',
            feedbackIcons: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                rmb_document_nom: {
                    message: 'El nombre del documento no es valido',
                    validators: {
                        notEmpty: {
                            message: 'El nombre del documento es requerido'
                        },
                        stringLength: {
                            min: 3,
                            max: 50,
                            message: 'El nombre del documento debe contener de 3 a 40 caracteres'
                        },
                        regexp: {
                            regexp: /^[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ_ .:,#@%]+$/,
                            message: 'El nombre del documento debe contener letras, numeros, acentos espacios y algunos caracteres especiales.'
                        }
                    }
                },
                rmb_document_desc: {
                    message: 'La descripción del documento no es valido',
                    validators: {
                        notEmpty: {
                            message: 'La descripción del documento es requerido'
                        },
                        stringLength: {
                            min: 3,
                            max: 250,
                            message: 'La descripción del documento debe contener de 3 a 250 caracteres'
                        },
                        regexp: {
                            regexp: /^[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ_ .:,#@%]+$/,
                            message: 'La descripción del documento debe contener letras, numeros, acentos, espacios y algunos caracteres especiales.'
                        }
                    }
                },
                rmb_document_img: {
                    validators: {
                        file: {
                            extension: 'jpeg,jpg,png,doc,docx,xls,xlsx,pdf,txt',
                            type: 'image/jpeg,image/jpeg,image/png,application/msword,application/msword,application/excel,application/x-excel,application/x-msexcel,application/vnd.ms-excel,application/pdf,text/plain',
                            maxSize: 2097152000,
                            message: 'El archivo seleccionado no es valido'
                        }
                    }
                },
                rmb_est_id: {
                    message: 'El estado del documento no es valida',
                    validators: {
                        notEmpty: {
                            message: 'El estado del documento es requerido'
                        }
                    }
                },
                rmb_document_fini: {
                    message: 'La fecha de publicación no es valida',
                    validators: {
                        notEmpty: {
                            message: 'La fecha de publicación es requerida'
                        },
                        date: {
                            format: 'YYYY-MM-DD',
                            message: 'La fecha de publicación no es valida'
                        }
                    }
                },
                rmb_document_ffin: {
                    message: 'La fecha final del documento no es valida',
                    validators: {
                        notEmpty: {
                            message: 'La fecha final del documento es requerida'
                        },
                        date: {
                            format: 'YYYY-MM-DD',
                            message: 'La fecha final del documento no es valida'
                        }
                    }
                }
            }
        })
        .on('success.form.bv', function(e) {
            // Prevent form submission
            e.preventDefault();
            var dates = $("#rmb_calendario_fini").val();
            dates = dates.split(' ');
            dates = dates[0].replace(/\-/g, ',');
            dates = new Date(dates);
            dates = dates.getFullYear() + "-" + (dates.getMonth() + 1) + "-" + dates.getDate();
            dateString = dates;
            var datos_form = new FormData($("#form_cal")[0]);
            $.ajax({
                url:"../php/ins_cal.php",
                cache:false,
                type:"POST",
                contentType:false,
                data:datos_form,
                processData:false,
                success: function(datos){
                    if(datos !== ''){
                        swal({
                            title: "Felicidades!",
                            text: "El registro se ha guardado correctamente!",
                            type: "success",
                            confirmButtonText: "Continuar",
                            confirmButtonColor: "#94B86E"
                        });
                        setTimeout($(".ing-cal").addClass('hidden'), 3000);
                        setTimeout($(".ing-cal").html(""), 3000);
                    }
                    else{
                        swal({
                            title: "Error!",
                            text: "Ha ocurrido un error,\nNo se ha realizado cambios,\nrevise la información diligenciada he intentelo nuevamente.",
                            type: "error",
                            confirmButtonText: "Aceptar",
                            confirmButtonColor: "#E25856"
                        });
                        $(".ing-cal").html("");
                        $(".ing-cal").addClass('hidden');
                        return;
                    }
                    $("#col-md-12").load("./3.php?tipo="+tipocal+"&date="+dateString+"&emp_id="+sess_id);
                }
            });
        });
    });
    addEstFinanciero();
</script>
<!-- FIN Pagina primera pestaña -->