<?php session_start();
require_once ("../conexion/conexion.php");
require_once ("../php/funciones.php");
//////////////////////////////////////////////////////////////////////////////////////
// Aplicación PHP usando Bootstrap, jquery, HTML5 y CSS - PH                        //
// Copyright 2014 Wilson Giovanny Velandia Barreto 3204274564 - willyv78@gmail.com  //
//////////////////////////////////////////////////////////////////////////////////////
$id_proy = "";$data_quien = 4;$id_proy = "";$const = "";$curad = "";$dhidra = "";$chidra = "";$delect = "";$celect = "";$finio = "";$ffino = "";$res_quien = false;

if(isset($_GET['id_proy'])){
    $id_proy = $_GET['id_proy'];
    $res_quien = registroCampo("rmb_proyecto p", "p.rmb_proyecto_constructora, p.rmb_proyecto_curaduria, p.rmb_proyecto_dhidraulico, p.rmb_proyecto_chidraulico, p.rmb_proyecto_delectrico, p.rmb_proyecto_celectrico, p.rmb_proyecto_finiobra, p.rmb_proyecto_ffinobra", "WHERE p.rmb_proyecto_id = $id_proy", "", "");
}
if($res_quien){
    if(mysql_num_rows($res_quien) > 0){
        $row_quien = mysql_fetch_array($res_quien);
        $const = $row_quien[0];$curad = $row_quien[1];$dhidra = $row_quien[2];$chidra = $row_quien[3];$delect = $row_quien[4];$celect = $row_quien[5];$finio = $row_quien[6];$ffino = $row_quien[7];
    }
}
?>
<form class="col-xs-12 col-sm-10 col-md-8 col-lg-6 form-quienes form-horizontal" id="form-quienes-edificio" name="form-quienes-edificio" method="POST" role="form" enctype="multipart/form-data">
    <div class="form-group">
        <label class="col-xs-12 col-sm-4 col-md-5 col-lg-6 text-right" for="rmb_proyecto_constructora">Constructora:</label>
        <div class="col-xs-12 col-sm-8 col-md-7 col-lg-6">
            <input type="text" class="form-control" id="rmb_proyecto_constructora" name="rmb_proyecto_constructora" placeholder="Nombre de la constructora" alt="Nombre de la constructora" title="Nombre de la constructora" value="<?php echo $const;?>">
        </div>
    </div>
    <div class="form-group">
        <label class="col-xs-12 col-sm-4 col-md-5 col-lg-6 text-right" for="rmb_proyecto_curaduria">Curaduría:</label>
        <div class="col-xs-12 col-sm-8 col-md-7 col-lg-6">
            <input type="text" class="form-control" id="rmb_proyecto_curaduria" name="rmb_proyecto_curaduria" placeholder="Nombre de la curaduría" alt="Nombre de la curaduría" title="Nombre de la curaduría" value="<?php echo $curad;?>">
        </div>
    </div>
    <div class="form-group">
        <label class="col-xs-12 col-sm-4 col-md-5 col-lg-6 text-right" for="rmb_proyecto_dhidraulico">Diseño hidráulico:</label>
        <div class="col-xs-12 col-sm-8 col-md-7 col-lg-6">
            <input type="text" class="form-control" id="rmb_proyecto_dhidraulico" name="rmb_proyecto_dhidraulico" placeholder="Nombre del Diseñador hidráulico" alt="Nombre del Diseñador hidráulico" title="Nombre del Diseñador hidráulico" value="<?php echo $dhidra;?>">
        </div>
    </div>
    <div class="form-group">
        <label class="col-xs-12 col-sm-4 col-md-5 col-lg-6 text-right" for="rmb_proyecto_chidraulico">Constructor hidráulico:</label>
        <div class="col-xs-12 col-sm-8 col-md-7 col-lg-6">
            <input type="text" class="form-control" id="rmb_proyecto_chidraulico" name="rmb_proyecto_chidraulico" placeholder="Nombre del Constructor hidráulico" alt="Nombre del Constructor hidráulico" title="Nombre del Constructor hidráulico" value="<?php echo $chidra;?>">
        </div>
    </div>
    <div class="form-group">
        <label class="col-xs-12 col-sm-4 col-md-5 col-lg-6 text-right" for="rmb_proyecto_delectrico">Diseño eléctrico:</label>
        <div class="col-xs-12 col-sm-8 col-md-7 col-lg-6">
            <input type="text" class="form-control" id="rmb_proyecto_delectrico" name="rmb_proyecto_delectrico" placeholder="Nombre del Diseñador eléctrico" alt="Nombre del Diseñador eléctrico" title="Nombre del Diseñador eléctrico" value="<?php echo $delect;?>">
        </div>
    </div>
    <div class="form-group">
        <label class="col-xs-12 col-sm-4 col-md-5 col-lg-6 text-right" for="rmb_proyecto_celectrico">Constructor eléctrico:</label>
        <div class="col-xs-12 col-sm-8 col-md-7 col-lg-6">
            <input type="text" class="form-control" id="rmb_proyecto_celectrico" name="rmb_proyecto_celectrico" placeholder="Nombre del Constructor eléctrico" alt="Nombre del Constructor eléctrico" title="Nombre del Constructor eléctrico" value="<?php echo $celect;?>">
        </div>
    </div>
    <div class="form-group">
        <label class="col-xs-12 col-sm-4 col-md-5 col-lg-6 text-right" for="rmb_proyecto_finiobra">Fecha inicio de obra:</label>
        <div class="col-xs-12 col-sm-8 col-md-7 col-lg-6">
            <input type="date" class="form-control" id="rmb_proyecto_finiobra" name="rmb_proyecto_finiobra" placeholder="Fecha inicio de obra" alt="Fecha inicio de obra" title="Fecha inicio de obra" value="<?php echo $finio;?>">
        </div>
    </div>
    <div class="form-group">
        <label class="col-xs-12 col-sm-4 col-md-5 col-lg-6 text-right" for="rmb_proyecto_ffinobra">Fecha final de obra:</label>
        <div class="col-xs-12 col-sm-8 col-md-7 col-lg-6">
            <input type="date" class="form-control" id="rmb_proyecto_ffinobra" name="rmb_proyecto_ffinobra" placeholder="Fecha final de obra" alt="Fecha final de obra" title="Fecha final de obra" value="<?php echo $ffino;?>">
        </div>
    </div>
    <div class="clearfix">&nbsp;</div><?php 
    if($id_proy){?>
        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 text-right">
            <input type="hidden" name="id_upd" id="id_upd" class="form-control" value="<?php echo $id_proy;?>">
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
<script>
    $(document).ready(function() {
        $('#form-quienes-edificio').bootstrapValidator({
            message: 'Este valor no es valido',
            feedbackIcons: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                rmb_carg_id: {
                    message: 'El cargo no es valido',
                    validators: {
                        notEmpty: {
                            message: 'El cargo es requerido'
                        }
                    }
                },
                rmb_proyecto_nom: {
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
                            message: 'El nombre del documento debe contener letras, numeros, acentos espacios y algunos caracteres especiales.'
                        }
                    }
                },
                rmb_proyecto_ape: {
                    message: 'El apellido del contacto no es valido',
                    validators: {
                        notEmpty: {
                            message: 'El apellido del contacto es requerido'
                        },
                        stringLength: {
                            min: 3,
                            max: 50,
                            message: 'El apellido del contacto debe contener de 3 a 40 caracteres'
                        },
                        regexp: {
                            regexp: /^[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ_ .:,#@%]+$/,
                            message: 'El nombre del documento debe contener letras, numeros, acentos espacios y algunos caracteres especiales.'
                        }
                    }
                },
                rmb_proyecto_tel: {
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
                            regexp: /^[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ_ .:,#@%]+$/,
                            message: 'El nombre del documento debe contener letras, numeros, acentos espacios y algunos caracteres especiales.'
                        }
                    }
                }
            }
        })
        .on('success.form.bv', function(e) {
            // Prevent form submission
            e.preventDefault();
            var id_div = '<?php echo $data_quien;?>';
            var pag = "edificio";
            var id_proy = '<?php echo $id_proy;?>';
            var datos_form = new FormData($("#form-quienes-edificio")[0]);
            $.ajax({
                url:"../php/ins_upd_quienes_edificio.php",
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
                            $("#collapseExample" + id_div).load(pag + ".php?id_proy=" + id_proy);
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
        cargaFormQuienesEdificio();
    });
</script>













