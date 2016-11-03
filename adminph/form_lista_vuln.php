<?php
session_start();
require_once ("../conexion/conexion.php");
require_once ("../php/funciones.php");
//////////////////////////////////////////////////////////////////////////////////////
// Aplicación PHP usando Bootstrap, jquery, HTML5 y CSS - PH                        //
// Copyright 2014 Wilson Giovanny Velandia Barreto 3204274564 - willyv78@gmail.com  //
//////////////////////////////////////////////////////////////////////////////////////

$id_apto = "";$id_vuln = "";$vuln_id = "";$vuln_placa = "";$vuln_marca = "";$vuln_mod = "";$vuln_color = "";$vuln_obs = "";$vuln_tipo = "";$vuln_parq = "";
if(isset($_GET['id_apto'])){
    $id_apto = $_GET['id_apto'];
}
if(isset($_GET['id_vuln'])){
    $id_vuln = $_GET['id_vuln'];
    $res_veh = registroCampo("rmb_vulnera v", "*", "WHERE v.rmb_vulnera_id = '$id_vuln'", "", "");
    if($res_veh){
        if(mysql_num_rows($res_veh) > 0){
            $row_veh = mysql_fetch_array($res_veh);
            $vuln_id = $row_veh[0];
            $vuln_obs = $row_veh[1];
            $vuln_tipo = $row_veh[2];
        }
    }
}
?>
<div class="text-left">
    <form id="form_vuln" name="form_vuln" action="" method="POST" class="form-horizontal" role="form" enctype="multipart/form-data">
        <!-- Tipo -->
        <?php if($vuln_tipo <> ''){$class_vuln_tipo = "";}else{$class_vuln_tipo = "has-error";}?>
        <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12 <?php echo $class_vuln_tipo;?>">
            <label class="col-xs-12 col-sm-5 col-md-5 col-lg-5 control-label" for="rmb_tvulnera_id">Tipo: </label>
            <div class="col-xs-10 col-sm-5 col-md-5 col-lg-5"><?php 
                echo campoSelect($vuln_tipo, "rmb_tvulnera");?>
            </div>
        </div>
        <!-- Observación -->
        <?php if($vuln_obs <> ''){$class_vuln_obs = "";}else{$class_vuln_obs = "has-error";}?>
        <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12 <?php echo $class_vuln_obs;?>">
            <label class="col-xs-12 col-sm-5 col-md-5 col-lg-5 control-label" for="rmb_vulnera_obs">Observación: </label>
            <div class="col-xs-10 col-sm-5 col-md-5 col-lg-5">
                <textarea name="rmb_vulnera_obs" id="rmb_vulnera_obs" class="form-control" rows="3" placeholder="Describa el posible riesgo que presenta el apartamento"><?php echo $vuln_obs;?></textarea>
            </div>
        </div>
        <div class="clearfix">&nbsp;</div>
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center"><?php 
            if($id_vuln){?>
                <input type="hidden" name="id_upd" id="id_upd" class="form-control" value="<?php echo $id_vuln;?>">
            <?php }?>
            <input type="hidden" name="id_apto" id="id_apto" class="form-control" value="<?php echo $id_apto;?>">
            <button type="submit" class="btn" alt="Ingresar / Actualizar datos de vulnerabilidad" title="Ingresar / Actualizar datos de vulnerabilidad" style="border: none;background-color: transparent;"><img src="../css/plantilla1/img/actualizar.png" alt=""></button>
        </div>
        <div class="clearfix">&nbsp;</div>
    </form>
</div>
<div class="clearfix">&nbsp;</div>
<script>
    $(document).ready(function() {
        setTimeout(esperehide, 500);
        var id_apto = '<?php echo $id_apto;?>';
        // Validación formulario de datos del propietario
        $('#form_vuln').bootstrapValidator({
            message: 'Este valor no es valido',
            feedbackIcons: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                rmb_tvulnera_id: {
                    message: 'El tipo de vulnerabilidad no es valido',
                    validators: {
                        notEmpty: {
                            message: 'El tipo de vulnerabilidad es requerido'
                        }
                    }
                },
                rmb_vulnera_obs: {
                    message: 'La observacion de la vulnerabilidad no es valido',
                    validators: {
                        notEmpty: {
                            message: 'La observacion de la vulnerabilidad es requerido'
                        },
                        stringLength: {
                            min: 3,
                            max: 255,
                            message: 'La observacion de la vulnerabilidad debe contener de 3 a 255 characteres'
                        },
                        regexp: {
                            regexp: /^[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ\_\s\.\-\,\;\:]+$/,
                            message: 'La observacion de la vulnerabilidad debe contener solo letras y números.'
                        }
                    }
                }
            }
        })
        .on('success.form.bv', function(e) {
            // Prevent form submission
            e.preventDefault();
            espereshow();
            var datos_form = new FormData($("#form_vuln")[0]);
            $.ajax({
                url:"../php/ins_upd_vuln.php",
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
                            $("#vulnerabilidad").addClass('activo');
                            pag = "lista_vulnerabilidades.php?id_apto="+id_apto+"&tipo_nom=vulnerabilidades";
                            $("#vulnerabilidad").parent().next().load(pag);
                            $("#vulnerabilidad").parent().next().show();
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