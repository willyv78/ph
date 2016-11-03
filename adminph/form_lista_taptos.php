<?php
session_start();
require_once ("../conexion/conexion.php");
require_once ("../php/funciones.php");
//////////////////////////////////////////////////////////////////////////////////////
// Aplicación PHP usando Bootstrap, jquery, HTML5 y CSS - PH                        //
// Copyright 2014 Wilson Giovanny Velandia Barreto 3204274564 - willyv78@gmail.com  //
//////////////////////////////////////////////////////////////////////////////////////

$id_taptos = "";$taptos_id = "";$taptos_nom = "";$taptos_area = "";$taptos_priv = "";$taptos_banos = "";$taptos_coc = "";$taptos_hab = "";$taptos_balc = "";$taptos_coef = "";$disabled = "";
if(isset($_GET['id_taptos'])){
    $id_taptos = $_GET['id_taptos'];
    $res_taptos = registroCampo("rmb_taptos t", "*", "WHERE t.rmb_taptos_id = '$id_taptos'", "", "");
    if($res_taptos){
        if(mysql_num_rows($res_taptos) > 0){
            $row_taptos = mysql_fetch_array($res_taptos);
            $taptos_id = $row_taptos[0];
            $taptos_nom = $row_taptos[1];
            $taptos_area = $row_taptos[2];
            $taptos_priv = $row_taptos[3];
            $taptos_banos = $row_taptos[4];
            $taptos_coc = $row_taptos[5];
            $taptos_hab = $row_taptos[6];
            $taptos_balc = $row_taptos[7];
            $taptos_coef = $row_taptos[8];
            $taptos_est = $row_taptos[9];
            $taptos_serv = $row_taptos[10];
            $taptos_terr = $row_taptos[11];
            $taptos_admin = $row_taptos[12];
        }
    }
    $res_aptos_x_taptos = registroCampo("rmb_aptos_x_taptos t", "t.rmb_aptos_nom", "WHERE t.rmb_taptos_id = '$id_taptos'", "", "ORDER BY LENGTH(t.rmb_aptos_nom), t.rmb_aptos_nom ASC");
}
if(isset($_GET['ver'])){
    $disabled = "disabled";
}
?>
<!-- Titulo de la pagina -->
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="z-index: 2;">
   <h3 class="text-left">Tipos de Apartamento</h3>
</div>
<div class="text-left">
    <form id="form_masc" name="form_masc" action="" method="POST" class="form-horizontal" role="form" enctype="multipart/form-data">
        <div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6">
            <label class="col-xs-12 col-sm-5 col-md-5 col-lg-5 control-label" for="rmb_taptos_nom">Nombre: </label>
            <div class="col-xs-12 col-sm-7 col-md-7 col-lg-7">
                <input type="text" name="rmb_taptos_nom" id="rmb_taptos_nom" class="form-control" value="<?php echo $taptos_nom;?>" placeholder="Nombre del tipo de apartamento" <?php echo $disabled;?>>
            </div>
        </div>
        <div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6">
            <label class="col-xs-12 col-sm-5 col-md-5 col-lg-5 control-label" for="rmb_taptos_area">Construida: </label>
            <div class="col-xs-12 col-sm-7 col-md-7 col-lg-7">
                <input type="text" name="rmb_taptos_area" id="rmb_taptos_area" class="form-control" value="<?php echo $taptos_area;?>" placeholder="Total de área construida" <?php echo $disabled;?>>
            </div>
        </div>
        <div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6">
            <label class="col-xs-12 col-sm-5 col-md-5 col-lg-5 control-label" for="rmb_taptos_priv">Privada: </label>
            <div class="col-xs-12 col-sm-7 col-md-7 col-lg-7">
                <input type="text" name="rmb_taptos_priv" id="rmb_taptos_priv" class="form-control" value="<?php echo $taptos_priv;?>" placeholder="Total área privada" <?php echo $disabled;?>>
            </div>
        </div>
        <div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6">
            <label class="col-xs-12 col-sm-5 col-md-5 col-lg-5 control-label" for="rmb_taptos_banos">Baños: </label>
            <div class="col-xs-12 col-sm-7 col-md-7 col-lg-7">
                <input type="text" name="rmb_taptos_banos" id="rmb_taptos_banos" class="form-control" value="<?php echo $taptos_banos;?>" placeholder="Número de baños" <?php echo $disabled;?>>
            </div>
        </div>
        <div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6">
            <label class="col-xs-12 col-sm-5 col-md-5 col-lg-5 control-label" for="rmb_taptos_hab">Alcobas: </label>
            <div class="col-xs-12 col-sm-7 col-md-7 col-lg-7">
                <input type="text" name="rmb_taptos_hab" id="rmb_taptos_hab" class="form-control" value="<?php echo $taptos_hab;?>" placeholder="Número de alcobas" <?php echo $disabled;?>>
            </div>
        </div>
        <div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6">
            <label class="col-xs-12 col-sm-5 col-md-5 col-lg-5 control-label" for="rmb_taptos_balc">Balcones: </label>
            <div class="col-xs-12 col-sm-7 col-md-7 col-lg-7">
                <input type="text" name="rmb_taptos_balc" id="rmb_taptos_balc" class="form-control" value="<?php echo $taptos_balc;?>" placeholder="Número de balcones" <?php echo $disabled;?>>
            </div>
        </div>
        <!-- Alcoba Estudio -->
        <div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6">
            <label class="col-xs-12 col-sm-7 col-md-5 col-lg-5 control-label" for="rmb_taptos_est">¿Estudio?: </label>
            <div class="col-xs-12 col-sm-5 col-md-7 col-lg-7">
                <div class="radio">
                    <label>
                        <input type="radio" name="rmb_taptos_est" id="rmb_taptos_est1" value="1" alt="Si el apartamento tiene alcoba o espacio para estudio marque esta opción" title="Si el apartamento tiene alcoba o espacio para estudio marque esta opción" <?php if($taptos_est == '1'){echo 'checked="checked"';}?> <?php echo $disabled;?>>SI
                    </label>
                    <label>
                        <input type="radio" name="rmb_taptos_est" id="rmb_taptos_est2" value="0" alt="Si el apartamento NO tiene alcoba o espacio para estudio marque esta opción" title="Si el apartamento NO tiene alcoba o espacio para estudio marque esta opción" <?php if($taptos_est <> '1'){echo 'checked="checked"';}?> <?php echo $disabled;?>>NO
                    </label>
                </div>
            </div>
        </div>
        <!-- Alcoba Servicio -->
        <div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6">
            <label class="col-xs-12 col-sm-7 col-md-5 col-lg-5 control-label" for="rmb_taptos_serv">¿Servicio?: </label>
            <div class="col-xs-12 col-sm-5 col-md-7 col-lg-7">
                <div class="radio">
                    <label>
                        <input type="radio" name="rmb_taptos_serv" id="rmb_taptos_serv1" value="1" alt="Si el apartamento tiene alcoba de servicio marque esta opción" title="Si el apartamento tiene alcoba de servicio marque esta opción" <?php if($taptos_serv == '1'){echo 'checked="checked"';}?> <?php echo $disabled;?>>SI
                    </label>
                    <label>
                        <input type="radio" name="rmb_taptos_serv" id="rmb_taptos_serv2" value="0" alt="Si el apartamento NO tiene alcoba de servicio marque esta opción" title="Si el apartamento NO tiene alcoba de servicio marque esta opción" <?php if($taptos_serv <> '1'){echo 'checked="checked"';}?> <?php echo $disabled;?>>NO
                    </label>
                </div>
            </div>
        </div>
        <!-- Terraza -->
        <div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6">
            <label class="col-xs-12 col-sm-7 col-md-5 col-lg-5 control-label" for="rmb_taptos_terr">Terrazas: </label>
            <div class="col-xs-12 col-sm-7 col-md-7 col-lg-7">
                <input type="text" name="rmb_taptos_terr" id="rmb_taptos_terr" class="form-control" value="<?php echo $taptos_terr;?>" placeholder="Terrazas" alt="Digite el número de terrazas de este tipo de vivienda o digite 0 si no tiene." title="Digite el número de terrazas de este tipo de vivienda o digite 0 si no tiene." <?php echo $disabled;?>>
            </div>
        </div>
        <div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6">
            <label class="col-xs-12 col-sm-5 col-md-5 col-lg-5 control-label" for="rmb_taptos_coef">Coeficiente: </label>
            <div class="col-xs-12 col-sm-7 col-md-7 col-lg-7">
                <input type="text" name="rmb_taptos_coef" id="rmb_taptos_coef" class="form-control" value="<?php echo $taptos_coef;?>" placeholder="Coeficiente" alt="Digite coeficiente de área de este tipo de vivienda." title="Digite coeficiente de área de este tipo de vivienda." <?php echo $disabled;?>>
            </div>
        </div>
        <div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6">
            <label class="col-xs-12 col-sm-5 col-md-5 col-lg-5 control-label" for="rmb_taptos_admin">Administración: </label>
            <div class="col-xs-12 col-sm-7 col-md-7 col-lg-7">
                <input type="text" name="rmb_taptos_admin" id="rmb_taptos_admin" class="form-control" value="<?php echo $taptos_admin;?>" placeholder="Valor Administración" alt="Digite el valor a pagar por concepto de Administración de este tipo de vivienda, solo se permiten numeros, sin comas ni puntos." title="Digite el valor a pagar por concepto de Administración de este tipo de vivienda, solo se permiten numeros, sin comas ni puntos." <?php echo $disabled;?>>
            </div>
        </div>
        <div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6">
            <label class="col-xs-12 col-sm-5 col-md-5 col-lg-5 control-label" for="rmb_aptos_nom">Apartamentos: </label>
            <div class="col-xs-12 col-sm-7 col-md-7 col-lg-7 input-group" style="padding-left: 5px;padding-right: 5px;">
                <input type="text" name="rmb_aptos_nom" id="rmb_aptos_nom" class="form-control" value="" placeholder="Número de Apartamento" <?php echo $disabled;?>>
                <span class="input-group-btn" title="Agregar">
                    <button class="btn btn-warning" type="button" <?php echo $disabled;?>>
                        <i class="glyphicon glyphicon-plus"></i>
                    </button>
                </span>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <label class="hidden-xs col-sm-2 col-md-2 col-lg-2 control-label" for="">
                    <input type="hidden" name="array_aptos" id="array_aptos" class="form-control" value="">
                </label>
                <div class="col-xs-12 col-sm-10 col-md-10 col-lg-10 input-group" id="rel-aptos"><?php 
                    if($res_aptos_x_taptos){
                        if(mysql_num_rows($res_aptos_x_taptos) > 0){
                            while($row_aptos_x_taptos = mysql_fetch_array($res_aptos_x_taptos)){
                                echo '<span><span class="rel-aptos">'.$row_aptos_x_taptos[0].'</span>';
                                if($disabled == ''){
                                    echo'<i class="glyphicon glyphicon-remove"></i>';
                                }
                                echo'</span>';
                            }
                        }
                    }?>
                </div>
            </div>
        </div>
        <div class="clearfix">&nbsp;</div>
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center"><?php 
            if($id_taptos){?>
                <input type="hidden" name="id_upd" id="id_upd" class="form-control" value="<?php echo $id_taptos;?>">
            <?php }?>
            <button type="submit" class="btn btn-default btn-lg" <?php echo $disabled;?>>Actualizar</button>
            <button type="button" class="btn btn-default btn-lg btn-regresar">Regresar</button>
        </div>
        <div class="clearfix">&nbsp;</div>
    </form>
</div>
<div class="clearfix">&nbsp;</div>
<script src="../js/bootstrapValidator.js"></script>
<script>
    cargaFormTaptos();
    $(document).ready(function() {
        // Validación formulario de datos del propietario
        $('#form_masc').bootstrapValidator({
            message: 'Este valor no es valido',
            feedbackIcons: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                rmb_taptos_nom: {
                    message: 'El nombre del tipo no es valido',
                    validators: {
                        notEmpty: {
                            message: 'El nombre del tipo es requerido'
                        }
                    }
                }
            }
        })
        .on('success.form.bv', function(e) {
            // Prevent form submission
            e.preventDefault();
            espereshow();
            // obtenemos el numero de apartamentos ingresados
            var num_aptos = $(".rel-aptos");
            // Creamos una vaiable tipo array
            var array_aptos = [];
            // si el numero de apartamentos es mayor a 0 hace esto
            if(num_aptos.length > 0){
                // iteramos en cada elemento de los apartamentos ingresados
                $.each(num_aptos, function(key, value) {
                    // agergamos cada numero de apartamento encontrado al array 
                    array_aptos.push($(value).html());
                });
                // asignamos el valor del array a el campo oculto para que lo envie junto con el form
                $("#array_aptos").val(array_aptos);
            }
            // asignamos los campos del formulario con sus valores a la variable
            var datos_form = new FormData($("#form_masc")[0]);
            $.ajax({
                url:"../php/ins_upd_taptos.php",
                cache:false,
                type:"POST",
                contentType:false,
                data:datos_form,
                processData:false,
                success: function(datos){
                    if(datos !== ''){
                        setTimeout(esperehide, 500);
                        $("#col-md-12").load('tipos-de-apartamento.php');
                        history.pushState({page: "tipos-de-apartamento.php"}, "Lista tipos de apartamento", "tipos-de-apartamento.html");
                        swal({
                            title: "Felicidades!",
                            text: "El registro se ha guardado correctamente!",
                            type: "success",
                            confirmButtonText: "Continuar",
                            confirmButtonColor: "#94B86E"
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
</script>