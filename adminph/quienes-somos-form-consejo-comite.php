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
    // Si es miembro del consejo hace esto
    if($data_quien == '2'){
        $where_carg = "WHERE (rmb_carg_id = '8' OR rmb_carg_id = '9' OR rmb_carg_id = '20' OR rmb_carg_id = '21')";
    }
    // Si es miembro del comite hace esto
    elseif($data_quien == '3'){
        $where_carg = "WHERE (rmb_carg_id = '6' OR rmb_carg_id = '7' OR rmb_carg_id = '22' OR rmb_carg_id = '23')";
    }
}
if($res_quien){
    if(mysql_num_rows($res_quien) > 0){
        $row_quien = mysql_fetch_array($res_quien);
        $id = $row_quien[0];$nom = $row_quien[1];$ape = $row_quien[2];$carg = $row_quien[3];$foto = $row_quien[4];$nom2 = $row_quien[5];$tel = $row_quien[6];$cel = $row_quien[7];$dir = $row_quien[8];$mail = $row_quien[9];$obs = $row_quien[10];$web = $row_quien[11];
    }
}
?>
<form class="col-xs-12 col-sm-10 col-md-8 col-lg-6 form-quienes form-horizontal" id="form-quienes-consejo-comite" name="form-quienes-consejo-comite" method="POST" role="form" enctype="multipart/form-data">
    <div class="form-group">
        <label class="col-xs-12 col-sm-4 col-md-5 col-lg-6 text-right" for="rmb_carg_id">Residente:</label>
        <div class="col-xs-12 col-sm-8 col-md-7 col-lg-6"><?php 
            echo campoSelectMaster("rmb_residente residente", "$id", "residente.rmb_residente_id, residente.rmb_residente_nom, residente.rmb_residente_ape", "LEFT JOIN rmb_residente_x_aptos ra USING(rmb_residente_id) LEFT JOIN rmb_aptos a USING(rmb_aptos_id) WHERE ra.rmb_tres_id = '1'", "", "ORDER BY residente.rmb_residente_nom ASC");?></div>
    </div>
    <div class="form-group">
        <label class="col-xs-12 col-sm-4 col-md-5 col-lg-6 text-right" for="rmb_carg_id">Cargo:</label>
        <div class="col-xs-12 col-sm-8 col-md-7 col-lg-6"><?php 
            echo campoSelectMaster("rmb_carg", "$carg", "*", $where_carg, "", "ORDER BY rmb_carg_id ASC");?></div>
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
        <button type="button" class="btn btn-default regresar" data-quien="<?php echo $data_quien;?>">Regresar</button>
    </div>
</form>
<!-- jQuery -->
<script src="../js/jquery.min.js"></script>
<script src="../js/sweet-alert.js"></script><!-- Personalizar alertas -->
<script src="../js/bootstrapValidator.js"></script>
<script>
    $(document).ready(function() {
        $('#form-quienes-consejo-comite').bootstrapValidator({
            message: 'Este valor no es valido',
            feedbackIcons: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                rmb_residente_id: {
                    message: 'El residente no es valido',
                    validators: {
                        notEmpty: {
                            message: 'El residente es requerido'
                        }
                    }
                },
                rmb_carg_id: {
                    message: 'El cargo no es valido',
                    validators: {
                        notEmpty: {
                            message: 'El cargo es requerido'
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
            if(id_div === '2'){pag = "consejo";}
            else if(id_div === '3'){pag = "comite";}
            var datos_form = new FormData($("#form-quienes-consejo-comite")[0]);
            $.ajax({
                url:"../php/ins_upd_quienes-consejo-comite.php",
                cache:false,
                type:"POST",
                contentType:false,
                data:datos_form,
                processData:false,
                success: function(datos){
                    // setTimeout(esperehide, 500);
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

        cargaFormQuienesConsejoComite();
    });
</script>













