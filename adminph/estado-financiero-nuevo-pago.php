<?php session_start();
require_once ("../conexion/conexion.php");
require_once ("../php/funciones.php");
//////////////////////////////////////////////////////////////////////////////////////
// Aplicación PHP usando Bootstrap, jquery, HTML5 y CSS - PH                        //
// Copyright 2014 Wilson Giovanny Velandia Barreto 3204274564 - willyv78@gmail.com  //
//////////////////////////////////////////////////////////////////////////////////////
$id_proy = $_SESSION['ProyId'];
$id_fpago = "";
$id_tes = "";
$id_apto = "";
$id_pago = "";
if(isset($_GET['id_tes'])){$id_tes = $_GET['id_tes'];}
if(isset($_GET['id_apto'])){$id_apto = $_GET['id_apto'];}

// realizamos la consulta de los pagos realizados para la tesoreria indicada
$res_tes = registroCampo("rmb_pagos p", "p.rmb_pagos_fpago, p.rmb_pagos_valor, p.rmb_pagos_obs, p.rmb_fpago_id, p.rmb_pagos_id", "WHERE p.rmb_tesoreria_id = '$id_tes'", "", "");
if($res_tes){
    if(mysql_num_rows($res_tes) > 0){
        $row_tes = mysql_fetch_array($res_tes);
        $fpago = $row_tes[0];
        $valor = $row_tes[1];
        $obs = $row_tes[2];
        $id_fpago = $row_tes[3];
        $id_pago = $row_tes[4];
    }
}
?>
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 class-edit-cobro">
    <form id="form-new-pago" name="form-new-pago" action="" method="POST" class="form-horizontal" role="form">

        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6"><strong>Fecha de pago</strong></div>
            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6"><strong>Forma de pago</strong></div>
            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 text-right">
                <input type="text" name="rmb_pagos_fpago" id="rmb_pagos_fpago" class="form-control" value="<?php echo $fpago;?>" pattern="" title="Seleccione la fecha en que realiza el pago" alt="Seleccione la fecha en que realiza el pago">
            </div>
            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 text-right">
                <?php echo campoSelect($id_fpago, "rmb_fpago"); ?>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6"><strong>Factura</strong></div>
            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6"><strong>Valor</strong></div>
            
            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 text-right">
                <?php echo campoSelectMaster("rmb_tesoreria", "$id_tes", "*", "WHERE rmb_aptos_id = ".$id_apto, "", "ORDER BY rmb_tesoreria_fpag DESC");?>
            </div>
            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 text-right">
                <input type="text" name="rmb_pagos_valor" id="rmb_pagos_valor" class="form-control text-right" value="<?php echo $valor;?>" pattern="[0-9]" title="Valor Cancelado" alt="Valor Cancelado">
            </div>
            <div class="col-xs-10 col-sm-10 col-md-10 col-lg-10"><strong>Observación</strong></div>
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <textarea name="rmb_pagos_obs" id="rmb_pagos_obs" class="form-control" rows="3"><?php echo $obs;?></textarea>
            </div>

            <div class="clearfix">&nbsp;</div>
            <div data-id="" class="btn-group pull-right">
                <button type="button" class="btn btn-default btn-regresar">Regresar</button>
            </div>
            <div class="pull-right">&nbsp;</div><?php 
            if(isset($_GET['id_tes'])){?>
                <div class="btn-group pull-right">
                    <input type="hidden" name="id_apto2" id="id_apto2" class="form-control" value="">
                    <input type="hidden" name="id_upd" id="id_upd" class="form-control" value="<?php echo $id_pago;?>">
                    <button type="submit" class="btn btn-default btn-actualizar">Actualizar</button>
                </div><?php 
            }
            else{?>
                <div class="btn-group pull-right">
                    <input type="hidden" name="id_apto2" id="id_apto2" class="form-control" value="">
                    <button type="submit" class="btn btn-default btn-actualizar">Ingresar</button>
                </div><?php 
            }?>
        </div>

    </form>
</div>
<!-- jQuery -->
<script src="../js/jquery.min.js"></script>
<script src="../js/sweet-alert.js"></script><!-- Personalizar alertas -->
<script src="../js/bootstrap-datepicker.js"></script><!--  Datetimepicker -->
<!-- Libreria java script que realiza la validacion de los formulariosP -->
<script src="../js/bootstrapValidator.js"></script>
<script>
    // Validación formulario de datos del propietario
    $('#form-new-pago').bootstrapValidator({
        message: 'Este valor no es valido',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            rmb_pagos_fpago: {
                message: 'La fecha de pago no es valida',
                validators: {
                    notEmpty: {
                        message: 'La fecha de pago es requerida'
                    }
                }
            },
            rmb_fpago_id: {
                message: 'La forma de pago no es valida',
                validators: {
                    notEmpty: {
                        message: 'La forma de pago es requerida'
                    }
                }
            },
            rmb_tesoreria_id: {
                message: 'La factura no es valida',
                validators: {
                    notEmpty: {
                        message: 'La factura es requerida'
                    }
                }
            },
            rmb_pagos_valor: {
                message: 'El valor a pagar no es valido',
                validators: {
                    notEmpty: {
                        message: 'El valor a pagar es requerido'
                    },
                    stringLength: {
                        min: 2,
                        max: 20,
                        message: 'El valor a pagar debe contener de 3 a 20 characteres'
                    },
                    regexp: {
                        regexp: /^[0-9]+$/,
                        message: 'El valor a pagar debe ser numérico.'
                    }
                }
            }
        }
    })
    .on('success.form.bv', function(e) {
        // Prevent form submission
        e.preventDefault();
        espereshow();
        var id_apto = $("#id_apto").val();
        $("#id_apto2").val(id_apto);
        var datos_form = new FormData($("#form-new-pago")[0]);
        $.ajax({
            url:"../php/ins_upd_pago.php",
            cache:false,
            type:"POST",
            contentType:false,
            data:datos_form,
            processData:false,
            success: function(datos){
                if(datos !== ''){
                    // alert(datos);
                    var panelbody = $(".class-edit-cobro").closest('.panel-body');
                    var mes = panelbody.data('mes');
                    var id_apto = $('#id_apto').val();
                    var id_tes = $("#rmb_tesoreria_id").val();
                    var altopag = resizePag();
                    var fecha = new Date();
                    var anio = fecha.getFullYear();

                    swal({
                        title: "Felicidades!",
                        text: "El registro se ha guardado correctamente!",
                        type: "success",
                        confirmButtonText: "Continuar",
                        confirmButtonColor: "#94B86E"
                    },
                    function(){
                        $(".ing-cal").load("estado-financiero.php?id_apto=" + id_apto + "&anio=" + anio);
                        $(".ing-cal").height(altopag);
                        $(".ing-cal").removeClass('hidden');
                    });
                }
                else{
                    setTimeout(esperehide, 1000);
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
    cargaNuevoEstadoFinanciero();
    $('#rmb_pagos_fpago').datepicker({format: "yyyy-mm-dd", autoclose: true});
</script>
<!-- FIN Pagina estado financiero -->