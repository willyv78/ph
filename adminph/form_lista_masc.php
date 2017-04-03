<?php
session_start();
require_once ("../conexion/conexion.php");
require_once ("../php/funciones.php");
//////////////////////////////////////////////////////////////////////////////////////
// Aplicación PHP usando Bootstrap, jquery, HTML5 y CSS - PH                        //
// Copyright 2014 Wilson Giovanny Velandia Barreto 3204274564 - willyv78@gmail.com  //
//////////////////////////////////////////////////////////////////////////////////////

$id_apto = "";$id_masc = "";$masc_id = "";$masc_nom = "";$masc_raza = "";$masc_vac = "";$masc_tipo = "";$masc_aplica = "";$class_arch_vac = "";
if(isset($_GET['id_apto'])){
    $id_apto = $_GET['id_apto'];
}
if(isset($_GET['id_masc'])){
    $id_masc = $_GET['id_masc'];
    $res_veh = registroCampo("rmb_mascotas m", "*", "WHERE m.rmb_mascotas_id = '$id_masc'", "", "");
    if($res_veh){
        if(mysql_num_rows($res_veh) > 0){
            $row_veh = mysql_fetch_array($res_veh);
            $masc_id = $row_veh[0];
            $masc_nom = $row_veh[1];
            $masc_raza = $row_veh[2];
            $masc_tipo = $row_veh[4];
            $masc_aplica = $row_veh[6];
            if($masc_aplica <> 0){$masc_vac = $row_veh[3];}
            else{$masc_vac = 1;}
        }
    }
}
?>
<div class="text-left">
    <form id="form_masc" name="form_masc" action="" method="POST" class="form-horizontal" role="form" enctype="multipart/form-data">
        <!-- Nombre -->
        <?php if($masc_nom <> ''){$class_nom = "";}else{$class_nom = "has-error";}?>
        <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12 <?php echo $class_nom;?>">
            <label class="col-xs-12 col-sm-5 col-md-5 col-lg-5 control-label" for="rmb_mascotas_nom">Nombre: </label>
            <div class="col-xs-10 col-sm-5 col-md-5 col-lg-5">
                <input type="text" name="rmb_mascotas_nom" id="rmb_mascotas_nom" class="form-control" value="<?php echo $masc_nom;?>" placeholder="Nombre de la mascota">
            </div>
        </div>
        <!-- Raza -->
        <?php if($masc_raza <> ''){$class_raza = "";}else{$class_raza = "has-error";}?>
        <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12 <?php echo $class_raza;?>">
            <label class="col-xs-12 col-sm-5 col-md-5 col-lg-5 control-label" for="rmb_mascotas_raza">Raza: </label>
            <div class="col-xs-10 col-sm-5 col-md-5 col-lg-5">
                <input type="text" name="rmb_mascotas_raza" id="rmb_mascotas_raza" class="form-control" value="<?php echo $masc_raza;?>" placeholder="Raza de la mascota">
            </div>
        </div>
        <!-- Tipo de mascota -->
        <?php if($masc_tipo <> ''){$class_tipo = "";}else{$class_tipo = "has-error";}?>
        <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12 <?php echo $class_tipo;?>">
            <label class="col-xs-12 col-sm-5 col-md-5 col-lg-5 control-label" for="rmb_tmascotas_id">Tipo: </label>
            <div class="col-xs-10 col-sm-5 col-md-5 col-lg-5"><?php 
                echo campoSelectMaster("rmb_tmascotas", $masc_tipo, "*", "", "", "ORDER BY rmb_tmascotas_id ASC");?>
            </div>
        </div>
        <!-- Aplica vacunas -->
        <?php if($masc_aplica <> ''){$class_aplica = "";}else{$class_aplica = "has-error";}?>
        <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12 <?php echo $class_aplica;?>">
            <label class="col-xs-12 col-sm-5 col-md-5 col-lg-5 control-label" for="rmb_mascotas_aplica">¿Tiene vacunas?: </label>
            <div class="col-xs-10 col-sm-5 col-md-5 col-lg-5">
                <div class="radio">
                    <label>
                        <input type="radio" name="rmb_mascotas_aplica" id="rmb_mascotas_aplica1" value="1" alt="Si a su mascota le aplican vacunas marque esta opción" title="Si a su mascota le aplican vacunas marque esta opción" <?php if($masc_aplica == 1){echo 'checked="checked"';}?>>Aplica
                    </label>
                    <label>
                        <input type="radio" name="rmb_mascotas_aplica" id="rmb_mascotas_aplica2" value="0" alt="Si a su mascota NO le aplican vacunas marque esta opción" title="Si a su mascota NO le aplican vacunas marque esta opción" <?php if($masc_aplica == 0){echo 'checked="checked"';}?>>NO Aplica
                    </label>
                </div>
            </div>
        </div>
        <!-- Vacunas -->
        <?php if($masc_vac <> ''){$class_vac = "";}else{$class_vac = "has-error";}if($masc_aplica == 0){$class_arch_vac = "hidden";}?>
        <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12 <?php echo $class_vac." ".$class_arch_vac;?>" id="arch-vac">
            <label class="col-xs-12 col-sm-5 col-md-5 col-lg-5 control-label" for="rmb_mascotas_vac">Vacunas: </label>
            <div class="col-xs-10 col-sm-5 col-md-5 col-lg-5"><?php 
                if($masc_vac){
                    $url_file = $masc_vac;
                    $url_file_array = explode(".", $masc_vac);
                    $src = "../images/TiposArchivo/".$url_file_array[3].".png";
                }
                else{
                   $url_file = "#";
                   $src = "../images/noimage.png";
                }?>
                <a href="<?php echo $url_file;?>" target="_blank">
                    <img id="vistaPrevia2" src="<?php echo $src;?>" alt="Image" width="150px" height="150px">
                </a>
                <input type="file" name="rmb_mascotas_vac" id="rmb_mascotas_vac" class="form-control fileimagen2" value="" placeholder="Vacunas de la mascota">
            </div>
        </div>
        <div class="clearfix">&nbsp;</div>
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center"><?php 
            if($id_masc){?>
                <input type="hidden" name="id_upd" id="id_upd" class="form-control" value="<?php echo $id_masc;?>">
            <?php }?>
            <input type="hidden" name="id_apto" id="id_apto" class="form-control" value="<?php echo $id_apto;?>">
            <button type="submit" class="btn btn-default" alt="Ingresar / Actualizar datos" title="Ingresar / Actualizar datos">Actualizar</button>
            <button type="button" class="btn btn-default regresar">Regresar</button>
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
    $(document).ready(function() {
        setTimeout(esperehide, 500);
        var id_apto = '<?php echo $id_apto;?>';
        // Validación formulario de datos del propietario
        $('#form_masc').bootstrapValidator({
            message: 'Este valor no es valido',
            feedbackIcons: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                rmb_mascotas_nom: {
                    message: 'El nombre no es valido',
                    validators: {
                        notEmpty: {
                            message: 'El nombre es requerido'
                        }
                    }
                },
                rmb_tmascotas_id: {
                    message: 'El tipo de mascota no es valido',
                    validators: {
                        notEmpty: {
                            message: 'El tipo de mascota es requerido'
                        }
                    }
                }
            }
        })
        .on('success.form.bv', function(e) {
            // Prevent form submission
            e.preventDefault();
            espereshow();
            var datos_form = new FormData($("#form_masc")[0]);
            $.ajax({
                url:"../php/ins_upd_masc.php",
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
                            $("#mascota").addClass('activo');
                            pag = "lista_mascotas.php?id_apto="+id_apto+"&tipo_nom=mascotas";
                            $("#mascota").parent().next().load(pag);
                            $("#mascota").parent().next().show();
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
            pag = "lista_mascotas.php?id_apto="+id_apto+"&tipo_nom=mascotas";
            $("#mascota").parent().next().load(pag);
        }
        $(".regresar").on("click", volverAtras);
        function verArchivo(){
            if(this.value == 0){
                $("#arch-vac").addClass('hidden');
            }
            else{
                $("#arch-vac").removeClass('hidden');
            }
        }
        $("input[name=rmb_mascotas_aplica]").on("click", verArchivo);
    });
    $(function () {
        //Cuando se selecciona un archivo en vacunas
        $('.fileimagen2').on('change', function(e) {
            PreImagen2($(this).val(), e);
        });
    });
</script>