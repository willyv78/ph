<?php session_start();
require_once ("../conexion/conexion.php");
require_once ("../php/funciones.php");

$accion = "Nuevo";
$id_upd = "";
$nom_boton = "Enviar";
if(isset($_GET['id_mensaje'])){
    $id_upd = $_GET['id_mensaje'];
    $accion = "Ver";
    $nom_boton = "Responder";
    $res_aptos_x_mens_para = registroCampo("rmb_mens_dest d", "r.rmb_residente_id, a.rmb_aptos_nom, r.rmb_residente_nom, r.rmb_residente_ape", "LEFT JOIN rmb_residente_x_aptos rxa USING(rmb_residente_id) LEFT JOIN rmb_aptos a USING(rmb_aptos_id)", "WHERE (d.rmb_mens_id = '$id_upd' AND d.rmb_mens_dest_tipo = 'para')", "ORDER BY a.rmb_aptos_nom ASC");
}
?>
<div class="modal-dialog">
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
                        <label for="rmb_mens_para">Para :</label>
                        <div class="input-group input-group-md"><?php 
                            echo campoSelectMaster("rmb_residente para", "", "para.rmb_residente_id, a.rmb_aptos_nom, para.rmb_residente_nom, para.rmb_residente_ape", "LEFT JOIN rmb_residente_x_aptos rxa USING(rmb_residente_id) LEFT JOIN rmb_aptos a USING(rmb_aptos_id)", "WHERE (rxa.rmb_tres_id = '1' OR para.rmb_perf_id = '2')", "", "ORDER BY a.rmb_aptos_nom ASC");?>
                            <span id="new_para" class="input-group-addon" alt="Agregar destinatario para" title="Agregar destinatario para"><i class="glyphicon glyphicon-plus"></i></span>
                        </div>
                    </div>
                    <!-- destinatarios para -->
                    <div class="form-group">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 destinatarios" id="des-para">
                            <input type="hidden" name="destinatarios-para" id="destinatarios-para" class="form-control" value=""><?php 
                            if($res_aptos_x_mens_para){
                                if(mysql_num_rows($res_aptos_x_mens_para) > 0){
                                    while($row_aptos_x_mens_para = mysql_fetch_array($res_aptos_x_mens_para)){
                                        echo '<span><span name="'.$row_aptos_x_mens_para[0].'" class="rel-aptos">'.$row_aptos_x_mens_para[1].' - '.$row_aptos_x_mens_para[2].' '.$row_aptos_x_mens_para[3].'</span><i class="glyphicon glyphicon-remove"></i></span>';
                                    }
                                }
                            }?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="rmb_mens_asunto">Asunto :</label>
                        <input class="form-control" class="form-control" type="text" id="rmb_mens_asunto" name="rmb_mens_asunto" value="<?php echo $mens_asunto;?>" alt="Digite el asunto del mensaje." title="Digite el asunto del mensaje." placeholder="Asunto del mensaje.">
                    </div>
                    <div class="form-group">
                        <label for="rmb_mens_mens">Mensaje :</label>
                        <textarea class="form-control" name="rmb_mens_mens" id="rmb_mens_mens" cols="28" rows="5" alt="Digite el contenido del mensaje." title="Digite el contenido del mensaje." placeholder="Contenido del Mensaje"><?php echo $mens_mens;?></textarea>
                    </div>
                    <div class="clearfix">&nbsp;</div>
                    <div class="form-group text-center"><?php 
                    if(isset($_GET['id_mensaje'])){?>
                        <input type="hidden" name="id_upd" id="id_upd" class="form-control" value="<?php echo $_GET['id_mensaje'];?>">
                    <?php }
                    ?>
                        <button type="submit" class="btn btn-default"><?php echo $nom_boton;?></button>
                    </div>
                    <div class="fom-group">Nota: Para incluir uno o varios destinatarios del mensaje en el campo "Para" haga click en el boton <i class="glyphicon glyphicon-plus"></i>.</div>
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
                $("#rmb_residente_id").val("");
                $('#form_mens').bootstrapValidator('addField', 'rmb_residente_id', {
                    validators: {
                        notEmpty: {
                            message: 'Seleccione un destinatario y haga click en el +'
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
                        $("#mensajes").load("lista-mensajes.php?tipo=de");
                        $("button").removeClass('active');
                        $("#enviados").addClass('active');
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