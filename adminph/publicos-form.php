<?php session_start();
require_once ("../conexion/conexion.php");
require_once ("../php/funciones.php");
//////////////////////////////////////////////////////////////////////////////////////
// Aplicación PHP usando Bootstrap, jquery, HTML5 y CSS - PH                        //
// Copyright 2014 Wilson Giovanny Velandia Barreto 3204274564 - willyv78@gmail.com  //
//////////////////////////////////////////////////////////////////////////////////////
$id_reg = "";$id_serv = "";$tip_serv = "";$val_serv = "";$fini_serv = "";$ffin_serv = "";$opo_serv = "";$fult_serv = "";$fpag_serv = "";$cons_serv = "";$id_proy = $_SESSION['ProyId'];$ver = "";
if(isset($_GET['id_reg'])){
    $id_reg = $_GET['id_reg'];
}
if(isset($_GET['ver'])){
    $ver = "disabled";
}
// realizamos la consulta de los parametros del proyecto año desde que se cobra administración, fecha hasta que aplica el descuento por pronto pago y la fecha hasta que se aplica mora
$res_serv = registroCampo("rmb_servicios s", "*", "WHERE s.rmb_servicios_id = '$id_reg'", "", "");
if($res_serv){
    if(mysql_num_rows($res_serv) > 0){
        $row_serv = mysql_fetch_array($res_serv);
        $id_serv = $row_serv[0];
        $tipo_serv = $row_serv[1];
        $val_serv = $row_serv[2];
        $fini_serv = $row_serv[3];
        $ffin_serv = $row_serv[4];
        $opo_serv = $row_serv[5];
        $fult_serv = $row_serv[6];
        $fpag_serv = $row_serv[7];
        $cons_serv = $row_serv[8];
    }
}?>
<!-- Inicio página estado financiero -->
<div class="col-xs-12 col-sm-offset-1 col-sm-10 col-md-offset-1 col-md-10 col-lg-offset-2 col-lg-8">
    <div class="modal-content">
        <div class="modal-header">
            <div class="titulo-pagina">
                <div class="clearfix">&nbsp;</div>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">
                    <span style="font-weight: bold;color: #546E7A">
                        Servicios Públicos
                    </span>
                </h4>
                <div class="clearfix">&nbsp;</div>
            </div>
        </div>
        <!-- En este div se carga el contenido con los meses y sus valores -->
        <div class="modal-body">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <form action="" method="POST" role="form" id="form-servicios" name="form-servicios">
                    <div class="form-group col-xs-12 col-sm-12 col-md-6 col-lg-6">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-4">
                            <label for="rmb_serviciostipo_id">Tipo de servicio</label>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-8" alt="Tipo de servicio" title="Tipo de servicio">
                            <?php echo campoSelect($tipo_serv, "rmb_serviciostipo", $ver);?>
                        </div>
                    </div>
                    <div class="form-group col-xs-12 col-sm-12 col-md-6 col-lg-6">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-4">
                            <label for="rmb_servicios_valor">Valor</label>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-8">
                            <input type="text" class="form-control" value="<?php echo $val_serv;?>" <?php echo $ver;?> id="rmb_servicios_valor" name="rmb_servicios_valor" placeholder="Digite el valor a pagar" alt="Valor facturado" title="Valor facturado">
                        </div>
                    </div>
                    <div class="form-group col-xs-12 col-sm-12 col-md-6 col-lg-6">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-4">
                            <label for="rmb_servicios_consumo">Consumo</label>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-8">
                            <input type="text" class="form-control" value="<?php echo $cons_serv;?>" <?php echo $ver;?> id="rmb_servicios_consumo" name="rmb_servicios_consumo" placeholder="Digite el consumo" alt="Consumo del Periodo" title="Consumo del Periodo">
                        </div>
                    </div>
                    <div class="form-group col-xs-12 col-sm-12 col-md-6 col-lg-6">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-4">
                            <label for="rmb_servicios_fpag">Fecha de pago</label>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-8">
                            <input type="text" class="form-control" value="<?php echo $fpag_serv;?>" <?php echo $ver;?> id="rmb_servicios_fpag" name="rmb_servicios_fpag" placeholder="Seleccione la fecha en que se pago" alt="Fecha de Pago" title="Fecha de Pago">
                        </div>
                    </div>
                    <div class="form-group col-xs-12 col-sm-12 col-md-6 col-lg-6">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-4">
                            <label for="rmb_servicios_fopo">Pago Oportuno</label>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-8">
                            <input type="text" class="form-control" value="<?php echo $opo_serv;?>" <?php echo $ver;?> id="rmb_servicios_fopo" name="rmb_servicios_fopo" placeholder="Seleccione la fecha para pago oportuno" alt="Pago Oportuno" title="Pago Oportuno">
                        </div>
                    </div>
                    <div class="form-group col-xs-12 col-sm-12 col-md-6 col-lg-6">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-4">
                            <label for="rmb_servicios_fult">Fecha máxima pago</label>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-8">
                            <input type="text" class="form-control" value="<?php echo $fult_serv;?>" <?php echo $ver;?> id="rmb_servicios_fult" name="rmb_servicios_fult" placeholder="Seleccione la fecha del último plazo para pagar" alt="Fecha limite de Pago" title="Fecha limite de Pago">
                        </div>
                    </div>
                    <div class="form-group col-xs-12 col-sm-12 col-md-6 col-lg-6">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-4">
                            <label for="rmb_servicios_fini">Periodo facturado</label>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
                            <input type="text" class="form-control" value="<?php echo $fini_serv;?>" <?php echo $ver;?> id="rmb_servicios_fini" name="rmb_servicios_fini" placeholder="Fecha inicial" alt="Fecha Inicio de facturación" title="Fecha Inicio de facturación">
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
                            <input type="text" class="form-control" value="<?php echo $ffin_serv;?>" <?php echo $ver;?> id="rmb_servicios_ffin" name="rmb_servicios_ffin" placeholder="Fecha final" alt="Fecha final de facturación" title="Fecha final de facturación">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 text-right"><?php 
                        if((isset($_GET['id_reg']))&&($ver == '')){?>
                            <input type="hidden" name="id_upd" id="id_upd" class="form-control" value="<?php echo $_GET['id_reg'];?>">
                            <button type="submit" class="btn btn-default">Actualizar</button><?php 
                        }
                        elseif($ver == ''){?>
                            <button type="submit" class="btn btn-default">Agregar</button><?php 
                        }?>
                        <button type="button" class="btn btn-default btn-regresar">Regresar</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="modal-footer">
            <!-- <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button> -->
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
        // Validación formulario de datos del propietario
        $('#form-servicios').bootstrapValidator({
            message: 'Este valor no es valido',
            feedbackIcons: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                rmb_serviciostipo_id: {
                    message: 'El tipo de servicio público no es valido',
                    validators: {
                        notEmpty: {
                            message: 'El tipo de servicio público es requerido'
                        }
                    }
                },
                rmb_servicios_valor: {
                    message: 'El valor a pagar no es valido',
                    validators: {
                        notEmpty: {
                            message: 'El valor a pagar es requerido'
                        },
                        stringLength: {
                            min: 1,
                            max: 20,
                            message: 'El valor a pagar debe contener de 3 a 20 characteres'
                        },
                        regexp: {
                            regexp: /^[0-9]+$/,
                            message: 'El valor a pagar debe ser numérico.'
                        }
                    }
                },
                rmb_servicios_consumo: {
                    message: 'El valor del consumo no es valido',
                    validators: {
                        notEmpty: {
                            message: 'El valor del consumo es requerido'
                        },
                        stringLength: {
                            min: 1,
                            max: 20,
                            message: 'El valor del consumo debe contener de 3 a 20 characteres'
                        },
                        regexp: {
                            regexp: /^[0-9]+$/,
                            message: 'El valor del consumo debe ser numérico.'
                        }
                    }
                },
                rmb_servicios_fpag: {
                    message: 'La fecha de pago no es valida',
                    validators: {
                        notEmpty: {
                            message: 'La fecha de pago es requerida'
                        }
                    }
                },
                rmb_servicios_fopo: {
                    message: 'La fecha de pago oportuno no es valida',
                    validators: {
                        notEmpty: {
                            message: 'La fecha de pago oportuno es requerida'
                        }
                    }
                },
                rmb_servicios_fult: {
                    message: 'La fecha máxima de pago no es valida',
                    validators: {
                        notEmpty: {
                            message: 'La fecha máxima de pago es requerida'
                        }
                    }
                },
                rmb_servicios_fini: {
                    message: 'La fecha inicio del periodo facturado no es valida',
                    validators: {
                        notEmpty: {
                            message: 'La fecha inicio del periodo facturado es requerida'
                        }
                    }
                },
                rmb_servicios_ffin: {
                    message: 'La fecha final del periodo facturado no es valida',
                    validators: {
                        notEmpty: {
                            message: 'La fecha final del periodo facturado es requerida'
                        }
                    }
                }
            }
        })
        .on('success.form.bv', function(e) {
            // Prevent form submission
            e.preventDefault();
            espereshow();
            var datos_form = new FormData($("#form-servicios")[0]);
            $.ajax({
                url:"../php/ins_upd_serv.php",
                cache:false,
                type:"POST",
                contentType:false,
                data:datos_form,
                processData:false,
                success: function(datos){
                    if(datos !== ''){
                        // alert(datos);
                        setTimeout(esperehide, 500);
                        swal({
                            title: "Felicidades!",
                            text: "El registro se ha guardado correctamente!",
                            type: "success",
                            confirmButtonText: "Continuar",
                            confirmButtonColor: "#94B86E"
                        },
                        function(){
                            $("#col-md-12").load("./publicos.php?tabla=rmb_servicios&nom=ServiciosPublicos");
                            $(".ing-cal").html("");
                            $(".ing-cal").addClass('hidden');
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
        $('#rmb_servicios_fpag').datepicker({format: "yyyy-mm-dd", autoclose: true});
        $('#rmb_servicios_fopo').datepicker({format: "yyyy-mm-dd", autoclose: true});
        $('#rmb_servicios_fult').datepicker({format: "yyyy-mm-dd", autoclose: true});
        $('#rmb_servicios_fini').datepicker({format: "yyyy-mm-dd", autoclose: true});
        $('#rmb_servicios_ffin').datepicker({format: "yyyy-mm-dd", autoclose: true});
        cargaFormServiciosPublicos();
    });
</script>
<!-- FIN Pagina estado financiero -->