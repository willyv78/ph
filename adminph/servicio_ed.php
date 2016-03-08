<?php
session_start();
require_once ("../conexion/conexion.php");
require_once ("../php/funciones.php");
//////////////////////////////////////////////////////////////////////////////////////
// Aplicación PHP usando Bootstrap, jquery, HTML5 y CSS - PH                        //
// Copyright 2014 Wilson Giovanny Velandia Barreto 3204274564 - willyv78@gmail.com  //
//////////////////////////////////////////////////////////////////////////////////////

$id_apto = "";
$id_habita = "";
if(isset($_GET['id_habita'])){
    $id_habita = $_GET['id_habita'];
}
if(isset($_GET['id_apto'])){
    $id_apto = $_GET['id_apto'];
}
// Datos del propietario
$autori_id = "";$autori_nom = "";$autori_ape = "";$autori_doc = "";$autori_dir = "";$autori_tel = "";$autori_cel = "";$autori_pass = "";$autori_email = "";$autori_fnac = "";$autori_nom2 = "";$autori_obs = "";$autori_fini = "";$autori_ffin = "";$autori_foto = "";$autori_gen = "";$autori_hijo = "";$autori_vive = "";$autori_perm = "";$autori_perf = "";$autori_carg = "";$autori_vinculo = "";$autori_tdoc = "";$autori_est = "";
$res_habita = registroCampo("rmb_residente_x_aptos rxa", "r.rmb_residente_id, r.rmb_residente_nom, r.rmb_residente_ape, r.rmb_residente_doc, r.rmb_residente_dir, r.rmb_residente_tel, r.rmb_residente_cel, r.rmb_residente_pass, r.rmb_residente_email, r.rmb_residente_fnac, r.rmb_residente_nom2, r.rmb_residente_obs, r.rmb_residente_fini, r.rmb_residente_ffin, r.rmb_residente_foto, r.rmb_gen_id, r.rmb_residente_hijo, r.rmb_residente_vive, r.rmb_residente_perm, r.rmb_perf_id, r.rmb_carg_id, r.rmb_vinculo_id, r.rmb_tdoc_id, r.rmb_est_id", "LEFT JOIN rmb_residente r USING(rmb_residente_id) WHERE rxa.rmb_aptos_id = '$id_apto' AND rxa.rmb_residente_id = '$id_habita' AND rxa.rmb_tres_id = '5'", "", "");
if($res_habita){
    if(mysql_num_rows($res_habita) > 0){
        $row_habita = mysql_fetch_array($res_habita);
        $autori_id = $row_habita[0];$autori_nom = $row_habita[1];$autori_ape = $row_habita[2];$autori_doc = $row_habita[3];$autori_dir = $row_habita[4];$autori_tel = $row_habita[5];$autori_cel = $row_habita[6];$autori_pass = $row_habita[7];$autori_email = $row_habita[8];$autori_fnac = $row_habita[9];$autori_nom2 = $row_habita[10];$autori_obs = $row_habita[11];$autori_fini = $row_habita[12];$autori_ffin = $row_habita[13];$autori_foto = $row_habita[14];$autori_gen = $row_habita[15];$autori_hijo = $row_habita[16];$autori_vive = $row_habita[17];$autori_perm = $row_habita[18];$autori_perf = $row_habita[19];$autori_carg = $row_habita[20];$autori_vinculo = $row_habita[21];$autori_tdoc = $row_habita[22];$autori_est = $row_habita[23];
    }
}
?>
<div class="text-left">
    <form id="form_servicio" name="form_servicio" action="" method="POST" class="form-horizontal" role="form" enctype="multipart/form-data">
        <div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6">
            <label class="col-xs-12 col-sm-7 col-md-5 col-lg-5 control-label" for="rmb_residente_nom">Nombres: </label>
            <div class="col-xs-12 col-sm-5 col-md-7 col-lg-7">
                <input class="form-control" type="text" id="rmb_residente_nom" name="rmb_residente_nom" placeholder="Nombres" <?php echo $desabilitar;?> value="<?php echo $autori_nom;?>">
            </div>
        </div>
        <div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6">
            <label class="col-xs-12 col-sm-7 col-md-5 col-lg-5 control-label" for="rmb_residente_ape">Apellidos: </label>
            <div class="col-xs-12 col-sm-5 col-md-7 col-lg-7">
                <input class="form-control" type="text" id="rmb_residente_ape" name="rmb_residente_ape" placeholder="Apellidos" <?php echo $desabilitar;?> value="<?php echo $autori_ape;?>">
            </div>
        </div>
        <div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6">
            <label class="col-xs-12 col-sm-7 col-md-5 col-lg-5 control-label" for="rmb_tdoc_id">Tipo Identificación: </label>
            <div class="col-xs-12 col-sm-5 col-md-7 col-lg-7">
                <?php echo campoSelect($autori_tdoc, "rmb_tdoc");?>
            </div>
        </div>
        <div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6">
            <label class="col-xs-12 col-sm-7 col-md-5 col-lg-5 control-label" for="rmb_residente_doc">No. Identificación: </label>
            <div class="col-xs-12 col-sm-5 col-md-7 col-lg-7">
                <input class="form-control" type="text" id="rmb_residente_doc" name="rmb_residente_doc" placeholder="Número de identificación" <?php echo $desabilitar;?> value="<?php echo $autori_doc;?>">
            </div>
        </div>
        <div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6">
            <label class="col-xs-12 col-sm-7 col-md-5 col-lg-5 control-label" for="rmb_residente_dir">Dirección: </label>
            <div class="col-xs-12 col-sm-5 col-md-7 col-lg-7">
                <input class="form-control" type="text" id="rmb_residente_dir" name="rmb_residente_dir" placeholder="Dirección de correspondencia" <?php echo $desabilitar;?> value="<?php echo $autori_dir;?>">
            </div>
        </div>
        <div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6">
            <label class="col-xs-12 col-sm-7 col-md-5 col-lg-5 control-label" for="rmb_residente_tel">Teléfono fijo: </label>
            <div class="col-xs-12 col-sm-5 col-md-7 col-lg-7">
                <input class="form-control" type="text" id="rmb_residente_tel" name="rmb_residente_tel" placeholder="Número de teléfono fijo" <?php echo $desabilitar;?> value="<?php echo $autori_tel;?>">
            </div>
        </div>
        <div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6">
            <label class="col-xs-12 col-sm-7 col-md-5 col-lg-5 control-label" for="rmb_residente_cel">Teléfono Celular: </label>
            <div class="col-xs-12 col-sm-5 col-md-7 col-lg-7">
                <input class="form-control" type="text" id="rmb_residente_cel" name="rmb_residente_cel" placeholder="Número de teléfono celular" <?php echo $desabilitar;?> value="<?php echo $autori_cel;?>">
            </div>
        </div>
        <div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6">
            <label class="col-xs-12 col-sm-7 col-md-5 col-lg-5 control-label" for="rmb_residente_email">Correo Electrónico: </label>
            <div class="col-xs-12 col-sm-5 col-md-7 col-lg-7">
                <input class="form-control" type="text" id="rmb_residente_email" name="rmb_residente_email" placeholder="Correo Electrónico" <?php echo $desabilitar;?> value="<?php echo $autori_email;?>">
            </div>
        </div>
        <div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6">
            <label class="col-xs-12 col-sm-7 col-md-5 col-lg-5 control-label" for="rmb_residente_pass">Password: </label>
            <div class="col-xs-12 col-sm-5 col-md-7 col-lg-7">
                <input class="form-control" type="text" id="rmb_residente_pass" name="rmb_residente_pass" placeholder="Clave de acceso a la aplicación" <?php echo $desabilitar;?> value="<?php echo $autori_pass;?>">
            </div>
        </div>
        <div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6">
            <label class="col-xs-12 col-sm-7 col-md-5 col-lg-5 control-label" for="rmb_residente_fnac">Fecha de Nacimiento: </label>
            <div class="col-xs-12 col-sm-5 col-md-7 col-lg-7">
                <input class="form-control" type="text" id="rmb_residente_fnac_habita" name="rmb_residente_fnac" placeholder="yyyy/mm/dd" <?php echo $desabilitar;?> value="<?php echo $autori_fnac;?>">
            </div>
        </div>
        <div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6">
            <label class="col-xs-12 col-sm-7 col-md-5 col-lg-5 control-label" for="rmb_gen_id">Género: </label>
            <div class="col-xs-12 col-sm-5 col-md-7 col-lg-7">
                <div class="radio">
                    <label>
                        <input type="radio" name="rmb_gen_id" id="rmb_gen_id1" value="1" <?php if($autori_gen == '1'){echo 'checked="checked"';}?>>Masculino
                    </label>
                    <label>
                        <input type="radio" name="rmb_gen_id" id="rmb_gen_id2" value="0" <?php if($autori_gen <> '1'){echo 'checked="checked"';}?>>Femenino
                    </label>
                </div>
            </div>
        </div>
        <div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6">
            <label class="col-xs-12 col-sm-7 col-md-5 col-lg-5 control-label" for="rmb_residente_hijo">¿Hijos?: </label>
            <div class="col-xs-12 col-sm-5 col-md-7 col-lg-7">
                <div class="radio">
                    <label>
                        <input type="radio" name="rmb_residente_hijo" id="rmb_residente_hijo1" value="1" <?php if($autori_hijo == '1'){echo 'checked="checked"';}?>>SI
                    </label>
                    <label>
                        <input type="radio" name="rmb_residente_hijo" id="rmb_residente_hijo2" value="0" <?php if($autori_hijo <> '1'){echo 'checked="checked"';}?>>NO
                    </label>
                </div>
            </div>
        </div>
        <div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6">
            <label class="col-xs-12 col-sm-7 col-md-5 col-lg-5 control-label" for="rmb_residente_vive">¿Vive Aquí?: </label>
            <div class="col-xs-12 col-sm-5 col-md-7 col-lg-7">
                <div class="radio">
                    <label>
                        <input type="radio" name="rmb_residente_vive" id="rmb_residente_vive1" value="1" <?php if($autori_vive == '1'){echo 'checked="checked"';}?>>SI
                    </label>
                    <label>
                        <input type="radio" name="rmb_residente_vive" id="rmb_residente_vive2" value="0" <?php if($autori_vive <> '1'){echo 'checked="checked"';}?>>NO
                    </label>
                </div>
            </div>
        </div>
        <div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6">
            <label class="col-xs-12 col-sm-7 col-md-5 col-lg-5 control-label" for="rmb_perf_id">Perfil: </label>
            <div class="col-xs-12 col-sm-5 col-md-7 col-lg-7">
                <?php echo campoSelect($autori_perf, "rmb_perf");?>
            </div>
        </div>
        <div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6">
            <label class="col-xs-12 col-sm-7 col-md-5 col-lg-5 control-label" for="rmb_est_id">Estado: </label>
            <div class="col-xs-12 col-sm-5 col-md-7 col-lg-7">
                <?php echo campoSelectEst($autori_est, "rmb_est", "10");?>
            </div>
        </div>
        <div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6">
            <label class="col-xs-12 col-sm-7 col-md-5 col-lg-5 control-label" for="rmb_vinculo_id">Vínculo: </label>
            <div class="col-xs-12 col-sm-5 col-md-7 col-lg-7">
                <?php echo campoSelect($autori_vinculo, "rmb_vinculo");?>
            </div>
        </div>
        <div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6">
            <label class="col-xs-12 col-sm-7 col-md-5 col-lg-5 control-label" for="rmb_residente_obs">Observación: </label>
            <div class="col-xs-12 col-sm-5 col-md-7 col-lg-7">
                <textarea name="rmb_residente_obs" id="rmb_residente_obs" rows="3" placeholder="Ingrese una observación del propietario, algo que le ayude a recordar de quien se trata, o tambien puede colocar el horario en que el contacto esta disponible, si cree que NO es necesario deje el campo en blanco." class="form-control" ><?php echo $autori_obs;?></textarea>
            </div>
        </div>
        <div class="clearfix">&nbsp;</div>
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center"><?php 
            if($autori_id){?>
                <input type="hidden" name="id_upd" id="id_upd" class="form-control" value="<?php echo $autori_id;?>">
            <?php }?>
            <input type="hidden" name="id_apto" id="id_apto" class="form-control" value="<?php echo $id_apto;?>">
            <button type="submit" class="btn btn-default"><img src="../css/plantilla1/img/actualizar.png" alt=""></button>
            <button id="cancelar" name="servicio.php" type="button" class="btn btn-default">Cancelar</button>
        </div>
        <div class="clearfix">&nbsp;</div>
    </form>
</div>

<script type="text/javascript" src="../js/bootstrapValidator.js"></script>
<script>
    $(document).ready(function($) {
        editarServicio();
        var id_apto = '<?php echo $id_apto;?>';
        // Validación formulario de datos del habitante
        $('#form_servicio').bootstrapValidator({
            message: 'Este valor no es valido',
            feedbackIcons: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                rmb_residente_nom: {
                    message: 'El nombre del propietario no es valido',
                    validators: {
                        notEmpty: {
                            message: 'El nombre del propietario es requerido'
                        },
                        stringLength: {
                            min: 1,
                            max: 50,
                            message: 'El nombre del propietario debe contener de 3 a 50 characteres'
                        },
                        regexp: {
                            regexp: /^[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ\_\s\.\-]+$/,
                            message: 'El nombre del propietario debe ser alfanumérico.'
                        }
                    }
                },
                rmb_residente_ape: {
                    message: 'El apellido del propietario no es valido',
                    validators: {
                        notEmpty: {
                            message: 'El apellido del propietario es requerido'
                        },
                        stringLength: {
                            min: 1,
                            max: 50,
                            message: 'El apellido del propietario debe contener de 3 a 50 characteres'
                        },
                        regexp: {
                            regexp: /^[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ\_\s\.\-]+$/,
                            message: 'El apellido del propietario debe ser alfanumérico.'
                        }
                    }
                },
                rmb_tdoc_id: {
                    message: 'El tipo de documento de identificación no es valida',
                    validators: {
                        notEmpty: {
                            message: 'El tipo de documento de identificación es requerida'
                        }
                    }
                },
                rmb_residente_doc: {
                    message: 'El número de documento de identificación del propietario no es valido',
                    validators: {
                        notEmpty: {
                            message: 'El número de documento de identificación del propietario es requerido'
                        },
                        stringLength: {
                            min: 1,
                            max: 50,
                            message: 'El número de documento de identificación del propietario debe contener de 3 a 50 characteres'
                        },
                        regexp: {
                            regexp: /^[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ\_\s\.\-]+$/,
                            message: 'El número de documento de identificación del propietario debe ser alfanumérico.'
                        }
                    }
                },
                rmb_perf_id: {
                    message: 'El perfil no es valido',
                    validators: {
                        notEmpty: {
                            message: 'El perfil es requerido'
                        }
                    }
                },
                rmb_est_id: {
                    message: 'El estado no es valido',
                    validators: {
                        notEmpty: {
                            message: 'El estado es requerido'
                        }
                    }
                }
            }
        })
        .on('success.form.bv', function(e) {
            // Prevent form submission
            e.preventDefault();
            espereshow();
            var datos_form = new FormData($("#form_servicio")[0]);
            $.ajax({
                url:"../php/ins_upd_servi.php",
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
                            $("#pers").addClass('activo');
                            $("#pers").parent().next().show();
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
<script type="text/javascript">
    $('#rmb_residente_fnac_habita').datepicker({format: "yyyy-mm-dd", autoclose: true});
</script>