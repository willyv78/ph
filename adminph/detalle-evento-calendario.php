<?php session_start();
require_once ("../conexion/conexion.php");
require_once ("../php/funciones.php");
//////////////////////////////////////////////////////////////////////////////////////
// Aplicación PHP usando Bootstrap, jquery, HTML5 y CSS - PH                        //
// Copyright 2014 Wilson Giovanny Velandia Barreto 3204274564 - willyv78@gmail.com  //
//////////////////////////////////////////////////////////////////////////////////////
$id_even = "";
$nom_even = "";
$tipo_even = "";
$fini_even = "";
$ffin_even = "";
$file_even = "";
$obs_even = "";
$fecha_even = "";
$user_even = "";
$pub_even = "";
if(isset($_GET['id'])){
    $res = registroCampo("rmb_calendario", "rmb_calendario_id, rmb_calendario_nom, rmb_tcal_id, rmb_calendario_fini, rmb_calendario_ffin, rmb_calendario_img, rmb_calendario_desc, rmb_calendario_fecha, rmb_calendario_user, rmb_context_id", "WHERE  rmb_calendario_id = '".$_GET['id']."'", "", "");
    if($res){
        if(mysql_num_rows($res) > 0){
            $row = mysql_fetch_array($res);
            $id_even = $row[0];
            $nom_even = $row[1];
            $tipo_even = $row[2];
            $fini_even = date('Y-m-d H:i', strtotime($row[3]));
            $ffin_even = date('Y-m-d H:i', strtotime($row[4]));
            $file_even = $row[5];
            $obs_even = $row[6];
            $fecha_even = $row[7];
            $user_even = $row[8];
            $pub_even = $row[9];
        }
    }
}
if((isset($_GET['tipo'])) && (isset($_GET['start']))){
    $tipo_even = $_GET['tipo'];
    // $fini_even = $_GET['start'];
    $fini_even = date('Y-m-d 07:00', strtotime($_GET['start']));
    // $fecha_date = new DateTime('now', 'America/Bogota');
    // $ffecha_date = $fecha_date->format('c');
    $ffin_even = date('Y-m-d 17:30', strtotime($_GET['start']));;
    // $fini_even = date('m-d-Y H:i', strtotime($_GET['start']));
}
// echo $ffecha_date;
?>
<!-- Inicio página detalle de evento calendario -->
<div class="col-xs-11 col-sm-offset-1 col-sm-10 col-md-offset-2 col-md-8 col-lg-offset-3 col-lg-6">
    <div class="titulo-pagina">
        <div class="clearfix">&nbsp;</div>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title text-left" id="myModalLabel">
            <span style="font-weight: bold;color: #546E7A">
                <i class="glyphicon glyphicon-calendar"></i>&nbsp;Nuevo Evento
            </span>
        </h4>
        <div class="clearfix">&nbsp;</div>
    </div>

    <form id="form_cal" name="form_cal" action="" method="POST" class="form-horizontal" role="form" enctype="multipart/form-data">
        <div class="form-group">
            <label class="col-xs-12 col-sm-3 col-md-3 col-lg-3 control-label" for="rmb_tcal_id">Tipo de evento:</label>
            <div class="col-xs-12 col-sm-9 col-md-9 col-lg-9">
                <?php echo TipoCalendar($tipo_even); ?>
            </div>
        </div>
        <div class="form-group">
            <label class="col-xs-12 col-sm-3 col-md-3 col-lg-3 control-label" for="e3_cal_nom">Título:</label>
            <div class="col-xs-12 col-sm-9 col-md-9 col-lg-9">
                <input id="rmb_calendario_nom" type="text" name="rmb_calendario_nom" class="form-control" value="<?php echo $nom_even; ?>">
            </div>
        </div>
        <div class="form-group">
            <label class="col-xs-12 col-sm-3 col-md-3 col-lg-3 control-label" for="rmb_calendario_fini">Fecha Inicio:</label>
            <div class="col-xs-12 col-sm-9 col-md-9 col-lg-9 input-group date">
                <input class="form-control" id="rmb_calendario_fini" type="text" name="rmb_calendario_fini" value="<?php echo $fini_even; ?>">
                <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
                    </span>
            </div>
        </div>
        <div class="form-group">
            <label class="col-xs-12 col-sm-3 col-md-3 col-lg-3 control-label" for="rmb_calendario_ffin">Fecha Final:</label>
            <div class="col-xs-12 col-sm-9 col-md-9 col-lg-9 input-group date">
                <input class="form-control" id="rmb_calendario_ffin" type="text" name="rmb_calendario_ffin" value="<?php echo $ffin_even; ?>">
                <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
            </div>
        </div>
        <!-- <div class="form-group">
            <label class="col-xs-12 col-sm-3 col-md-3 col-lg-3 control-label" for="rmb_mod_id">Módulo:</label>
            <div class="col-xs-12 col-sm-9 col-md-9 col-lg-9">
                <?php echo campoSelect($emp_even, 'rmb_mod');?>
            </div>
        </div> -->
        <div class="form-group">
            <label class="col-xs-12 col-sm-3 col-md-3 col-lg-3 control-label" for="rmb_calendario_img">Imagen:</label>
            <div class="col-xs-12 col-sm-9 col-md-9 col-lg-9"><?php 
                if($file_even <> ''){?>
                    <img id="vistaPrevia" src="<?php echo $file_even;?>" alt="Image" width="60%" style="margin: auto;"><?php
                }?>
                <input class="form-control fileimagen" type="file" name="rmb_calendario_img" id="rmb_calendario_img" placeholder="Imagen para mostrar en el evento" value="">
            </div>
        </div>
        <div class="form-group">
            <label class="col-xs-12 col-sm-3 col-md-3 col-lg-3 control-label" for="rmb_calendario_desc">Observación:</label>
            <div class="col-xs-12 col-sm-9 col-md-9 col-lg-9">
                <textarea id="rmb_calendario_desc" name="rmb_calendario_desc" class="form-control" rows="3" placeholder="Realice una observación en 250 caractéres"><?php echo $obs_even; ?></textarea>
            </div>
        </div>
        <div class="form-group">
            <label class="col-xs-12 col-sm-3 col-md-3 col-lg-3 control-label" for="rmb_context_id">Visibilidad:</label>
            <div class="col-xs-12 col-sm-9 col-md-9 col-lg-9">
                <div class="checkbox-emp">
                    <label>
                        <input id="rmb_context_id_pub" type="radio" <?php if(($pub_even == '1') || ($pub_even == '')){echo "checked='checked'";}?> name="rmb_context_id" value="1"> Público
                    </label>
                </div>
                <div class="checkbox-emp">
                    <label>
                        <input id="rmb_context_id_pri" type="radio" <?php if($pub_even == '2'){echo "checked='checked'";}?> name="rmb_context_id" value="2"> Privado
                    </label>
                </div>
            </div>
        </div>
        <div class="form-group text-center">
            <div class="clearfix">&nbsp;</div><?php 
            if(isset($_GET['id'])){?>
                <input id="id_upd" type="hidden" name="id_upd" value="<?php echo $_GET['id'];?>">
                <button type="submit" class="btn btn-default">Actualizar</button><?php 
            }
            else{?>
                <button type="submit" class="btn btn-default">Guardar</button><?php

            }?>
        </div>
    </form>

    <div class="clearfix">&nbsp;</div>
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 text-right">
          <div class="mens-est-nom bgreen"></div>
          <span>Tareas&nbsp;</span>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 text-right">
          <div class="mens-est-nom borange"></div>
          <span>Clasificados&nbsp;</span>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 text-right">
          <div class="mens-est-nom bblue"></div>
          <span>Eventos&nbsp;</span>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 text-right">
          <div class="mens-est-nom bred"></div>
          <span>Circulares&nbsp;</span>
        </div>
      </div>
    </div>
    <div class="clearfix">&nbsp;</div>

</div>

<!-- FIN Pagina detalle de evento calendario -->
<!-- jQuery -->
<script type="text/javascript" src="../js/jquery.min.js"></script>
<script type="text/javascript" src='../js/moment-with-locales.js'></script>
<!-- Libreria java script que realiza la validacion de los formulariosP -->
<script type="text/javascript" src="../js/bootstrap-datetimepicker.min.js"></script> <!-- Datetimepicker -->
<script type="text/javascript" src="../js/bootstrapValidator.js"></script>
<script>
    $(document).ready(function() {
        var tipocal = $("#rmb_tcal_id").val();
        $('#form_cal').bootstrapValidator({
            message: 'Este valor no es valido',
            feedbackIcons: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                rmb_tcal_id: {
                    message: 'El tipo de evento no es valido',
                    validators: {
                        notEmpty: {
                            message: 'El tipo de evento es requerido'
                        }
                    }
                },
                rmb_calendario_nom: {
                    message: 'El título del evento no es valido',
                    validators: {
                        notEmpty: {
                            message: 'El título del evento es requerido'
                        },
                        stringLength: {
                            min: 3,
                            max: 50,
                            message: 'El título del evento debe contener de 3 a 40 characteres'
                        },
                        regexp: {
                            regexp: /^[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ_ .:,#@%]+$/,
                            message: 'El título del evento debe contener letras, numeros, acentos espacios y algunos caracteres especiales.'
                        }
                    }
                },
                rmb_calendario_fini: {
                    message: 'La fecha de inicio del evento no es valida',
                    validators: {
                        notEmpty: {
                            message: 'La fecha de inicio del evento es requerida'
                        },
                        date: {
                            format: 'YYYY-MM-DD h:m',
                            message: 'La fecha de inicio del evento no es valida'
                        }
                    }
                },
                rmb_calendario_ffin: {
                    message: 'La fecha final del evento no es valida',
                    validators: {
                        notEmpty: {
                            message: 'La fecha final del evento es requerida'
                        },
                        date: {
                            format: 'YYYY-MM-DD h:m',
                            message: 'La fecha final del evento no es valida'
                        }
                    }
                }
            }
        })
        .on('success.form.bv', function(e) {
            // Prevent form submission
            e.preventDefault();
            
            var datos_form = new FormData($("#form_cal")[0]);
            $.ajax({
                url:"../php/ins_cal.php",
                cache:false,
                type:"POST",
                contentType:false,
                data:datos_form,
                processData:false,
                success: function(datos){
                    if(datos !== ''){
                        var dates = $("#rmb_calendario_fini").val();
                        var rdates = dates.replace(/ /g, 'T');
                        var fecha = new Date(rdates);
                        var fdates = fecha.getFullYear() + "-" + (fecha.getMonth() + 1) + "-" + fecha.getDate();
                        dateString = fdates;
                        var url = "./calendario.php?tipo="+tipocal+"&date="+dateString+"&emp_id="+sess_id;
                        url = encodeURI(url);
                        $("#col-md-12").load(url);
                        swal({
                            title: "Felicidades!",
                            text: "El registro se ha guardado correctamente!",
                            type: "success",
                            confirmButtonText: "Continuar",
                            confirmButtonColor: "#94B86E"
                        });
                        setTimeout($(".ing-cal").addClass('hidden'), 3000);
                        setTimeout($(".ing-cal").html(""), 3000);
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
    });
</script>
<script type="text/javascript">
    $(function () {
      $('#rmb_calendario_fini').datetimepicker({autoclose: true});
      $('#rmb_calendario_ffin').datetimepicker({autoclose: true});
    });
    editEvento();
</script>