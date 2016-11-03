<?php session_start();
require_once ("../conexion/conexion.php");
require_once ("../php/funciones.php");

$accion = "Nuevo";
$id_upd = "";
$nom_boton = "Enviar";
$mens_id = "";
$mens_asunto = "";
$mens_mens = "";
$mens_fenv = "";
$mens_frec = "";
$mens_est = "";
$mens_flee = "";
$mens_res_id = "";
$mens_res_nom = "";
$mens_res_ape = "";
$mens_res_apto = "";
if(isset($_GET['id_mensaje'])){
    $id_upd = $_GET['id_mensaje'];
    $accion = "Ver";
    $nom_boton = "Responder";

    $res_mens = registroCampo("rmb_mens m", "m.rmb_mens_id, m.rmb_mens_asunto, m.rmb_mens_mens, m.rmb_mens_fenv, m.rmb_mens_frec, m.rmb_est_id, m.rmb_mens_flee, r.rmb_residente_id, r.rmb_residente_nom, r.rmb_residente_ape, a.rmb_aptos_nom", "LEFT JOIN rmb_mens_dest d USING(rmb_mens_id) LEFT JOIN rmb_residente r USING(rmb_residente_id) LEFT JOIN rmb_residente_x_aptos rxa USING(rmb_residente_id) LEFT JOIN rmb_aptos a USING(rmb_aptos_id) WHERE m.rmb_mens_id = '$id_upd' AND rmb_mens_dest_tipo = 'de'", "", "ORDER BY r.rmb_residente_nom ASC");

    if($res_mens){
        if(mysql_num_rows($res_mens) > 0){
            list($mens_id, $mens_asunto, $mens_mens, $mens_fenv, $mens_frec, $mens_est, $mens_flee, $mens_res_id, $mens_res_nom, $mens_res_ape, $mens_res_apto) = mysql_fetch_array($res_mens);
        }
    }
}
?>
<div class="col-xs-12 col-sm-offset-1 col-sm-10 col-md-offset-1 col-md-10 col-lg-offset-2 col-lg-8">
    <div class="modal-content">
        <div class="modal-header">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 titulo-pagina">
                <div class="clearfix">&nbsp;</div>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">
                    <span style="font-weight: bold;color: #546E7A">
                        <i class="glyphicon glyphicon-send"></i>&nbsp;<?php echo $accion." Mensaje";?>
                    </span>
                </h4>
                <input type="hidden" name="rmb_cdoc_id" id="rmb_cdoc_id" class="form-control" value="<?php echo $tipo;?>">
                <div class="clearfix">&nbsp;</div>
            </div>
        </div>
        <div class="modal-body">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <form id="form_mens" name="form_mens" action="" method="POST" class="form-horizontal" role="form" enctype="multipart/form-data">
                    <!-- para -->
                    <div class="form-group">
                        <label class="col-xs-2 col-sm-2 col-md-2 col-lg-2" for="rmb_mens_para_original">Para :</label>
                        <div class="col-xs-10 col-sm-10 col-md-10 col-lg-10"><?php echo $mens_res_apto." - ".$mens_res_nom." - ".$mens_res_ape;?></div>
                        <input type="hidden" name="rmb_residente_id" id="rmb_residente_id" class="form-control" value="<?php echo $mens_res_id;?>">
                    </div>
                    <div class="form-group">
                        <label class="col-xs-2 col-sm-2 col-md-2 col-lg-2" for="rmb_mens_asunto_original">Asunto :</label>
                        <div class="col-xs-10 col-sm-10 col-md-10 col-lg-10"><?php echo $mens_asunto;?></div>
                        <input type="hidden" name="rmb_mens_asunto" id="rmb_mens_asunto" class="form-control" value="<?php echo $mens_asunto;?>">
                    </div>
                    <div class="form-group">
                        <label class="col-xs-2 col-sm-2 col-md-2 col-lg-2" for="rmb_mens_asunto_original">Mensaje Original :</label><textarea class="form-control" name="rmb_mens_mens_original" id="rmb_mens_mens_original" cols="28" rows="5" alt="Contenido del mensaje original." title="Digite el contenido del mensaje original." placeholder="Contenido del Mensaje original" disabled="disabled"><?php echo $mens_mens;?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="rmb_mens_mens">Mensaje :</label>
                        <textarea class="form-control" name="rmb_mens_mens" id="rmb_mens_mens" cols="28" rows="5" alt="Digite el contenido del mensaje de respuesta." title="Digite el contenido del mensaje de respuesta." placeholder="Contenido del Mensaje de respuesta"></textarea>
                    </div>
                    <div class="clearfix">&nbsp;</div>
                    <div class="form-group text-center"><?php 
                    if(isset($_GET['id_mensaje'])){?>
                        <input type="hidden" name="id_upd_respuesta" id="id_upd_respuesta" class="form-control" value="<?php echo $_GET['id_mensaje'];?>"><?php 
                    }?>
                    <button type="submit" class="btn btn-default"><?php echo $nom_boton;?></button>
                    </div>
                    <div class="clearfix">&nbsp;</div>
                </form>
            </div>
        </div>
        <div class="modal-footer">
            <!-- <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button> -->
        </div>
    </div>
</div>

<!-- jQuery -->
<script src="../js/jquery.min.js"></script>
<script src="../js/sweet-alert.js"></script><!-- Personalizar alertas -->

<!-- Libreria java script que realiza la validacion de los formulariosP -->
<script src="../js/bootstrap-datepicker.js"></script> <!-- Datetimepicker -->
<script src="../js/bootstrapValidator.js"></script>
<script>
        $(document).ready(function() {
        function agregarPara (e) {
            var destinatarios_para = $("#destinatarios-para").val();
            if(!destinatarios_para){
                $('#form_mens').bootstrapValidator('addField', 'rmb_residente_id', {
                    validators: {
                        notEmpty: {
                            message: 'Seleccione un destinatario'
                        }
                    }
                });
            }
        }
        $(".btn-default").on("click", agregarPara);
        $('#form_mens').bootstrapValidator({
            message: 'Este valor no es valido',
            feedbackIcons: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                rmb_mens_asunto: {
                    message: 'El asunto no es valido',
                    validators: {
                        notEmpty: {
                            message: 'El asunto es requerido'
                        },
                        stringLength: {
                            min: 3,
                            max: 250,
                            message: 'El asunto debe contener de 3 a 250 caracteres'
                        },
                        regexp: {
                            regexp: /^[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ_ .:,#@%]+$/,
                            message: 'El asunto debe contener letras, numeros, acentos, espacios y algunos caracteres especiales.'
                        }
                    }
                },
                rmb_mens_mens: {
                    message: 'El mensaje no es valido',
                    validators: {
                        notEmpty: {
                            message: 'El mensaje es requerido'
                        }
                    }
                }
            }
        })
        .on('success.form.bv', function(e) {
            // Prevent form submission
            e.preventDefault();
            var datos_form = new FormData($("#form_mens")[0]);
            $.ajax({
                url:"../php/ins_upd_mens.php",
                cache:false,
                type:"POST",
                contentType:false,
                data:datos_form,
                processData:false,
                success: function(datos){
                    if(datos !== ''){
                        // alert(datos);
                        swal({
                            title: "Felicidades!",
                            text: "El se ha enviado el mensaje correctamente!",
                            type: "success",
                            confirmButtonText: "Continuar",
                            confirmButtonColor: "#94B86E"
                        });
                        $("#mensajes").load("lista-mensajes.php?tipo=para");
                        $("button").removeClass('active');
                        $("#recibidos").addClass('active');
                        setTimeout($(".ing-cal").addClass('hidden'), 500);
                        setTimeout($(".ing-cal").html(""), 500);
                    }
                    else{
                        swal({
                            title: "Error!",
                            text: "Ha ocurrido un error,\nNo se ha enviado el mensaje,\nrevise la información diligenciada he intentelo nuevamente.",
                            type: "error",
                            confirmButtonText: "Aceptar",
                            confirmButtonColor: "#E25856"
                        });
                        $(".ing-cal").html("");
                        $(".ing-cal").addClass('hidden');
                        return;
                    }
                }
            });
        });
    });
    editDocumento();
</script>
<!-- FIN Pagina primera pestaña -->