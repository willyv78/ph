<?php session_start();
require_once ("../conexion/conexion.php");
require_once ("../php/funciones.php");
//////////////////////////////////////////////////////////////////////////////////////
// Aplicación PHP usando Bootstrap, jquery, HTML5 y CSS - PH                        //
// Copyright 2014 Wilson Giovanny Velandia Barreto 3204274564 - willyv78@gmail.com  //
//////////////////////////////////////////////////////////////////////////////////////
$id_proy = $_SESSION['ProyId'];?>

<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 class-edit-cobro">
    <form id="form-new-concept" name="form-new-concept" action="" method="POST" class="form-horizontal" role="form">

        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6"><strong>Año</strong></div>
            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6"><strong>Mes</strong></div>
            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 text-right">
                <select name="anio" id="anio" class="form-control">
                    <option value="">Seleccione...</option>
                    <option value="2015">2015</option>
                    <option value="2016">2016</option>
                    <option value="2017">2017</option>
                </select>
            </div>
            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 text-right">
                <select name="mes" id="mes" class="form-control">
                    <option value="">Seleccione...</option>
                    <option value="1">Enero</option>
                    <option value="2">Febrero</option>
                    <option value="3">Marzo</option>
                    <option value="4">Abril</option>
                    <option value="5">Mayo</option>
                    <option value="6">Junio</option>
                    <option value="7">Julio</option>
                    <option value="8">Agosto</option>
                    <option value="9">Septiembre</option>
                    <option value="10">Octubre</option>
                    <option value="11">Noviembre</option>
                    <option value="12">Diciembre</option>
                </select>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6"><strong>Concepto</strong></div>
            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6"><strong>Valor</strong></div>
            
            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 text-right"><?php 
                $res_tpago = registroCampo("rmb_tpago tp", "tp.rmb_tpago_id, tp.rmb_tpago_nom", "", "", "ORDER BY tp.rmb_tpago_nom ASC");?>
                <select name="rmb_tpago_id-1" id="rmb_tpago_id-1" class="form-control select-concept">
                    <option value="" >Seleccione...</option><?php 
                        if($res_tpago){
                            if(mysql_num_rows($res_tpago) > 0){
                                while($row_tpago = mysql_fetch_array($res_tpago)){?>
                                    <option value="<?php echo $row_tpago[0];?>"><?php echo $row_tpago[1];?></option><?php 
                                }
                            }
                        }?>
                </select>
            </div>
            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 text-right">
                <input type="text" name="rmb_tes_concep_val-1" id="rmb_tes_concep_val-1" class="form-control text-right" value="" pattern="[0-9]" title="Valor del concepto" alt="Valor del concepto">
            </div>
            <div class="col-xs-10 col-sm-10 col-md-10 col-lg-10"><strong>Observación</strong></div>
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <textarea name="rmb_tesoreria_obs" id="rmb_tesoreria_obs" class="form-control" rows="3"></textarea>
            </div>

            <div class="clearfix">&nbsp;</div>
            <div data-id="" class="btn-group pull-right">
                <button type="button" class="btn btn-default btn-regresar">Regresar</button>
            </div>
            <div class="pull-right">&nbsp;</div>
            <div class="btn-group pull-right">
                <input type="hidden" name="id_apto2" id="id_apto2" class="form-control" value="">
                <button type="submit" class="btn btn-default btn-actualizar">Ingresar</button>
            </div>
        </div>

    </form>
</div>
<!-- jQuery -->
<script src="../js/jquery.min.js"></script>
<script src="../js/sweet-alert.js"></script><!-- Personalizar alertas -->
<!-- Libreria java script que realiza la validacion de los formulariosP -->
<script src="../js/bootstrapValidator.js"></script>
<script>
    // Agregamos campos para validar segun los encontrados en el formulario
    $( ".select-concept" ).each(function() {
        var id_select = $(this).attr('id');
        var num_tpago = id_select.split('rmb_tpago_id-');
        $('#form-new-concept').bootstrapValidator('addField', id_select, {
            validators: {
                notEmpty: {
                    message: 'Seleccione un concepto'
                }
            }
        });
        $('#form-new-concept').bootstrapValidator('addField', 'rmb_tes_concep_val-'+num_tpago[1], {
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
    });
    $('#form-new-concept').bootstrapValidator('addField', 'anio', {
        validators: {
            notEmpty: {
                message: 'Seleccione un año para el cobro'
            }
        }
    });
    $('#form-new-concept').bootstrapValidator('addField', 'mes', {
        validators: {
            notEmpty: {
                message: 'Seleccione un mes para el cobro'
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
        var id_apto = $("#id_apto").val();
        $("#id_apto2").val(id_apto);
        var datos_form = new FormData($("#form-new-concept")[0]);
        $.ajax({
            url:"../php/ins_upd_estfin.php",
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
</script>
<!-- FIN Pagina estado financiero -->