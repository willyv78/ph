<?php
session_start();
require_once ("../conexion/conexion.php");
require_once ("../php/funciones.php");
//////////////////////////////////////////////////////////////////////////////////////
// Aplicación PHP usando Bootstrap, jquery, HTML5 y CSS - PH                        //
// Copyright 2014 Wilson Giovanny Velandia Barreto 3204274564 - willyv78@gmail.com  //
//////////////////////////////////////////////////////////////////////////////////////
$id_apto = "";
if(isset($_GET['id_apto'])){
    $id_apto = $_GET['id_apto'];
}
?>
<div class="text-left">
    <form id="form_new_depos" name="form_new_depos" action="" method="POST" class="form-horizontal" role="form" enctype="multipart/form-data">
        <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <label class="col-xs-12 col-sm-4 col-md-5 col-lg-5 control-label" for="rmb_depos_nom">Número: </label>
            <div class="col-xs-12 col-sm-8 col-md-7 col-lg-5">
                <input type="text" name="rmb_depos_nom" id="rmb_depos_nom" class="form-control" value="" title="Número del deposito" placeholder="Número del deposito">
            </div>
        </div>
        <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <label class="col-xs-12 col-sm-4 col-md-5 col-lg-5 control-label" for="rmb_residente_nom2">Zona: </label>
            <div class="col-xs-12 col-sm-8 col-md-7 col-lg-5"><?php 
                echo campoSelectMaster("rmb_zonas z", "", "z.rmb_zonas_id, z.rmb_zonas_nom, t.rmb_torres_nom", "LEFT JOIN rmb_torres t USING (rmb_torres_id)", "", "ORDER BY t.rmb_torres_nom ASC, LENGTH(z.rmb_zonas_nom), z.rmb_zonas_nom");?>
            </div>
        </div>
        <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <label class="col-xs-12 col-sm-4 col-md-5 col-lg-5 control-label" for="rmb_depos_obs">Observación: </label>
            <div class="col-xs-12 col-sm-8 col-md-7 col-lg-5">
                <textarea name="rmb_depos_obs" id="rmb_depos_obs" class="form-control" rows="3" placeholder="Observaciones"></textarea>
            </div>
        </div>
        <div class="clearfix">&nbsp;</div>
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center">
            <input type="hidden" name="id_apto" id="id_apto" class="form-control" value="<?php echo $id_apto;?>">
            <button type="submit" class="btn btn-default"><img src="../css/plantilla1/img/actualizar.png" alt=""></button>
        </div>
        <div class="clearfix">&nbsp;</div>
    </form>
</div>
<div class="clearfix">&nbsp;</div>
<script>
    $(document).ready(function() {
        newParq();
        var id_apto = '<?php echo $id_apto;?>';
        // Validación formulario de datos del propietario
        $('#form_new_depos').bootstrapValidator({
            message: 'Este valor no es valido',
            feedbackIcons: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                rmb_depos_nom: {
                    message: 'El número de deposito no es valido',
                    validators: {
                        notEmpty: {
                            message: 'El número de deposito es requerido'
                        }
                    }
                },
                rmb_zonas_id: {
                    message: 'La zona del deposito no es valido',
                    validators: {
                        notEmpty: {
                            message: 'La zona del deposito es requerido'
                        }
                    }
                }
            }
        })
        .on('success.form.bv', function(e) {
            // Prevent form submission
            e.preventDefault();
            espereshow();
            var datos_form = new FormData($("#form_new_depos")[0]);
            $.ajax({
                url:"../php/ins_new_depos.php",
                cache:false,
                type:"POST",
                contentType:false,
                data:datos_form,
                processData:false,
                success: function(datos){
                    if(datos !== ''){
                        // alert(datos);
                        $("#col-md-12").load('detalle-del-apartamento.php?id_apto='+id_apto);
                        
                        swal({
                            title: "Felicidades!",
                            text: "El registro se ha guardado correctamente!",
                            type: "success",
                            confirmButtonText: "Continuar",
                            confirmButtonColor: "#94B86E"
                        },
                        function(){
                            $("#deposito").addClass('activo');
                            pag = "form_lista_depos.php?id_apto="+id_apto+"&tipo_nom=depositos";
                            $("#deposito").parent().next().load(pag);
                            $("#deposito").parent().next().show();
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
    });
</script>