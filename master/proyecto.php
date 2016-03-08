<?php
session_start();
require_once ("../conexion/conexion.php");
require_once ("../php/funciones.php");
//////////////////////////////////////////////////////////////////////////////////////
// Aplicación PHP usando Bootstrap, jquery, HTML5 y CSS - PH                        //
// Copyright 2014 Wilson Giovanny Velandia Barreto 3204274564 - willyv78@gmail.com  //
//////////////////////////////////////////////////////////////////////////////////////
// $id_proyecto = $_GET['id'];
$where = "";
$id_proyecto = 1;
if($id_proyecto <> ''){
    $where = "WHERE rmb_proyecto_id = '".$id_proyecto."'";
}
$res = registroCampo("rmb_proyecto", "*", "$where", "", "");
?>
<!-- Titulo de la pagina -->
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
   <div class="hidden-xs col-sm-4 col-md-4 col-lg-4 pull-left text-left">
       <input type="hidden" value="rmb_residente">
       <h3 class="text-left">Beamonte</h3>
   </div>
   <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8 pull-right text-right">
       <h3 class="text-right"></h3>
   </div>
</div><?php 
if($res){
    if(mysql_num_rows($res) > 0){
        $row_res = mysql_fetch_array($res);?>
        <dl class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <!-- Datos Generales -->
            <dt>Datos Generales</dt>
            <dd>
                <div class="text-left" id="datos">
                    <form id="form_gen" name="form_gen" action="" method="POST" class="form-horizontal" role="form" enctype="multipart/form-data">
                        <div class="form-group col-xs-6 col-sm-6 col-md-6 col-lg-6">
                            <label class="col-xs-12 col-sm-5 col-md-5 col-lg-5 control-label" for="rmb_tproyecto_id">Tipo: </label>
                            <div class="col-xs-12 col-sm-7 col-md-7 col-lg-7">
                                <?php echo campoSelect($row_res[1], "rmb_tproyecto");?>
                            </div>
                        </div>
                        <div class="form-group col-xs-6 col-sm-6 col-md-6 col-lg-6">
                            <label class="col-xs-12 col-sm-5 col-md-5 col-lg-5 control-label" for="rmb_proyecto_nom">Nombre: </label>
                            <div class="col-xs-12 col-sm-7 col-md-7 col-lg-7">
                                <input class="form-control" type="text" id="rmb_proyecto_nom" name="rmb_proyecto_nom" placeholder="Nombre" <?php echo $desabilitar;?> value="<?php echo $row_res[2];?>">
                            </div>
                        </div>
                        <div class="form-group col-xs-6 col-sm-6 col-md-6 col-lg-6">
                            <label class="col-xs-12 col-sm-5 col-md-5 col-lg-5 control-label" for="rmb_proyecto_dir">Dirección: </label>
                            <div class="col-xs-12 col-sm-7 col-md-7 col-lg-7">
                                <input class="form-control" type="text" id="rmb_proyecto_dir" name="rmb_proyecto_dir" placeholder="Dirección" <?php echo $desabilitar;?> value="<?php echo $row_res[3];?>">
                            </div>
                        </div>
                        <div class="form-group col-xs-6 col-sm-6 col-md-6 col-lg-6">
                            <label class="col-xs-12 col-sm-5 col-md-5 col-lg-5 control-label" for="rmb_proyecto_tel">Teléfono: </label>
                            <div class="col-xs-12 col-sm-7 col-md-7 col-lg-7">
                                <input class="form-control" type="text" id="rmb_proyecto_tel" name="rmb_proyecto_tel" placeholder="Teléfono" <?php echo $desabilitar;?> value="<?php echo $row_res[4];?>">
                            </div>
                        </div>
                        <div class="form-group col-xs-6 col-sm-6 col-md-6 col-lg-6">
                            <label class="col-xs-12 col-sm-5 col-md-5 col-lg-5 control-label" for="rmb_proyecto_cel">Celular: </label>
                            <div class="col-xs-12 col-sm-7 col-md-7 col-lg-7">
                                <input class="form-control" type="text" id="rmb_proyecto_cel" name="rmb_proyecto_cel" placeholder="Celular" <?php echo $desabilitar;?> value="<?php echo $row_res[5];?>">
                            </div>
                        </div>
                        <div class="form-group col-xs-6 col-sm-6 col-md-6 col-lg-6">
                            <label class="col-xs-12 col-sm-5 col-md-5 col-lg-5 control-label" for="rmb_proyecto_area">Área Total: </label>
                            <div class="col-xs-12 col-sm-7 col-md-7 col-lg-7">
                                <input class="form-control" type="text" id="rmb_proyecto_area" name="rmb_proyecto_area" placeholder="Área Total" <?php echo $desabilitar;?> value="<?php echo $row_res[6];?>">
                            </div>
                        </div>
                        <div class="form-group col-xs-6 col-sm-6 col-md-6 col-lg-6">
                            <label class="col-xs-12 col-sm-5 col-md-5 col-lg-5 control-label" for="rmb_tdoc_id">Tipo Documento: </label>
                            <div class="col-xs-12 col-sm-7 col-md-7 col-lg-7">
                                <?php echo campoSelect($row_res[7], "rmb_tdoc");?>
                            </div>
                        </div>
                        <div class="form-group col-xs-6 col-sm-6 col-md-6 col-lg-6">
                            <label class="col-xs-12 col-sm-5 col-md-5 col-lg-5 control-label" for="rmb_proyecto_ndoc">No. Documento: </label>
                            <div class="col-xs-12 col-sm-7 col-md-7 col-lg-7">
                                <input class="form-control" type="text" id="rmb_proyecto_ndoc" name="rmb_proyecto_ndoc" placeholder="No. Documento" <?php echo $desabilitar;?> value="<?php echo $row_res[8];?>">
                            </div>
                        </div>
                        <div class="form-group col-xs-6 col-sm-6 col-md-6 col-lg-6">
                            <label class="col-xs-12 col-sm-5 col-md-5 col-lg-5 control-label" for="rmb_proyecto_email">Email: </label>
                            <div class="col-xs-12 col-sm-7 col-md-7 col-lg-7">
                                <input class="form-control" type="text" id="rmb_proyecto_email" name="rmb_proyecto_email" placeholder="Email" <?php echo $desabilitar;?> value="<?php echo $row_res[9];?>">
                            </div>
                        </div>
                        <div class="form-group col-xs-6 col-sm-6 col-md-6 col-lg-6">
                            <label class="col-xs-12 col-sm-5 col-md-5 col-lg-5 control-label" for="rmb_proyecto_foto">Logo: </label>
                            <div class="col-xs-12 col-sm-7 col-md-7 col-lg-7"><?php 
                                if($row_res[10] <> ''){?>
                                    <img id="vistaPrevia" src="<?php echo $row_res[10];?>" width="50%"/><?php 
                                }?>
                                <input class="form-control fileimagen" type="file" id="rmb_proyecto_foto" name="rmb_proyecto_foto" placeholder="Logo" <?php echo $desabilitar;?> value="<?php echo $row_res[10];?>">
                            </div>
                        </div>
                        <div class="form-group col-xs-6 col-sm-6 col-md-6 col-lg-6">
                            <label class="col-xs-12 col-sm-5 col-md-5 col-lg-5 control-label" for="rmb_proyecto_obs">Observación: </label>
                            <div class="col-xs-12 col-sm-7 col-md-7 col-lg-7">
                                <textarea class="form-control" id="rmb_proyecto_obs" name="rmb_proyecto_obs" rows="3" placeholder="Realice una observación" <?php echo $desabilitar;?>><?php echo $row_res[11];?></textarea>
                            </div>
                        </div>
                        <div class="form-group col-xs-6 col-sm-6 col-md-6 col-lg-6">
                            <label class="col-xs-12 col-sm-5 col-md-5 col-lg-5 control-label" for="rmb_proyecto_plantilla">Plantilla: </label>
                            <div class="col-xs-12 col-sm-7 col-md-7 col-lg-7">
                                <select name="rmb_proyecto_plantilla" id="rmb_proyecto_plantilla" class="form-control" <?php echo $desabilitar;?>>
                                    <option value="" <?php if($row_res[12] == ''){echo "selected";}?>>-- Seleccione --</option>
                                    <option value="1" <?php if($row_res[12] == '1'){echo "selected";}?>>Plantilla 1</option>
                                    <option value="2" <?php if($row_res[12] == '2'){echo "selected";}?>>Plantilla 2</option>
                                    <option value="3" <?php if($row_res[12] == '3'){echo "selected";}?>>Plantilla 3</option>
                                </select>
                            </div>
                        </div>
                        <div class="clearfix">&nbsp;</div>
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center"><?php 
                            if($id_proyecto <> ''){?>
                                <input type="hidden" id="id_upd" name="id_upd" value="<?php echo $id_proyecto;?>"><?php 
                            }
                            else{?>
                                <input type="hidden" id="id_sup_gen" name="id_sup_gen" value="<?php echo $id_proyecto;?>">
                            <?php }?>
                            <button type="submit" class="btn btn-default"><img id="actualizar" src="../css/plantilla1/img/actualizar.png" alt=""></button>
                        </div>
                    </form>
                </div>
                <div class="clearfix">&nbsp;</div>
            </dd>
            <!-- Torres -->
            <dt>Torres</dt>
            <dd>
                <div class="text-left" id="torres">
                    <form id="form_torres" name="form_torres" action="" method="POST" class="form-horizontal" role="form" enctype="multipart/form-data">
                        <div class="form-group col-xs-6 col-sm-6 col-md-6 col-lg-6">
                            <label class="col-xs-12 col-sm-5 col-md-5 col-lg-5 control-label" for="rmb_tproyecto_id">Nombre: </label>
                            <div class="col-xs-12 col-sm-7 col-md-7 col-lg-7">
                                <input class="form-control" type="text" id="rmb_proyecto_nom" name="rmb_proyecto_nom" placeholder="Nombre" <?php echo $desabilitar;?> value="<?php echo $row_res[2];?>">
                            </div>
                        </div>
                        <div class="form-group col-xs-6 col-sm-6 col-md-6 col-lg-6">
                            <label class="col-xs-12 col-sm-5 col-md-5 col-lg-5 control-label" for="rmb_proyecto_nom">Cant. Ascensores: </label>
                            <div class="col-xs-12 col-sm-7 col-md-7 col-lg-7">
                                <input class="form-control" type="text" id="rmb_proyecto_nom" name="rmb_proyecto_nom" placeholder="Nombre" <?php echo $desabilitar;?> value="<?php echo $row_res[2];?>">
                            </div>
                        </div>
                        <div class="form-group col-xs-6 col-sm-6 col-md-6 col-lg-6">
                            <label class="col-xs-12 col-sm-5 col-md-5 col-lg-5 control-label" for="rmb_proyecto_dir">Cant. Parq. Residentes: </label>
                            <div class="col-xs-12 col-sm-7 col-md-7 col-lg-7">
                                <input class="form-control" type="text" id="rmb_proyecto_dir" name="rmb_proyecto_dir" placeholder="Dirección" <?php echo $desabilitar;?> value="<?php echo $row_res[3];?>">
                            </div>
                        </div>
                        <div class="form-group col-xs-6 col-sm-6 col-md-6 col-lg-6">
                            <label class="col-xs-12 col-sm-5 col-md-5 col-lg-5 control-label" for="rmb_proyecto_tel">Cant. Parq. Visitantes: </label>
                            <div class="col-xs-12 col-sm-7 col-md-7 col-lg-7">
                                <input class="form-control" type="text" id="rmb_proyecto_tel" name="rmb_proyecto_tel" placeholder="Teléfono" <?php echo $desabilitar;?> value="<?php echo $row_res[4];?>">
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center"><?php 
                            if($id_proyecto <> ''){?>
                                <input type="hidden" id="id_upd_torres" name="id_upd_torres" value="<?php echo $id_proyecto;?>"><?php 
                            }
                            else{?>
                                <input type="hidden" id="id_sup_torres" name="id_sup_torres" value="<?php echo $id_proyecto;?>">
                            <?php }?>
                            <button type="submit" class="btn btn-default"><img id="actualizar" src="../css/plantilla1/img/actualizar.png" alt=""></button>
                        </div>
                    </form>
                </div>
                <div class="clearfix">&nbsp;</div>
            </dd>
            <!-- Personal que labora en el edificio -->
            <dt>Personal</dt>
            <dd>
                <div class="text-left">
                    <table class="table table-striped">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-left">
                            <tr>
                                <th class="col-xs-5 col-sm-5 col-md-5 col-lg-5">Nombre</th>
                                <td class="col-xs-5 col-sm-5 col-md-5 col-lg-5">
                                    <input class="form-control" type="text" id="rmb_proyecto_" name="rmb_proyecto_" placeholder="Nombre" <?php echo $desabilitar;?> value="Arley Romero">
                                </td>
                                <th class="col-xs-2 col-sm-2 col-md-2 col-lg-2" rowspan="6"><img id="image_admin" src="../images/Javier-Martin-GRUPO-PERSONA.jpg"/></th>
                            </tr>
                            <tr>
                                <th>Nº Identificación</th>
                                <td>
                                    <input class="form-control" type="text" id="rmb_proyecto_" name="rmb_proyecto_" placeholder="Nº Identificación" <?php echo $desabilitar;?> value="1031133765">
                                </td>
                            </tr>
                            <tr>
                                <th>Horario</th>
                                <td>
                                    <div class="col-xs-6 co-sm-6 col-md6 col-lg-6">
                                        <div class="input-group input-group-md">
                                            <input id="timepicker1" type="text" class="form-control">
                                            <span class="input-group-addon"><i class="glyphicon glyphicon-time"></i></span>
                                        </div>
                                    </div>
                                    <div class="col-xs-6 co-sm-6 col-md6 col-lg-6">
                                        <div class="input-group input-group-md">
                                            <input id="timepicker2" type="text" class="form-control">
                                            <span class="input-group-addon"><i class="glyphicon glyphicon-time"></i></span>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th>Permisos</th>
                                <td>
                                    <input class="form-control" type="text" id="rmb_proyecto_" name="rmb_proyecto_" placeholder="Permisos" <?php echo $desabilitar;?> value="Ingreso y salida de vehículos">
                                </td>
                            </tr>
                            <tr>
                                <th>Tipo</th>
                                <td>
                                    <input class="form-control" type="text" id="rmb_proyecto_" name="rmb_proyecto_" placeholder="Tipo" <?php echo $desabilitar;?> value="Seguridad">
                                </td>
                            </tr>
                            <tr>
                                <th>Observación</th>
                                <td>
                                    <textarea name="" id="input" class="form-control" rows="3" required="required">Horario de L - V de 6 am  a 5 pm y Sab de 8am a 12pm</textarea>
                                </td>
                            </tr>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center">
                            <tr>
                                <td class="text-center" colspan="3">
                                    <button type="button" class="btn btn-success">Actualizar</button>
                                    <button type="button" class="btn btn-danger">Eliminar</button>
                                </td>
                            </tr>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-left">
                            <tr>
                                <th>Nombre</th>
                                <td>
                                    <input class="form-control" type="text" id="rmb_proyecto_" name="rmb_proyecto_" placeholder="Nombre" <?php echo $desabilitar;?> value="Guadalupe Rodriguez">
                                </td>
                                <th rowspan="5"><img id="image_admin" src="../images/Javier-Martin-GRUPO-PERSONA.jpg"/></th>
                            </tr>
                            <tr>
                                <th>Nº Identificación</th>
                                <td>
                                    <input class="form-control" type="text" id="rmb_proyecto_" name="rmb_proyecto_" placeholder="Nº Identificación" <?php echo $desabilitar;?> value="Nº Identificación">
                                </td>
                            </tr>
                            <tr>
                                <th>Horario</th>
                                <td>
                                    <div class="col-xs-6 co-sm-6 col-md6 col-lg-6">
                                        <div class="input-group input-group-md">
                                            <input id="timepicker3" type="text" class="form-control">
                                            <span class="input-group-addon"><i class="glyphicon glyphicon-time"></i></span>
                                        </div>
                                    </div>
                                    <div class="col-xs-6 co-sm-6 col-md6 col-lg-6">
                                        <div class="input-group input-group-md">
                                            <input id="timepicker4" type="text" class="form-control">
                                            <span class="input-group-addon"><i class="glyphicon glyphicon-time"></i></span>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th>Permisos</th>
                                <td>
                                    <input class="form-control" type="text" id="rmb_proyecto_" name="rmb_proyecto_" placeholder="Permisos" <?php echo $desabilitar;?> value="Ingresar paquetes y/o bolsas">
                                </td>
                            </tr>
                            <tr>
                                <th>Tipo</th>
                                <td>
                                    <input class="form-control" type="text" id="rmb_proyecto_" name="rmb_proyecto_" placeholder="Tipo" <?php echo $desabilitar;?> value="Servicios Generales">
                                </td>
                            </tr>
                            <tr>
                                <th>Observación</th>
                                <td>
                                    <textarea name="" id="input" class="form-control text-left" rows="3" required="required">Horario de L - V de 6 am  a 5 pm y Sab de 8am a 12pm</textarea>
                                </td>
                            </tr>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center">
                            <tr>
                                <td class="text-center" colspan="3">
                                    <button type="button" class="btn btn-success">Actualizar</button>
                                    <button type="button" class="btn btn-danger">Eliminar</button>
                                </td>
                            </tr>
                        </div>
                    </table>
                </div>
                <div id="contenedor2">
                </div>
                <a style="width: 100%" id="2" class="btn btn-success" href="#">Agregar Personal</a>
            </dd>
            <!-- Contactos -->
            <dt>Contactos</dt>
            <dd>
                <div class="text-left">
                    <table class="table table-striped">
                        <tr>
                            <th class="col-xs-2 col-sm-2 col-md-2 col-lg-2 text-center">Nombre</th>
                            <th class="col-xs-2 col-sm-2 col-md-2 col-lg-2 text-center">CC.</th>
                            <th class="col-xs-2 col-sm-2 col-md-2 col-lg-2 text-center">Telefono Contacto</th>
                            <th class="col-xs-2 col-sm-2 col-md-2 col-lg-2 text-center">Telefono Celular</th>
                            <th class="col-xs-3 col-sm-3 col-md-3 col-lg-3 text-center">Correo Electrónico</th>
                            <th class="text-center"></th>
                        </tr>
                        <tr>
                            <td class="col-xs-2 col-sm-2 col-md-2 col-lg-2 text-center">Fernando Restrepo</td>
                            <td class="col-xs-2 col-sm-2 col-md-2 col-lg-2 text-center">1031140478</td>
                            <td class="col-xs-2 col-sm-2 col-md-2 col-lg-2 text-center">+571 2445456</td>
                            <td class="col-xs-2 col-sm-2 col-md-2 col-lg-2 text-center">300 2393652</td>
                            <td class="col-xs-3 col-sm-3 col-md-3 col-lg-3 text-center">daniel_cardona305@hotmail.com</td>
                            <td class="text-center"><button class="btn btn-danger" title="Eliminar"><i class="glyphicon glyphicon-remove"></i></button></td>
                        </tr>
                    </table>
                </div>
                <div id="contenedor6">
                </div>
                <a style="width: 100%" id="6" class="btn btn-success" href="#">Agregar Persona Emergencia</a>
            </dd>
        </dl><?php 
    }
    else{?>
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-left">
            <div class="widget">
                <div class="alert alert-warning">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <strong>Atención!</strong> No se encontraron registros.
                </div>
            </div>
        </div><?php 
    }
}
else{?>
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-left">
        <div class="widget">
            <div class="alert alert-warning">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <strong>Atención!</strong> No se encontraron registros.
            </div>
        </div>
    </div><?php 
}?>
<!-- jQuery -->
<script type="text/javascript" src="../js/jquery.min.js"></script>
<script type="text/javascript" src="../js/bootstrapValidator.js"></script>
<script src="../js/bootstrap-timepicker.min.js"></script>
<script>cargaProyecto();</script>
<script>
    $(document).ready(function() {
        $('#form_gen').bootstrapValidator({
            message: 'Este valor no es valido',
            feedbackIcons: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                rmb_tproyecto_id: {
                    message: 'El tipo de proyecto no es valido',
                    validators: {
                        notEmpty: {
                            message: 'El tipo de proyecto es requerido'
                        }
                    }
                },
                rmb_proyecto_nom: {
                    message: 'El nombre del proyecto no es valido',
                    validators: {
                        notEmpty: {
                            message: 'El nombre del proyecto es requerido'
                        },
                        stringLength: {
                            min: 3,
                            max: 50,
                            message: 'El nombre del proyecto debe contener de 3 a 50 characteres'
                        },
                        regexp: {
                            regexp: /^[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ\_\s\.\-]+$/,
                            message: 'El nombre del empleado debe contener letras.'
                        }
                    }
                }
            }
        })
        .on('success.form.bv', function(e) {
            // Prevent form submission
            e.preventDefault();
            espereshow();
            var datos_form = new FormData($("#form_gen")[0]);
            $.ajax({
                url:"../php/ins_upd_gen.php",
                cache:false,
                type:"POST",
                contentType:false,
                data:datos_form,
                processData:false,
                success: function(datos){
                    if(datos !== ''){
                        alert(datos);
                        $("#solic_vacaciones").load("./solic_vacaciones.php?id_emp="+id_emp+"&perm_mod="+sess_mod_1);
                        swal({
                            title: "Felicidades!",
                            text: "El registro se ha guardado correctamente!",
                            type: "success",
                            confirmButtonText: "Continuar",
                            confirmButtonColor: "#94B86E"
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
<script>
    $('#timepicker1').timepicker();
    $('#timepicker2').timepicker();
    $('#timepicker3').timepicker();
    $('#timepicker4').timepicker();
</script>