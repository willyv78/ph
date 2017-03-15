<?php session_start();
require_once ("../conexion/conexion.php");
require_once ("../php/funciones.php");
//////////////////////////////////////////////////////////////////////////////////////
// Aplicación PHP usando Bootstrap, jquery, HTML5 y CSS - PH                        //
// Copyright 2014 Wilson Giovanny Velandia Barreto 3204274564 - willyv78@gmail.com  //
//////////////////////////////////////////////////////////////////////////////////////
$id_proy = $_SESSION['ProyId'];
$id_tes = $_GET['id_tes'];?>

<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 class-edit-cobro"><?php 
    $res_concept = registroCampo("rmb_tes_concep c", "c.rmb_tes_concep_id, tp.rmb_tpago_ope, c.rmb_tes_concep_cant, c.rmb_tes_concep_val, tp.rmb_tpago_id", "LEFT JOIN rmb_tpago tp USING(rmb_tpago_id) WHERE c.rmb_tesoreria_id = '".$id_tes."'", "", "");
    if($res_concept){
        if(mysql_num_rows($res_concept) > 0){?>
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="col-xs-10 col-sm-10 col-md-10 col-lg-10"><strong>Concepto</strong></div>
                <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2"><strong>Valor</strong></div>
                <form id="form-concept" name="form-concept" action="" method="POST" class="form-horizontal" role="form"><?php
                    while($row_concept = mysql_fetch_array($res_concept)){?>
                        <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9 text-left"><?php 
                            $res_tpago = registroCampo("rmb_tpago tp", "tp.rmb_tpago_id, tp.rmb_tpago_nom", "", "", "ORDER BY tp.rmb_tpago_nom ASC");?>
                            <select name="rmb_tpago_id-<?php echo $row_concept[0];?>" id="rmb_tpago_id-<?php echo $row_concept[0];?>" class="form-control" required="required">
                                <option value="" <?php if($row_concept[0] == ''){echo 'selected="selected"';}?>>Seleccione...</option><?php 
                                    if($res_tpago){
                                        if(mysql_num_rows($res_tpago) > 0){
                                            while($row_tpago = mysql_fetch_array($res_tpago)){?>
                                                <option value="<?php echo $row_tpago[0];?>"<?php if($row_concept[4] == $row_tpago[0]){echo 'selected="selected"';} ?>><?php echo $row_tpago[1];?></option><?php 
                                            }
                                        }
                                    }?>
                            </select>
                        </div>
                        <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 text-right">
                            <input type="text" name="rmb_tes_concep_val-<?php echo $row_concept[0];?>" id="rmb_tes_concep_val-<?php echo $row_concept[0];?>" class="form-control text-right" value="<?php echo $row_concept[3];?>" pattern="[0-9]{1,}" title="Valor del concepto" alt="Valor del concepto">
                        </div>
                        <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1 text-center">
                            <button type="button" class="btn btn-default btn-del-concept" alt="Eliminar el concepto" title="Eliminar el concepto" data-concept="<?php echo $row_concept[0];?>"><i class="fa fa-remove"></i></button>
                        </div><?php 
                    }?>
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">&nbsp;</div>
                    <div class="pull-right">&nbsp;</div>
                    <div data-id="<?php echo $id_tes;?>" class="btn-group pull-right">
                        <button type="button" class="btn btn-default btn-regresar">Regresar</button>
                    </div>
                    <div class="pull-right">&nbsp;</div>
                    <div class="btn-group pull-right">
                        <input type="hidden" name="rmb_tesoreria_id" id="rmb_tesoreria_id" class="form-control" value="<?php echo $id_tes;?>">
                        <input type="hidden" name="id_upd" id="id_upd" class="form-control" value="<?php echo mysql_num_rows($res_concept);?>">
                        <button type="submit" class="btn btn-default btn-actualizar">Actualizar</button>
                    </div>
                    <div class="pull-right">&nbsp;</div>
                    <div data-id="<?php echo $id_tes;?>" class="btn-group pull-right">
                        <button type="button" class="btn btn-default btn-new-concept" alt="Agregar un nuevo concepto" title="Agregar un nuevo concepto"><i class="fa fa-plus"></i></button>
                    </div>
                </form>
            </div><?php 
        }
    }?>
</div>
<!-- jQuery -->
<script src="../js/jquery.min.js"></script>
<script src="../js/sweet-alert.js"></script><!-- Personalizar alertas -->
<!-- Libreria java script que realiza la validacion de los formulariosP -->
<script src="../js/bootstrapValidator.js"></script>
<script>
    // Agregamos campos para validar segun los encontrados en el formulario
    $( "select" ).each(function() {
        var id_select = $(this).attr('id');
        var num_tpago = id_select.split('rmb_tpago_id-');
        $('#form-concept').bootstrapValidator('addField', id_select, {
            validators: {
                notEmpty: {
                    message: 'Seleccione un concepto'
                }
            }
        });
        $('#form-concept').bootstrapValidator('addField', 'rmb_tes_concep_val-'+num_tpago[1], {
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
    // Validación formulario de datos del propietario
    $('#form-concept').bootstrapValidator({
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
        var datos_form = new FormData($("#form-concept")[0]);
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
    cargaEditarEstadoFinanciero();
</script>
<!-- FIN Pagina estado financiero -->