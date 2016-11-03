<?php session_start();
require_once ("../conexion/conexion.php");
require_once ("../php/funciones.php");
//////////////////////////////////////////////////////////////////////////////////////
// Aplicación PHP usando Bootstrap, jquery, HTML5 y CSS - PH                        //
// Copyright 2014 Wilson Giovanny Velandia Barreto 3204274564 - willyv78@gmail.com  //
//////////////////////////////////////////////////////////////////////////////////////
$id = "";$data_quien = 1;$id = "";$tcont = "";$context = "";$carg = "";$foto = "";$nom = "";$tel = "";$titulo = "";$dir = "";$mail = "";$obs = "";$icono = "";$res_contac = false;$where_carg = "";

if(isset($_GET['id_upd'])){
    $id = $_GET['id_upd'];
    $res_contac = registroCampo("rmb_contac c", "c.rmb_contac_id, c.rmb_tcont_id, c.rmb_context_id, c.rmb_contac_nom, c.rmb_contac_titulo, c.rmb_contac_tel, tc.rmb_tcont_icono", "LEFT JOIN rmb_tcont tc USING(rmb_tcont_id) WHERE rmb_contac_id = $id", "", "ORDER BY c.rmb_contac_nom ASC");
}
if($res_contac){
    if(mysql_num_rows($res_contac) > 0){
        $row_contac = mysql_fetch_array($res_contac);
        $id = $row_contac[0];$tcont = $row_contac[1];$context = $row_contac[2];$nom = $row_contac[3];$titulo = $row_contac[4];$tel = $row_contac[5];$icono = $row_contac[6];
    }
}
?>
<!-- Titulo de la pagina -->
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 titulo-pagina">
   <h3 class="pull-left">Formulario de Contacto</h3>
</div>
<div class="clearfix"></div>
<form class="col-xs-12 col-sm-10 col-md-8 col-lg-6 form-quienes form-horizontal" id="form-contacto" name="form-contacto" method="POST" role="form" enctype="multipart/form-data"><?php 
    $res_tcont = registroCampo("rmb_tcont tc", "tc.rmb_tcont_id, tc.rmb_tcont_nom, tc.rmb_tcont_icono", "", "", "ORDER BY tc.rmb_tcont_nom ASC");
    if($res_tcont){?>
        <div class="form-group">
            <label class="col-xs-12 col-sm-4 col-md-5 col-lg-6 text-right" for="rmb_tcont_id">Tipo Contacto:</label>
            <div class="col-xs-12 col-sm-8 col-md-7 col-lg-6">
                <select name="rmb_tcont_id" id="rmb_tcont_id" class="form-control" alt="Seleccione una opción" title="Seleccione una opción" style="margin: 0;">
                    <option value="" <?php if($tcont == ''){echo 'selected="selected"';} ?>>Seleccione...</option><?php 
                    if(mysql_num_rows($res_tcont) > 0){
                        while ($row_tcont = mysql_fetch_array($res_tcont)) {?>
                            <option value="<?php echo $row_tcont[0];?>" data-url="<?php echo $row_tcont[2];?>" <?php if($tcont == $row_tcont[0]){echo 'selected="selected"';} ?>><?php echo $row_tcont[1];?></option><?php 
                        }
                    }?>
                </select>
            </div>
        </div><?php 
    }?>
    <div class="form-group">
        <label class="col-xs-12 col-sm-4 col-md-5 col-lg-6 text-right" for="rmb_contac_titulo">Tiítulo Contacto:</label>
        <div class="col-xs-12 col-sm-8 col-md-7 col-lg-6">
            <input type="text" class="form-control" id="rmb_contac_titulo" name="rmb_contac_titulo" placeholder="Título del contacto" alt="Título del contacto" title="Título del contacto" value="<?php echo $titulo;?>">
        </div>
    </div>
    <div class="form-group">
        <label class="col-xs-12 col-sm-4 col-md-5 col-lg-6 text-right" for="rmb_contac_nom">Nombre Contacto:</label>
        <div class="col-xs-12 col-sm-8 col-md-7 col-lg-6">
            <input type="text" class="form-control" id="rmb_contac_nom" name="rmb_contac_nom" placeholder="Nombre del contacto" alt="Nombre del contacto" title="Nombre del contacto" value="<?php echo $nom;?>">
        </div>
    </div>
    <div class="form-group">
        <label class="col-xs-12 col-sm-4 col-md-5 col-lg-6 text-right" for="rmb_contac_tel">Teléfono:</label>
        <div class="col-xs-12 col-sm-8 col-md-7 col-lg-6">
            <input type="text" class="form-control" id="rmb_contac_tel" name="rmb_contac_tel" placeholder="Teléfono de contacto" alt="Teléfono de contacto" title="Teléfono de contacto" value="<?php echo $tel;?>">
        </div>
    </div><?php 
    if($icono){?>
        <div class="form-group">
            <label class="col-xs-12 col-sm-4 col-md-5 col-lg-6 text-right" for="rmb_contac_foto">Icono:</label><?php 
            if($icono){$src = $icono;}
            else{$src = imagenDefault();}?>
            <div class="col-xs-12 col-sm-8 col-md-7 col-lg-6">
                <img id="vistaPrevia" src="<?php echo $src;?>" width="120px" height="120px"/>
            </div>
        </div><?php 
    }?>
    <div class="form-group">
        <label class="col-xs-12 col-sm-4 col-md-5 col-lg-6 text-right" for="rmb_context_id">Contexto:</label>
        <div class="col-xs-12 col-sm-8 col-md-7 col-lg-6">
            <div class="radio text-left" style="padding-top: 0;">
                <label>
                    <input type="radio" name="rmb_context_id" id="rmb_context_id_1" value="1" <?php if(($context == "1") || ($context <> "2")){echo 'checked="checked"';}?> alt="Contexto (público)" title="Contexto (público)">Público
                </label>
                &nbsp;&nbsp;
                <label>
                    <input type="radio" name="rmb_context_id" id="rmb_context_id_2" value="2" <?php if($context == "2"){echo 'checked="checked"';}?> alt="Contexto (privado)" title="Contexto (privado)">Privado
                </label>
            </div>
        </div>
    </div>
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
        <button type="button" class="btn btn-default regresar">Regresar</button>
    </div>
</form>
<script>
    $(document).ready(function() {
        $('#form-contacto').bootstrapValidator({
            message: 'Este valor no es valido',
            feedbackIcons: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                rmb_tcont_id: {
                    message: 'El cargo no es valido',
                    validators: {
                        notEmpty: {
                            message: 'El cargo es requerido'
                        }
                    }
                },
                rmb_contac_titulo: {
                    message: 'El titulo del contacto no es valido',
                    validators: {
                        notEmpty: {
                            message: 'El titulo del contacto es requerido'
                        },
                        stringLength: {
                            min: 3,
                            max: 50,
                            message: 'El titulo del contacto debe contener de 3 a 40 caracteres'
                        },
                        regexp: {
                            regexp: /^[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ_ .:,#@%]+$/,
                            message: 'El titulo del contacto debe contener letras, numeros, acentos espacios y algunos caracteres especiales.'
                        }
                    }
                },
                rmb_contac_nom: {
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
                            message: 'El nombre del contacto debe contener letras, numeros, acentos espacios y algunos caracteres especiales.'
                        }
                    }
                },
                rmb_contac_tel: {
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
                            regexp: /^[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ_ \-\.:,#@%]+$/,
                            message: 'El teléfono del contacto debe contener letras, numeros, acentos espacios y algunos caracteres especiales.'
                        }
                    }
                }
            }
        })
        .on('success.form.bv', function(e) {
            // Prevent form submission
            e.preventDefault();
            var datos_form = new FormData($("#form-contacto")[0]);
            $.ajax({
                url:"../php/ins_upd_contacto.php",
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
                            $("#col-md-12").load("contactos.php");
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
        cargaFormContacto();
    });
</script>













