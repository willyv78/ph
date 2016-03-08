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
$tipo_res = "";
if(isset($_GET['tipo_res'])){
    $tipo_res = $_GET['tipo_res'];
}
if(isset($_GET['id_habita'])){
    $id_habita = $_GET['id_habita'];
}
if(isset($_GET['id_apto'])){
    $id_apto = $_GET['id_apto'];
}
// Datos del propietario, arrendatario, banco, inmobiliaria, habitante, personal de servicio, personas autorizadas y en caso de emergencia
$reside_id = "";$reside_nom = "";$reside_ape = "";$reside_doc = "";$reside_dir = "";$reside_tel = "";$reside_cel = "";$reside_pass = "";$reside_email = "";$reside_fnac = "";$reside_nom2 = "";$reside_obs = "";$reside_fini = "";$reside_ffin = "";$reside_foto = "";$reside_gen = "";$reside_hijo = "";$reside_vive = "";$reside_perm = "";$reside_perf = "";$reside_carg = "";$reside_vinculo = "";$reside_tdoc = "";$reside_est = "";
$res_reside = registroCampo("rmb_residente_x_aptos rxa", "r.rmb_residente_id, r.rmb_residente_nom, r.rmb_residente_ape, r.rmb_residente_doc, r.rmb_residente_dir, r.rmb_residente_tel, r.rmb_residente_cel, r.rmb_residente_pass, r.rmb_residente_email, r.rmb_residente_fnac, r.rmb_residente_nom2, r.rmb_residente_obs, r.rmb_residente_fini, r.rmb_residente_ffin, r.rmb_residente_foto, r.rmb_gen_id, r.rmb_residente_hijo, r.rmb_residente_vive, r.rmb_residente_perm, r.rmb_perf_id, r.rmb_carg_id, r.rmb_vinculo_id, r.rmb_tdoc_id, r.rmb_est_id", "LEFT JOIN rmb_residente r USING(rmb_residente_id) WHERE rxa.rmb_aptos_id = '$id_apto' AND rxa.rmb_residente_id = '$id_habita'", "", "");
if($res_reside){
    if(mysql_num_rows($res_reside) > 0){
        $row_reside = mysql_fetch_array($res_reside);
        $reside_id = $row_reside[0];$reside_nom = $row_reside[1];$reside_ape = $row_reside[2];$reside_doc = $row_reside[3];$reside_dir = $row_reside[4];$reside_tel = $row_reside[5];$reside_cel = $row_reside[6];$reside_pass = $row_reside[7];$reside_email = $row_reside[8];$reside_fnac = $row_reside[9];$reside_nom2 = $row_reside[10];$reside_obs = $row_reside[11];$reside_fini = $row_reside[12];$reside_ffin = $row_reside[13];$reside_foto = $row_reside[14];$reside_gen = $row_reside[15];$reside_hijo = $row_reside[16];$reside_vive = $row_reside[17];$reside_perm = $row_reside[18];$reside_perf = $row_reside[19];$reside_carg = $row_reside[20];$reside_vinculo = $row_reside[21];$reside_tdoc = $row_reside[22];$reside_est = $row_reside[23];
    }
}
?>
<div class="text-left">
    <form id="form_reside" name="form_reside" action="" method="POST" class="form-horizontal" role="form" enctype="multipart/form-data">
        <div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6">
            <label class="col-xs-12 col-sm-7 col-md-5 col-lg-5 control-label" for="rmb_residente_nom">Nombres: </label>
            <div class="col-xs-12 col-sm-5 col-md-7 col-lg-7">
                <input class="form-control" type="text" id="rmb_residente_nom" name="rmb_residente_nom" placeholder="Nombres" <?php echo $desabilitar;?> value="<?php echo $reside_nom;?>">
            </div>
        </div>
        <div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6">
            <label class="col-xs-12 col-sm-7 col-md-5 col-lg-5 control-label" for="rmb_residente_ape">Apellidos: </label>
            <div class="col-xs-12 col-sm-5 col-md-7 col-lg-7">
                <input class="form-control" type="text" id="rmb_residente_ape" name="rmb_residente_ape" placeholder="Apellidos" <?php echo $desabilitar;?> value="<?php echo $reside_ape;?>">
            </div>
        </div>
        <div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6">
            <label class="col-xs-12 col-sm-7 col-md-5 col-lg-5 control-label" for="rmb_tdoc_id">Tipo Identificación: </label>
            <div class="col-xs-12 col-sm-5 col-md-7 col-lg-7">
                <?php echo campoSelect($reside_tdoc, "rmb_tdoc");?>
            </div>
        </div>
        <div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6">
            <label class="col-xs-12 col-sm-7 col-md-5 col-lg-5 control-label" for="rmb_residente_doc">No. Identificación: </label>
            <div class="col-xs-12 col-sm-5 col-md-7 col-lg-7">
                <input class="form-control" type="text" id="rmb_residente_doc" name="rmb_residente_doc" placeholder="Número de identificación" <?php echo $desabilitar;?> value="<?php echo $reside_doc;?>">
            </div>
        </div>
        <div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6">
            <label class="col-xs-12 col-sm-7 col-md-5 col-lg-5 control-label" for="rmb_residente_dir">Dirección: </label>
            <div class="col-xs-12 col-sm-5 col-md-7 col-lg-7">
                <input class="form-control" type="text" id="rmb_residente_dir" name="rmb_residente_dir" placeholder="Dirección de correspondencia" <?php echo $desabilitar;?> value="<?php echo $reside_dir;?>">
            </div>
        </div>
        <div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6">
            <label class="col-xs-12 col-sm-7 col-md-5 col-lg-5 control-label" for="rmb_residente_tel">Teléfono fijo: </label>
            <div class="col-xs-12 col-sm-5 col-md-7 col-lg-7">
                <input class="form-control" type="text" id="rmb_residente_tel" name="rmb_residente_tel" placeholder="Número de teléfono fijo" <?php echo $desabilitar;?> value="<?php echo $reside_tel;?>">
            </div>
        </div>
        <div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6">
            <label class="col-xs-12 col-sm-7 col-md-5 col-lg-5 control-label" for="rmb_residente_cel">Teléfono Celular: </label>
            <div class="col-xs-12 col-sm-5 col-md-7 col-lg-7">
                <input class="form-control" type="text" id="rmb_residente_cel" name="rmb_residente_cel" placeholder="Número de teléfono celular" <?php echo $desabilitar;?> value="<?php echo $reside_cel;?>">
            </div>
        </div>
        <div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6">
            <label class="col-xs-12 col-sm-7 col-md-5 col-lg-5 control-label" for="rmb_residente_email">Correo Electrónico: </label>
            <div class="col-xs-12 col-sm-5 col-md-7 col-lg-7">
                <input class="form-control" type="text" id="rmb_residente_email" name="rmb_residente_email" placeholder="Correo Electrónico" <?php echo $desabilitar;?> value="<?php echo $reside_email;?>">
            </div>
        </div><?php 
        if($tipo_res == '1'){?>
            <div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6">
                <label class="col-xs-12 col-sm-7 col-md-5 col-lg-5 control-label" for="rmb_residente_pass">Password: </label>
                <div class="col-xs-12 col-sm-5 col-md-7 col-lg-7">
                    <input class="form-control" type="text" id="rmb_residente_pass" name="rmb_residente_pass" placeholder="Clave de acceso a la aplicación" <?php echo $desabilitar;?> value="<?php echo $reside_pass;?>">
                </div>
            </div><?php 
        }?>
        <div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6">
            <label class="col-xs-12 col-sm-7 col-md-5 col-lg-5 control-label" for="rmb_residente_fnac">Fecha de Nacimiento: </label>
            <div class="col-xs-12 col-sm-5 col-md-7 col-lg-7">
                <input class="form-control" type="text" id="rmb_residente_fnac" name="rmb_residente_fnac" placeholder="YYYY-MM-DD" <?php echo $desabilitar;?> value="<?php echo $reside_fnac;?>">
            </div>
        </div><?php 
        if($tipo_res <> '7'){?>
            <div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6">
                <label class="col-xs-12 col-sm-7 col-md-5 col-lg-5 control-label" for="rmb_tdoc_id">Estado: </label>
                <div class="col-xs-12 col-sm-5 col-md-7 col-lg-7">
                    <?php echo campoSelectEst($reside_est, "rmb_est", "10");?>
                </div>
            </div><?php 
        } 
        // si el tipo de residente es propietario hace esto
        if($tipo_res == '1'){?>
            <div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6">
                <label class="col-xs-12 col-sm-7 col-md-5 col-lg-5 control-label" for="rmb_tdoc_id">Perfil: </label>
                <div class="col-xs-12 col-sm-5 col-md-7 col-lg-7"><?php 
                    echo campoSelectMaster("rmb_perf", $reside_perf, "*", "WHERE (rmb_perf_id <> '1' AND rmb_perf_id <> '7' AND rmb_perf_id <> '8')", "", "ORDER BY rmb_perf_nom ASC");?>
                </div>
            </div><?php 
        }
        else{?>
            <input type="hidden" name="rmb_perf_id" id="rmb_perf_id" class="form-control" value="4"><?php 
        }
        if(($tipo_res <> '1') && ($tipo_res <> '5') && ($tipo_res <> '3')){
            if(($tipo_res == '7') || ($tipo_res == '9')){
                $where = "WHERE rmb_vinculo_id <> '4'";
            }
            else{
                $where = "";
            }?>
            <div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6">
                <label class="col-xs-12 col-sm-7 col-md-5 col-lg-5 control-label" for="rmb_vinculo_id">Vínculo: </label>
                <div class="col-xs-12 col-sm-5 col-md-7 col-lg-7">
                    <?php echo campoSelectMaster("rmb_vinculo", $reside_vinculo, "*", "$where", "", "ORDER BY rmb_vinculo_id ASC");?>
                </div>
            </div><?php 
        }
        // si el tipo de residente es personal de servicio
        if($tipo_res == '5'){?>
            <div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6">
                <label class="col-xs-12 col-sm-7 col-md-5 col-lg-5 control-label" for="rmb_carg_id">Cargo: </label>
                <div class="col-xs-12 col-sm-5 col-md-7 col-lg-7"><?php 
                    echo campoSelectMaster("rmb_carg", $reside_carg, "*", "WHERE (rmb_carg_id > '6' OR rmb_carg_id = '4')", "", "ORDER BY rmb_carg_nom ASC");?>
                </div>
            </div>
            <div class="clearfix">&nbsp;</div><?php 
        }
        if(($tipo_res == '5') || ($tipo_res == '7')){?>
            <div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6">
                <label class="col-xs-12 col-sm-7 col-md-5 col-lg-5 control-label" for="rmb_residente_foto">Foto: </label>
                <div class="col-xs-12 col-sm-5 col-md-7 col-lg-7"><?php 
                    if($reside_foto <> ''){
                        $src_foto = $reside_foto;
                    }
                    else{
                        $src_foto = "../images/noimage.png";
                    }?>
                    <img id="vistaPrevia" src="<?php echo $src_foto;?>" alt="Image" width="150px" height="150px">
                    <input type="file" name="rmb_residente_foto" id="rmb_residente_foto" class="form-control fileimagen" placeholder="Imagen / foto" alt="Imagen y/o foto" title="Imagen y/o foto" value="">
                </div>
            </div><?php 
        }
        if($tipo_res == '5'){?>
            <div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6">
                <label class="col-xs-12 col-sm-7 col-md-5 col-lg-5 control-label" for="rmb_residente_perm">Pasado Judicial: </label>
                <div class="col-xs-12 col-sm-5 col-md-7 col-lg-7"><?php 
                    if($reside_perm){
                        $url_file = $reside_perm;
                        $url_file_array = explode(".", $reside_perm);
                        $src = "../images/TiposArchivo/".$url_file_array[3].".png";
                    }
                    else{
                       $url_file = "#";
                       $src = "../images/noimage.png";
                    }?>
                    <a href="<?php echo $url_file;?>" target="_blank">
                        <img id="vistaPrevia2" src="<?php echo $src;?>" alt="Image" width="150px" height="150px">
                    </a>
                    <input type="file" name="rmb_residente_perm" id="rmb_residente_perm" class="form-control fileimagen2" placeholder="Pasado Judicial" alt="Pasado Judicial" title="Pasado Judicial" value="">
                </div>
            </div><?php 
        }?>
        <div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6">
            <label class="col-xs-12 col-sm-7 col-md-5 col-lg-5 control-label" for="rmb_gen_id">Género: </label>
            <div class="col-xs-12 col-sm-5 col-md-7 col-lg-7">
                <div class="radio">
                    <label>
                        <input type="radio" name="rmb_gen_id" id="rmb_gen_id1" value="1" <?php if($reside_gen == '1'){echo 'checked="checked"';}?>>Masculino
                    </label>
                    <label>
                        <input type="radio" name="rmb_gen_id" id="rmb_gen_id2" value="0" <?php if($reside_gen <> '1'){echo 'checked="checked"';}?>>Femenino
                    </label>
                </div>
            </div>
        </div><?php 
        if(($tipo_res <> '7') && ($tipo_res <> '9')){?>
            <div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6">
                <label class="col-xs-12 col-sm-7 col-md-5 col-lg-5 control-label" for="rmb_residente_hijo">¿Hijos?: </label>
                <div class="col-xs-12 col-sm-5 col-md-7 col-lg-7">
                    <div class="radio">
                        <label>
                            <input type="radio" name="rmb_residente_hijo" id="rmb_residente_hijo1" value="1" <?php if($reside_hijo == '1'){echo 'checked="checked"';}?>>SI
                        </label>
                        <label>
                            <input type="radio" name="rmb_residente_hijo" id="rmb_residente_hijo2" value="0" <?php if($reside_hijo <> '1'){echo 'checked="checked"';}?>>NO
                        </label>
                    </div>
                </div>
            </div><?php 
        }
        if(($tipo_res <> '2') && ($tipo_res <> '7')){?>
            <div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6">
                <label class="col-xs-12 col-sm-7 col-md-5 col-lg-5 control-label" for="rmb_residente_vive">¿Vive Aquí?: </label>
                <div class="col-xs-12 col-sm-5 col-md-7 col-lg-7">
                    <div class="radio">
                        <label>
                            <input type="radio" name="rmb_residente_vive" id="rmb_residente_vive1" value="1" <?php if($reside_vive == '1'){echo 'checked="checked"';}?>>SI
                        </label>
                        <label>
                            <input type="radio" name="rmb_residente_vive" id="rmb_residente_vive2" value="0" <?php if($reside_vive <> '1'){echo 'checked="checked"';}?>>NO
                        </label>
                    </div>
                </div>
            </div><?php 
        }?>
        <div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6">
            <label class="col-xs-12 col-sm-7 col-md-5 col-lg-5 control-label" for="rmb_residente_obs">Observación: </label>
            <div class="col-xs-12 col-sm-5 col-md-7 col-lg-7">
                <textarea name="rmb_residente_obs" id="rmb_residente_obs" rows="3" placeholder="Ingrese una observación del propietario, algo que le ayude a recordar de quien se trata, o tambien puede colocar el horario en que el contacto esta disponible, si cree que NO es necesario deje el campo en blanco." class="form-control" ><?php echo $reside_obs;?></textarea>
            </div>
        </div>
        <div class="clearfix">&nbsp;</div>
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center"><?php 
            if($reside_id){?>
                <input type="hidden" name="id_upd" id="id_upd" class="form-control" value="<?php echo $reside_id;?>">
            <?php }
            if($tipo_res == '5'){?>
                <input type="hidden" name="rmb_perf_id" id="rmb_perf_id" class="form-control" value="4"><?php 
            if($tipo_res <> '2'){?>
                <input type="hidden" name="rmb_residente_vive" id="rmb_residente_vive" class="form-control" value="1"><?php }
            }?>
            <input type="hidden" name="id_apto" id="id_apto" class="form-control" value="<?php echo $id_apto;?>">
            <input type="hidden" name="tipo_res" id="tipo_res" class="form-control" value="<?php echo $tipo_res;?>">
            <button type="submit" class="btn btn-default" style="border: none;background-color: transparent;"><img src="../css/plantilla1/img/actualizar.png" alt=""></button>
        </div>
        <div class="clearfix">&nbsp;</div>
    </form>
</div>
<div class="clearfix">&nbsp;</div>

<!-- jQuery -->
<script src="../js/jquery.min.js"></script>
<script src="../js/sweet-alert.js"></script><!-- Personalizar alertas -->
<!-- Libreria java script que realiza la validacion de los formulariosP -->
<script src="../js/bootstrap-datepicker.js"></script> <!-- Datetimepicker -->
<script src="../js/bootstrapValidator.js"></script>
<script>
    setTimeout(esperehide, 1000);
    $(document).ready(function() {
        var id_apto = '<?php echo $id_apto;?>';
        var tipo_res = '<?php echo $tipo_res;?>';
        var pestaña = "propietario";
        if(tipo_res === '1'){}
        else if(tipo_res === '1'){pestaña = "propietario";}
        else if(tipo_res === '2'){pestaña = "residente";}
        else if(tipo_res === '3'){pestaña = "arrendatario";}
        else if(tipo_res === '4'){pestaña = "visitante";}
        else if(tipo_res === '5'){pestaña = "empleado";}
        else if(tipo_res === '6'){pestaña = "banco";}
        else if(tipo_res === '7'){pestaña = "autorizada";}
        else if(tipo_res === '8'){pestaña = "inmobiliaria";}
        else if(tipo_res === '9'){pestaña = "emergencia";}
        else{pestaña = "propietario";}
        // Validación formulario de datos del propietario
        $('#form_reside').bootstrapValidator({
            message: 'Este valor no es valido',
            feedbackIcons: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                rmb_residente_nom: {
                    message: 'El nombre no es valido',
                    validators: {
                        notEmpty: {
                            message: 'El nombre es requerido'
                        },
                        stringLength: {
                            min: 1,
                            max: 50,
                            message: 'El nombre debe contener de 3 a 50 characteres'
                        },
                        regexp: {
                            regexp: /^[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ\_\s\.\-]+$/,
                            message: 'El nombre debe ser alfanumérico.'
                        }
                    }
                },
                rmb_residente_ape: {
                    message: 'El apellido no es valido',
                    validators: {
                        notEmpty: {
                            message: 'El apellido es requerido'
                        },
                        stringLength: {
                            min: 1,
                            max: 50,
                            message: 'El apellido debe contener de 3 a 50 characteres'
                        },
                        regexp: {
                            regexp: /^[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ\_\s\.\-]+$/,
                            message: 'El apellido debe ser alfanumérico.'
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
                    message: 'El número de documento de identificación no es valido',
                    validators: {
                        notEmpty: {
                            message: 'El número de documento de identificación es requerido'
                        },
                        stringLength: {
                            min: 1,
                            max: 50,
                            message: 'El número de documento de identificación debe contener de 3 a 50 characteres'
                        },
                        regexp: {
                            regexp: /^[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ\_\s\.\-]+$/,
                            message: 'El número de documento de identificación debe ser alfanumérico.'
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
            var datos_form = new FormData($("#form_reside")[0]);
            $.ajax({
                url:"../php/ins_upd_prop.php",
                cache:false,
                type:"POST",
                contentType:false,
                data:datos_form,
                processData:false,
                success: function(datos){
                    if(datos !== ''){
                        // alert(datos);
                        setTimeout(esperehide, 500);
                        $("#col-md-12").load('detalle-del-apartamento.php?id_apto='+id_apto);
                        swal({
                            title: "Felicidades!",
                            text: "El registro se ha guardado correctamente!",
                            type: "success",
                            confirmButtonText: "Continuar",
                            confirmButtonColor: "#94B86E"
                        },
                        function(){
                            $("#"+pestaña).addClass('activo');
                            pag = "lista_residentes.php?id_apto="+id_apto+"&tipo_res="+tipo_res+"&tipo_nom="+pestaña+"s";
                            $("#"+pestaña).parent().next().load(pag);
                            $("#"+pestaña).parent().next().show();
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
    });
    $(function () {
        //Cuando se selecciona una imagen en usuario
        $('.fileimagen').on('change', function(e) {
            PreImagen(this, e);
        });
        //Cuando se selecciona un archivo en pasado judicial
        $('.fileimagen2').on('change', function(e) {
            PreImagen2($(this).val(), e);
        });
        $('#rmb_residente_fnac').datepicker({format: "yyyy-mm-dd", autoclose: true});
    });
</script>