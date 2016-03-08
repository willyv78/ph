<?php session_start();
require_once ("../conexion/conexion.php");
require_once ("../php/funciones.php");

$id_eq = "";$nom = "";$marc = "";$mod = "";$fab = "";$fcom = "";$val = "";$est = "";$obs = "";$tipo = "";$foto = "";$fecha = "";$user = "";$accion = "Agregar";

if(isset($_GET['id_equipo'])){
   $id_eq = $_GET['id_equipo'];
   $accion = "Actualizar";
   $res_val = EquiposId($id_eq);
   if($res_val){
      if(mysql_num_rows($res_val) > 0){
         $row_val = mysql_fetch_array($res_val);
         $nom = $row_val[1];$marc = $row_val[2];$mod = $row_val[3];$fab = $row_val[4];$fcom = $row_val[5];$val = $row_val[6];$est = $row_val[7];$obs = $row_val[8];$tipo = $row_val[9];$foto = $row_val[10];$fecha = $row_val[11];$user = $row_val[12];
      }
   }
}
if(isset($_GET['tipo_equipo'])){
    $tipo = $_GET['tipo_equipo'];
}

?>
<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 titulo-pagina">
                <div class="clearfix">&nbsp;</div>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" alt="Cerrar Ventana" title="Cerrar Ventana"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">
                    <span style="font-weight: bold;color: #546E7A">
                        <i class="glyphicon glyphicon-search"></i>&nbsp;<?php echo $accion;?> Equipo</span>
                </h4>
                <div class="clearfix">&nbsp;</div>
            </div>
        </div>
        <div class="modal-body">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <form id="form_equipo" name="form_equipo" action="" method="POST" class="form-horizontal" role="form" enctype="multipart/form-data">
                    <div class="form-group col-xs-12 col-sm-6 col-md-4 col-lg-3">
                        <label for="rmb_equipos_nom">Nombre :</label>
                        <input type="text" name="rmb_equipos_nom" id="rmb_equipos_nom" class="form-control" value="<?php echo $nom;?>" title="" placeholder="Nombre del Equipo">
                    </div>
                    <div class="form-group col-xs-12 col-sm-6 col-md-4 col-lg-3">
                        <label for="rmb_equipos_marc">Marca :</label>
                        <input type="text" name="rmb_equipos_marc" id="rmb_equipos_marc" class="form-control" value="<?php echo $marc;?>" title="" placeholder="Marca del Equipo">
                    </div>
                    <div class="form-group col-xs-12 col-sm-6 col-md-4 col-lg-3">
                        <label for="rmb_equipos_mod">Modelo :</label>
                        <input type="text" name="rmb_equipos_mod" id="rmb_equipos_mod" class="form-control" value="<?php echo $mod;?>" title="" placeholder="Modelo del Equipo">
                    </div>
                    <div class="form-group col-xs-12 col-sm-6 col-md-4 col-lg-3">
                        <label for="rmb_equipos_fab">Fabricante :</label>
                        <input type="text" name="rmb_equipos_fab" id="rmb_equipos_fab" class="form-control" value="<?php echo $fab;?>" title="" placeholder="Fabricante del Equipo">
                    </div>
                    <div class="form-group col-xs-12 col-sm-6 col-md-4 col-lg-3">
                        <label for="rmb_equipos_fcom">Fecha compra :</label>
                        <input type="text" name="rmb_equipos_fcom" id="rmb_equipos_fcom" class="form-control" value="<?php echo $fcom;?>" title="" placeholder="Fecha compra del Equipo">
                    </div>
                    <div class="form-group col-xs-12 col-sm-6 col-md-4 col-lg-3">
                        <label for="rmb_equipos_val">Valor :</label>
                        <input type="text" name="rmb_equipos_val" id="rmb_equipos_val" class="form-control" value="<?php echo $val;?>" title="" placeholder="Valor del Equipo">
                    </div>
                    <div class="form-group col-xs-12 col-sm-6 col-md-4 col-lg-3">
                        <label for="rmb_est_id">Estado :</label>
                        <?php echo campoSelectMaster("rmb_est", $est, "*", "WHERE rmb_est_mod = '6'", "", "ORDER BY rmb_est_nom ASC");?>
                    </div>
                    <div class="clearfix"></div>
                    <div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6">
                        <label for="rmb_equipos_foto">Imagen :</label><?php 
                        if($foto){
                           $src = $foto;
                        }
                        else{
                           $src = "../images/noimage.png";
                        }?>
                        <img id="vistaPrevia" src="<?php echo $src; ?>" width="120px" height="120px"/>
                        <input type="file" name="rmb_equipos_foto" id="rmb_equipos_foto" class="form-control fileimagen" value="<?php echo $foto;?>" title="" placeholder="Estado del Equipo">
                    </div>
                    <div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6">
                        <label for="rmb_equipos_obs">Observación :</label>
                        <textarea name="rmb_equipos_obs" id="rmb_equipos_obs" cols="28" rows="5" class="form-control" alt="Observación relacionada al equipo" title="Observación relacionada al equipo" placeholder="Observación relacionada al equipo"><?php echo $obs; ?></textarea>
                    </div>
                    <div class="clearfix">&nbsp;</div>
                    <div class="form-group text-center col-xs-offset-2 col-sm-offset-5 col-md-offset-5 col-lg-offset-5 col-xs-8 col-sm-3 col-md-2 col-lg-2">
                        <button type="submit" class="btn btn-default form-control" alt="Actualizar y/o ingresar datos de equipo" title="Actualizar y/o ingresar datos de equipo">Actualizar</button>
                        <?php 
                        if($id_eq){?>
                            <input type="hidden" name="id_upd" id="id_upd" class="form-control" value="<?php echo $id_eq;?>">
                        <?php }
                        ?>
                        <input type="hidden" name="rmb_teq_id" id="rmb_teq_id" class="form-control" value="<?php echo $tipo;?>">
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
        var teq = '<?php echo $tipo;?>';
        $('#form_equipo').bootstrapValidator({
            message: 'Este valor no es valido',
            feedbackIcons: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                rmb_equipos_nom: {
                    message: 'El nombre del equipo no es valido',
                    validators: {
                        notEmpty: {
                            message: 'El nombre del equipo es requerido'
                        },
                        stringLength: {
                            min: 3,
                            max: 50,
                            message: 'El nombre del equipo debe contener de 3 a 40 caracteres'
                        },
                        regexp: {
                            regexp: /^[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ_ .:,#@%]+$/,
                            message: 'El nombre del equipo debe contener letras, números, acentos espacios y algunos caracteres especiales.'
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
            var datos_form = new FormData($("#form_equipo")[0]);
            $.ajax({
                url:"../php/ins_upd_equip.php",
                cache:false,
                type:"POST",
                contentType:false,
                data:datos_form,
                processData:false,
                success: function(datos){
                    if(datos !== ''){
                        swal({
                            title: "Felicidades!",
                            text: "El registro se ha guardado correctamente!",
                            type: "success",
                            confirmButtonText: "Continuar",
                            confirmButtonColor: "#94B86E"
                        });
                        $("#content-mant").load("./equipos-por-tipo.php?teq="+teq);
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
                        $(".ing-cal").html("");
                        $(".ing-cal").addClass('hidden');
                        return;
                    }
                }
            });
        });
    });
    editMantenimiento();
    $(function () {
        $('#rmb_equipos_fcom').datepicker({format: "yyyy-mm-dd", autoclose: true, endDate: "0d", todayBtn: true});
        //Cuando se selecciona una imagen en usuario
        $('.fileimagen').on('change', function(e) {
            PreImagen(this, e);
        });
    });
</script>
<!-- FIN Pagina primera pestaña -->