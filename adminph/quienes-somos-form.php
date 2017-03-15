<?php session_start();
require_once ("../conexion/conexion.php");
require_once ("../php/funciones.php");
//////////////////////////////////////////////////////////////////////////////////////
// Aplicación PHP usando Bootstrap, jquery, HTML5 y CSS - PH                        //
// Copyright 2014 Wilson Giovanny Velandia Barreto 3204274564 - willyv78@gmail.com  //
//////////////////////////////////////////////////////////////////////////////////////
$id = "";$data_quien = 1;$id = "";$nom = "";$ape = "";$carg = "";$foto = "";$nom2 = "";$tel = "";$cel = "";$dir = "";$mail = "";$obs = "";$web = "";$res_quien = false;$where_carg = "";$id_apto = "";

if(isset($_GET['id_res'])){
    $id = $_GET['id_res'];
    $res_quien = registroCampo("rmb_residente r", "r.rmb_residente_id, r.rmb_residente_nom, r.rmb_residente_ape, r.rmb_carg_id, r.rmb_residente_foto, r.rmb_residente_nom2, r.rmb_residente_tel, r.rmb_residente_cel, r.rmb_residente_dir, r.rmb_residente_email, r.rmb_residente_obs, rmb_residente_perm, ra.rmb_aptos_id", "LEFT JOIN rmb_residente_x_aptos ra USING(rmb_residente_id) WHERE rmb_residente_id = $id", "", "ORDER BY r.rmb_carg_id ASC");
}
if(isset($_GET['data_quien'])){$data_quien = $_GET['data_quien'];}
if($data_quien){
    if($data_quien == '1'){
        $where_carg = "WHERE (rmb_carg_id = '3' OR rmb_carg_id = '4' OR rmb_carg_id = '5')";
    }
    elseif($data_quien == '2'){
        $where_carg = "WHERE (rmb_carg_id = '8' OR rmb_carg_id = '9' OR rmb_carg_id = '20' OR rmb_carg_id = '21')";
    }
    elseif($data_quien == '3'){
        $where_carg = "WHERE (rmb_carg_id = '6' OR rmb_carg_id = '7' OR rmb_carg_id = '22' OR rmb_carg_id = '23')";
    }
    elseif($data_quien == '5'){
        $where_carg = "WHERE (rmb_carg_id = '10' OR rmb_carg_id = '11' OR rmb_carg_id = '12')";
    }
    elseif($data_quien == '6'){
        $where_carg = "WHERE (rmb_carg_id = '13' OR rmb_carg_id = '14' OR rmb_carg_id = '15')";
    }
    elseif($data_quien == '7'){
        $where_carg = "WHERE (rmb_carg_id = '16' OR rmb_carg_id = '17')";
    }
    elseif($data_quien == '8'){
        $where_carg = "WHERE (rmb_carg_id = '18' OR rmb_carg_id = '19')";
    }
}
if($res_quien){
    if(mysql_num_rows($res_quien) > 0){
        $row_quien = mysql_fetch_array($res_quien);
        $id = $row_quien[0];$nom = $row_quien[1];$ape = $row_quien[2];$carg = $row_quien[3];$foto = $row_quien[4];$nom2 = $row_quien[5];$tel = $row_quien[6];$cel = $row_quien[7];$dir = $row_quien[8];$mail = $row_quien[9];$obs = $row_quien[10];$web = $row_quien[11];
    }
}
?>
<form class="col-xs-12 col-sm-10 col-md-8 col-lg-6 form-quienes form-horizontal" id="form-quienes" name="form-quienes" method="POST" role="form" enctype="multipart/form-data">
    <div class="form-group">
        <label class="col-xs-12 col-sm-4 col-md-5 col-lg-6 text-right" for="rmb_carg_id">Cargo:</label>
        <div class="col-xs-12 col-sm-8 col-md-7 col-lg-6"><?php 
            echo campoSelectMaster("rmb_carg", "$carg", "*", $where_carg, "", "ORDER BY rmb_carg_id ASC");?></div>
    </div>
    <!-- Este bloque solo se vera si el cargo esta relacionado con empresa -->
    <div class="form-group hidden">
        <label class="col-xs-12 col-sm-4 col-md-5 col-lg-6 text-right" for="rmb_residente_nom2">Razón Social:</label>
        <div class="col-xs-12 col-sm-8 col-md-7 col-lg-6">
            <input type="text" class="form-control" id="rmb_residente_nom2" name="rmb_residente_nom2" placeholder="Nombre o Razón Social de la empresa" alt="Nombre o Razón Social de la empresa" title="Nombre o Razón Social de la empresa" value="<?php echo $nom2;?>">
        </div>
    </div>

    <div class="form-group">
        <label class="col-xs-12 col-sm-4 col-md-5 col-lg-6 text-right" for="rmb_residente_nom">Nombres:</label>
        <div class="col-xs-12 col-sm-8 col-md-7 col-lg-6">
            <input type="text" class="form-control" id="rmb_residente_nom" name="rmb_residente_nom" placeholder="Nombres de contacto" alt="Nombres de contacto" title="Nombres de contacto" value="<?php echo $nom;?>">
        </div>
    </div>
    <div class="form-group">
        <label class="col-xs-12 col-sm-4 col-md-5 col-lg-6 text-right" for="rmb_residente_ape">Apellidos:</label>
        <div class="col-xs-12 col-sm-8 col-md-7 col-lg-6">
            <input type="text" class="form-control" id="rmb_residente_ape" name="rmb_residente_ape" placeholder="Apellidos de contacto" alt="Apellidos de contacto" title="Apellidos de contacto" value="<?php echo $ape;?>">
        </div>
    </div>
    <div class="form-group">
        <label class="col-xs-12 col-sm-4 col-md-5 col-lg-6 text-right" for="rmb_residente_tel">Teléfono:</label>
        <div class="col-xs-12 col-sm-8 col-md-7 col-lg-6">
            <input type="text" class="form-control" id="rmb_residente_tel" name="rmb_residente_tel" placeholder="Teléfono de contacto" alt="Teléfono de contacto" title="Teléfono de contacto" value="<?php echo $tel;?>">
        </div>
    </div>
    <div class="form-group">
        <label class="col-xs-12 col-sm-4 col-md-5 col-lg-6 text-right" for="rmb_residente_cel">Celular:</label>
        <div class="col-xs-12 col-sm-8 col-md-7 col-lg-6">
            <input type="text" class="form-control" id="rmb_residente_cel" name="rmb_residente_cel" placeholder="Número celular de contacto" alt="Número celular de contacto" title="Número celular de contacto" value="<?php echo $cel;?>">
        </div>
    </div>
    <div class="form-group">
        <label class="col-xs-12 col-sm-4 col-md-5 col-lg-6 text-right" for="rmb_residente_email">Email:</label>
        <div class="col-xs-12 col-sm-8 col-md-7 col-lg-6">
            <input type="text" class="form-control" id="rmb_residente_email" name="rmb_residente_email" placeholder="Email de contacto" alt="Email de contacto" title="Email de contacto" value="<?php echo $mail;?>">
        </div>
    </div>
    <div class="form-group hidden">
        <label class="col-xs-12 col-sm-4 col-md-5 col-lg-6 text-right" for="rmb_residente_perm">Página WEB:</label>
        <div class="col-xs-12 col-sm-8 col-md-7 col-lg-6">
            <input type="text" class="form-control" id="rmb_residente_perm" name="rmb_residente_perm" placeholder="Página WEB" alt="Página WEB" title="Página WEB" value="<?php echo $web;?>">
        </div>
    </div><?php 
    if(($carg <> '3') && ($carg <> '10') && ($carg <> '13') && ($carg <> '16') && ($carg <> '18') && ($data_quien <> '2') && ($data_quien <> '3') && ($data_quien <> '5') && ($data_quien <> '6')){?>
        <div class="form-group">
            <label class="col-xs-12 col-sm-4 col-md-5 col-lg-6 text-right" for="rmb_residente_foto">Foto:</label><?php 
            if($foto){$src = $foto;}
            else{$src = "../images/noimage.png";}?>
            <div class="col-xs-12 col-sm-8 col-md-7 col-lg-6">
                <img id="vistaPrevia" src="<?php echo $src;?>" width="120px" height="120px"/>
                <input type="file" class="form-control fileimagen" id="rmb_residente_foto" name="rmb_residente_foto" placeholder="Foto de contacto" alt="Foto de contacto" title="Foto de contacto">
            </div>
        </div><?php 
    }
    if(($data_quien <> '2') && ($data_quien <> '3') && ($data_quien <> '5') && ($data_quien <> '6') && ($data_quien <> '7') && ($data_quien <> '8')){?>
        <div class="form-group">
            <label class="col-xs-12 col-sm-4 col-md-5 col-lg-6 text-right" for="rmb_residente_obs">Horario de atención:</label>
            <div class="col-xs-12 col-sm-8 col-md-7 col-lg-6">
                <textarea name="rmb_residente_obs" id="rmb_residente_obs" class="form-control" rows="3" placeholder="Lun - Vie 8:00 am a 5:00 pm - Sab 9:00am a 12m" alt="Horario de atención" title="Horario de atención"><?php echo $obs;?></textarea>
            </div>
        </div><?php 
    }
    elseif(($data_quien == '2') || ($data_quien == '3')){?>
        <div class="form-group">
            <label class="col-xs-12 col-sm-4 col-md-5 col-lg-6 text-right" for="rmb_carg_id">Apartamento:</label>
            <div class="col-xs-12 col-sm-8 col-md-7 col-lg-6"><?php 
                echo campoSelectMaster("rmb_aptos", "$id_apto", "*", "", "", "ORDER BY cast(rmb_aptos_nom as unsigned) ASC");?></div>
        </div>
    <?php }?>
    <div class="clearfix">&nbsp;</div><?php 
    if($id){?>
        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 text-right">
            <input type="hidden" name="id_upd" id="id_upd" class="form-control" value="<?php echo $id;?>">
            <button type="submit" class="btn btn-default">Actualizar</button>
        </div><?php 
    }
    else{?>
        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 text-right">
            <button type="submit" class="btn btn-default">Agregar</button>
        </div><?php 
    }?>
    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 text-left">
        <button type="button" class="btn btn-default regresar" data-quien="<?php echo $data_quien;?>">Regresar</button>
    </div>
</form>
<!-- jQuery -->
<script src="../js/jquery.min.js"></script>
<script src="../js/sweet-alert.js"></script><!-- Personalizar alertas -->
<script src="../js/bootstrapValidator.js"></script>
<script>
    $(document).ready(function() {
        $('#form-quienes').bootstrapValidator({
            message: 'Este valor no es valido',
            feedbackIcons: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                rmb_carg_id: {
                    message: 'El cargo no es valido',
                    validators: {
                        notEmpty: {
                            message: 'El cargo es requerido'
                        }
                    }
                },
                rmb_residente_nom: {
                    message: 'El nombre del contacto no es valido',
                    validators: {
                        notEmpty: {
                            message: 'El nombre del contacto es requerido'
                        },
                        stringLength: {
                            min: 3,
                            max: 50,
                            message: 'El nombre del contacto debe contener de 3 a 40 caracteres'
                        },
                        regexp: {
                            regexp: /^[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ_ .:,#@%]+$/,
                            message: 'El nombre del documento debe contener letras, numeros, acentos espacios y algunos caracteres especiales.'
                        }
                    }
                },
                rmb_residente_ape: {
                    message: 'El apellido del contacto no es valido',
                    validators: {
                        notEmpty: {
                            message: 'El apellido del contacto es requerido'
                        },
                        stringLength: {
                            min: 3,
                            max: 50,
                            message: 'El apellido del contacto debe contener de 3 a 40 caracteres'
                        },
                        regexp: {
                            regexp: /^[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ_ .:,#@%]+$/,
                            message: 'El nombre del documento debe contener letras, numeros, acentos espacios y algunos caracteres especiales.'
                        }
                    }
                },
                rmb_residente_tel: {
                    message: 'El teléfono del contacto no es valido',
                    validators: {
                        notEmpty: {
                            message: 'El teléfono del contacto es requerido'
                        },
                        stringLength: {
                            min: 3,
                            max: 50,
                            message: 'El teléfono del contacto debe contener de 3 a 40 caracteres'
                        },
                        regexp: {
                            regexp: /^[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ_ .:,#@%]+$/,
                            message: 'El nombre del documento debe contener letras, numeros, acentos espacios y algunos caracteres especiales.'
                        }
                    }
                }
            }
        })
        .on('success.form.bv', function(e) {
            // Prevent form submission
            e.preventDefault();
            var id_div = '<?php echo $data_quien;?>';
            var pag = "";
            if(id_div === '1'){pag = "administracion";}
            else if(id_div === '2'){pag = "consejo";}
            else if(id_div === '3'){pag = "comite";}
            else if(id_div === '4'){pag = "edificio";}
            else if(id_div === '5'){pag = "contador";}
            else if(id_div === '6'){pag = "revisor";}
            else if(id_div === '7'){pag = "seguridad";}
            else if(id_div === '8'){pag = "servicios";}
            var datos_form = new FormData($("#form-quienes")[0]);
            $.ajax({
                url:"../php/ins_upd_quienes.php",
                cache:false,
                type:"POST",
                contentType:false,
                data:datos_form,
                processData:false,
                success: function(datos){
                    setTimeout(esperehide, 500);
                    if(datos !== ''){
                        swal({
                            title: "Felicidades!",
                            text: "El registro se ha guardado correctamente!",
                            type: "success",
                            confirmButtonText: "Continuar",
                            confirmButtonColor: "#94B86E"
                        },
                        function(){
                            $("#collapseExample" + id_div).load(pag + ".php");
                        });
                    }
                    else{
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


        var data_quien = '<?php echo $data_quien;?>';
        // Funcion que agrega la validacion de los campos hora de ingreso y hora de salida para el dia marcado
        if((data_quien === '2') || (data_quien === '3')) {
            // agregamos las validaciones
            $('#form-quienes').bootstrapValidator('addField', 'rmb_aptos_id', {
                validators: {
                    notEmpty: {
                        message: 'Seleccione un apartamento'
                    }
                }
            });
        }
        else{
            $('#form-quienes').bootstrapValidator('removeField', 'rmb_aptos_id');
        }

        cargaFormQuienes();
    });
</script>













