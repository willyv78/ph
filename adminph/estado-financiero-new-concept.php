<?php session_start();
require_once ("../conexion/conexion.php");
require_once ("../php/funciones.php");
//////////////////////////////////////////////////////////////////////////////////////
// Aplicación PHP usando Bootstrap, jquery, HTML5 y CSS - PH                        //
// Copyright 2014 Wilson Giovanny Velandia Barreto 3204274564 - willyv78@gmail.com  //
//////////////////////////////////////////////////////////////////////////////////////
$id_tes = $_GET['id_tes'];
?>
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
    <div class="col-xs-10 col-sm-10 col-md-10 col-lg-10"><strong>Concepto</strong></div>
    <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 text-right"><strong>Valor</strong></div>
    <form id="form-new-concept" name="form-new-concept" action="" method="POST" class="form-horizontal" role="form">

        <div class="col-xs-10 col-sm-10 col-md-10 col-lg-10 text-left"><?php 
            $res_tpago = registroCampo("rmb_tpago tp", "tp.rmb_tpago_id, tp.rmb_tpago_nom", "", "", "ORDER BY tp.rmb_tpago_nom ASC");?>
            <select name="rmb_tpago_id" id="rmb_tpago_id" class="form-control" required="required">
                <option value="" selected="selected">Seleccione...</option><?php 
                    if($res_tpago){
                        if(mysql_num_rows($res_tpago) > 0){
                            while($row_tpago = mysql_fetch_array($res_tpago)){?>
                                <option value="<?php echo $row_tpago[0];?>"><?php echo $row_tpago[1];?></option><?php 
                            }
                        }
                    }?>
            </select>
        </div>
        <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 text-right">
            <input type="text" name="rmb_tes_concep_val" id="rmb_tes_concep_val" class="form-control text-right" value="" pattern="[0-9]{1,}" title="Valor del concepto" alt="Valor del concepto">
        </div>
        <div class="clearfix">&nbsp;</div>
        <div data-id="<?php echo $id_tes;?>" class="btn-group pull-right">
            <button type="button" class="btn btn-default btn-regresar">Regresar</button>
        </div>
        <div class="pull-right">&nbsp;</div>
        <div class="btn-group pull-right">
            <input type="hidden" name="rmb_tesoreria_id" id="rmb_tesoreria_id" class="form-control" value="<?php echo $id_tes;?>">
            <input type="hidden" name="id_upd" id="id_upd" class="form-control" value="<?php echo mysql_num_rows($res_concept);?>">
            <button type="submit" class="btn btn-default btn-ingresar">Ingresar</button>
        </div>
    </form>
</div>
<!-- jQuery -->
<script src="../js/jquery.min.js"></script>
<script src="../js/sweet-alert.js"></script><!-- Personalizar alertas -->
<!-- Libreria java script que realiza la validacion de los formulariosP -->
<script src="../js/bootstrapValidator.js"></script>
<script>
    $('#form-new-concept').bootstrapValidator('addField', 'rmb_tpago_id', {
        validators: {
            notEmpty: {
                message: 'Seleccione un concepto'
            }
        }
    });
    $('#form-new-concept').bootstrapValidator('addField', 'rmb_tes_concep_val', {
        validators: {
            notEmpty: {
                message: 'Digite un valor para el concepto'
            },
            regexp: {
                regexp: /^[0-9]+$/,
                message: 'El valor para el concepto debe contener solo números.'
            }
        }
    });
    // Validación formulario de datos del propietario
    $('#form-new-concept').bootstrapValidator({
        message: 'Este valor no es valido',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        }
    })
    .on('success.form.bv', function(e) {
        // Prevent form submission
        e.preventDefault();
        espereshow();
        var datos_form = new FormData($("#form-new-concept")[0]);
        $.ajax({
            url:"../php/ins_upd_newconcept.php",
            cache:false,
            type:"POST",
            contentType:false,
            data:datos_form,
            processData:false,
            success: function(datos){
                if(datos !== ''){
                    // alert(datos);
                    var panelbody = $("#form-new-concept").closest('.panel-body');
                    var mes = panelbody.data('mes');
                    var anio = panelbody.data('anio');
                    var id_apto = $('#id_apto').val();
                    var id_tes = $("#rmb_tesoreria_id").val();
                    var altopag = resizePag();

                    swal({
                        title: "Felicidades!",
                        text: "El registro se ha guardado correctamente!",
                        type: "success",
                        confirmButtonText: "Continuar",
                        confirmButtonColor: "#94B86E"
                    },
                    function(){
                        // $(panelbody).load("estado-financiero-editar-cobro.php?id_tes="+id_tes);
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
    cargaNuevoConceptoEstadoFinanciero();
</script>
<!-- FIN Pagina estado financiero -->