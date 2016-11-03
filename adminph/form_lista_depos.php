<?php
session_start();
require_once ("../conexion/conexion.php");
require_once ("../php/funciones.php");
//////////////////////////////////////////////////////////////////////////////////////
// Aplicación PHP usando Bootstrap, jquery, HTML5 y CSS - PH                        //
// Copyright 2014 Wilson Giovanny Velandia Barreto 3204274564 - willyv78@gmail.com  //
//////////////////////////////////////////////////////////////////////////////////////

$id_apto = "";$id_depos = "";
if(isset($_GET['id_apto'])){
    $id_apto = $_GET['id_apto'];
}
if(isset($_GET['id_depos'])){
    $id_depos = $_GET['id_depos'];
}
$where = "";
?>
<div class="text-left">
    <form id="form_depos" name="form_depos" action="" method="POST" class="form-horizontal" role="form" enctype="multipart/form-data">
        <!-- Placa -->
        <?php if($id_depos <> ''){$class_dep = "";}else{$class_dep = "has-error";}?>
        <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12 <?php echo $class_dep;?>">
            <label class="col-xs-12 col-sm-5 col-md-5 col-lg-5 control-label" for="rmb_residente_nom2">Depósito: </label>
            <div class="col-xs-10 col-sm-5 col-md-5 col-lg-2"><?php 
                if($id_depos <> ''){
                    $where = "OR (rmb_depos_id = '$id_depos')";
                }
                echo campoSelectMaster("rmb_depos d", $id_depos, "d.rmb_depos_id, d.rmb_depos_nom, z.rmb_zonas_nom, t.rmb_torres_nom", "LEFT JOIN rmb_zonas z USING (rmb_zonas_id) LEFT JOIN rmb_torres t USING (rmb_torres_id) WHERE (d.rmb_aptos_id = 0) $where", "", "ORDER BY LENGTH(d.rmb_depos_nom), d.rmb_depos_nom, d.rmb_zonas_id ASC");?>
            </div>
            <!-- <span class="col-xs-2 col-sm-2 col-md-2 col-lg-2 btn btn-warning" title="Nuevo Depósito"><i class="glyphicon glyphicon-plus"></i></span> -->
        </div>
        <div class="clearfix">&nbsp;</div>
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center"><?php 
            if($id_depos){?>
                <input type="hidden" name="id_upd" id="id_upd" class="form-control" value="<?php echo $id_depos;?>">
            <?php }?>
            <input type="hidden" name="id_apto" id="id_apto" class="form-control" value="<?php echo $id_apto;?>">
            <button type="submit" class="btn btn-default" alt="Ingresar / Actualizar datos del depósito" title="Ingresar / Actualizar datos del depósito">Actualizar</button>
            <button type="button" class="btn btn-default regresar">Regresar</button>
        </div>
        <div class="clearfix">&nbsp;</div>
    </form>
</div>
<div class="clearfix">&nbsp;</div>
<!-- jQuery -->
<script src="../js/jquery.min.js"></script>
<script src="../js/sweet-alert.js"></script><!-- Personalizar alertas -->
<script src="../js/bootstrapValidator.js"></script>
<script>
    $(document).ready(function() {
        newDepos();
        var id_apto = '<?php echo $id_apto;?>';
        // Validación formulario de datos del propietario
        $('#form_depos').bootstrapValidator({
            message: 'Este valor no es valido',
            feedbackIcons: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                rmb_depos_id: {
                    message: 'El depósito no es valido',
                    validators: {
                        notEmpty: {
                            message: 'El depósito es requerido'
                        }
                    }
                }
            }
        })
        .on('success.form.bv', function(e) {
            // Prevent form submission
            e.preventDefault();
            espereshow();
            var datos_form = new FormData($("#form_depos")[0]);
            $.ajax({
                url:"../php/ins_upd_depos.php",
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
                            pag = "lista_depositos.php?id_apto="+id_apto+"&tipo_nom=depositos";
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
        function volverAtras(argument) {
            pag = "lista_depositos.php?id_apto="+id_apto+"&tipo_nom=depositos";
            $("#deposito").parent().next().load(pag);
        }
        $(".regresar").on("click", volverAtras);
    });
</script>