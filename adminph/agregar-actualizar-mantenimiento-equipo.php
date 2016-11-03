<?php session_start();
require_once ("../conexion/conexion.php");
require_once ("../php/funciones.php");
$id_eq = "";$fmant = "";$fprox = "";$obs = "";$val = "";$est = "";$emp = "";$fecha = "";$user = "";$accion = "Nuevo Mantenimiento";$id_mantenimiento = "";

if(isset($_GET['id_equipo'])){
   $id_eq = $_GET['id_equipo'];
}
if(isset($_GET['id_mantenimiento'])){
   $accion = "Actualizar Mantenimiento";
   $id_mantenimiento = $_GET['id_mantenimiento'];
   $res_val = DatosMantenimiento($id_mantenimiento);
   if($res_val){
      if(mysql_num_rows($res_val) > 0){
         $row_val = mysql_fetch_array($res_val);
         $id_eq = $row_val[1];
         $fmant = $row_val[2];
         $fprox = $row_val[3];
         $obs = $row_val[4];
         $val = $row_val[5];
         $est = $row_val[6];
         $emp = $row_val[7];
         $fecha = $row_val[8];
         $user = $row_val[9];
      }
   }
}
?>
<div class="col-xs-12 col-sm-offset-1 col-sm-10 col-md-offset-1 col-md-10 col-lg-offset-2 col-lg-8">
    <div class="modal-content">
        <div class="modal-header">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 titulo-pagina">
                <div class="clearfix">&nbsp;</div>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" alt="Cerrar Ventana" title="Cerrar Ventana"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">
                    <span style="font-weight: bold;color: #546E7A">
                        <i class="glyphicon glyphicon-plus"></i>&nbsp;<?php echo $accion;?></span>
                </h4>
                <div class="clearfix">&nbsp;</div>
            </div>
            
        </div>
        <div class="modal-body">
            <div class="clearfix">&nbsp;</div>
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <form id="form_mant" name="form_mant" action="" method="POST" class="form-horizontal" role="form" enctype="multipart/form-data">
                    <div class="form-group col-xs-12 col-sm-6 col-md-4 col-lg-3">
                        <label for="rmb_mant_fmant">Fecha :</label>
                        <input type="text" name="rmb_mant_fmant" id="rmb_mant_fmant" class="form-control" value="<?php echo $fmant;?>" placeholder="Fecha de mantenimiento" alt="Fecha de mantenimiento" title="Fecha de mantenimiento">
                        <input type="hidden" name="rmb_equipos_id" id="rmb_equipos_id" class="form-control" value="<?php echo $id_eq;?>">
                        <?php 
                        if(isset($_GET['id_mantenimiento'])){?>
                            <input type="hidden" name="id_upd" id="id_upd" class="form-control" value="<?php echo $id_mantenimiento;?>"><?php 
                        }?>
                    </div>
                    <div class="form-group col-xs-12 col-sm-6 col-md-4 col-lg-3">
                        <label for="rmb_mant_val">Valor :</label>
                        <input type="text" name="rmb_mant_val" id="rmb_mant_val" class="form-control" value="<?php echo $val;?>" placeholder="Valor del  mantenimiento" alt="Valor del  mantenimiento" title="Valor del  mantenimiento">
                    </div>
                    <div class="form-group col-xs-12 col-sm-6 col-md-4 col-lg-3">
                        <label for="rmb_est_id">Estado :</label>
                        <?php echo campoSelectMaster("rmb_est", $est, "*", "WHERE rmb_est_mod = '6'", "", "ORDER BY rmb_est_nom ASC");?>
                    </div>
                    <div class="form-group col-xs-12 col-sm-6 col-md-4 col-lg-3">
                        <label for="rmb_mant_fprox">Próximo :</label>
                        <input type="text" name="rmb_mant_fprox" id="rmb_mant_fprox" class="form-control" value="<?php echo $fprox;?>" placeholder="Fecha Próximo mantenimiento" alt="Fecha Próximo mantenimiento" title="Fecha Próximo mantenimiento">
                    </div>
                    <div class="clearfix"></div>
                    <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <label for="rmb_mant_obs">Observación :</label>
                        <textarea name="rmb_mant_obs" id="rmb_mant_obs" cols="28" rows="3" class="form-control" alt="Observación relacionada al mantenimiento o al equipo" title="Observación relacionada al mantenimiento o al equipo" placeholder="Observación relacionada al mantenimiento o al equipo"><?php echo $obs; ?></textarea>
                    </div>
                    <div class="clearfix">&nbsp;</div>
                    <div class="form-group text-center col-xs-offset-2 col-sm-offset-5 col-md-offset-5 col-lg-offset-5 col-xs-8 col-sm-3 col-md-2 col-lg-2"><?php 
                    if(isset($_GET['id_mantenimiento'])){?>
                        <button type="submit" class="btn btn-default form-control" alt="Actualizar mantenimiento de equipo" title="Actualizar mantenimiento de equipo">Actualizar</button>
                    <?php }
                    else{?>
                        <button type="submit" class="btn btn-default form-control" alt="Agregar mantenimiento de equipo" title="Agregar mantenimiento de equipo">Agregar</button><?php 
                    }?>
                    </div>
                </form>
            </div>
        </div>
        <div class="modal-footer">
            <!-- <button id="cerrar_modal" type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button> -->
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
        var id_equipo = '<?php echo $id_eq;?>';
        var altopag = resizePag();
        $('#form_mant').bootstrapValidator({
            message: 'Este valor no es valido',
            feedbackIcons: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                rmb_mant_fmant: {
                    message: 'La fecha de mantenimiento no es valida',
                    validators: {
                        date: {
                            format: 'YYYY-MM-DD',
                            message: 'La fecha de mantenimiento no es válida'
                        },
                        notEmpty: {
                            message: 'Seleccione una fecha de mantenimiento'
                        }
                    }
                },
                rmb_est_id: {
                    message: 'El estado del equipo no es valido',
                    validators: {
                        notEmpty: {
                            message: 'El estado del equipo es requerido'
                        }
                    }
                }
            }
        })
        .on('success.form.bv', function(e) {
            // Prevent form submission
            e.preventDefault();
            var datos_form = new FormData($("#form_mant")[0]);
            $.ajax({
                url:"../php/ins_upd_mant.php",
                cache:false,
                type:"POST",
                contentType:false,
                data:datos_form,
                processData:false,
                success: function(datos){
                    if(datos !== ''){
                        $(".ing-cal").addClass('hidden');
                        $(".ing-cal").html('');
                        setTimeout(esperehide, 500);
                        swal({
                            title: "Felicidades!",
                            text: "El registro se ha guardado correctamente!",
                            type: "success",
                            confirmButtonText: "Continuar",
                            confirmButtonColor: "#94B86E"
                        },
                        function () {
                            $(".ing-cal").load("historial-equipo-por-tipo.php?id_equipo="+id_equipo);
                            $(".ing-cal").height(altopag);
                            $(".ing-cal").removeClass('hidden');
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
    });
    detMantenimiento();
    $(function () {
        $('#rmb_mant_fmant').datepicker({format: "yyyy-mm-dd", autoclose: true, endDate: "0d", todayBtn: true});
        $('#rmb_mant_fprox').datepicker({format: "yyyy-mm-dd", autoclose: true, todayBtn: true});
    });
</script>