<?php session_start();
require_once ("../conexion/conexion.php");
require_once ("../php/funciones.php");
//////////////////////////////////////////////////////////////////////////////////////
// Aplicación PHP usando Bootstrap, jquery, HTML5 y CSS - PH                        //
// Copyright 2014 Wilson Giovanny Velandia Barreto 3204274564 - willyv78@gmail.com  //
//////////////////////////////////////////////////////////////////////////////////////
$tipo = "";
$accion = "Nuevo";
$desabilitar = "";
$nom  = "";
$desc = "";
$cont = "";
$img  = "";
$est  = "";
$fini = "";
$ffin = "";
if(isset($_GET['tipo'])){$tipo = $_GET['tipo'];}
if(isset($_GET['edit'])){$accion = "Modificar";}
if(isset($_GET['ver'])){$accion = "Consultar";$desabilitar = "disabled";}
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $res_doc = registroCampo("rmb_document", "*", "WHERE rmb_document_id = '$id'", "", "");
    if($res_doc){
        if(mysql_num_rows($res_doc) > 0){
            $row_doc = mysql_fetch_array($res_doc);
            $nom  = $row_doc[1];
            $proy  = $row_doc[2];
            $tipo = $row_doc[3];
            $desc = $row_doc[4];
            $cont  = $row_doc[5];
            $imgest  = $row_doc[6];
            $est = $row_doc[7];
            $fini = $row_doc[8];
            $ffin = $row_doc[9];
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
                        <i class="glyphicon glyphicon-file"></i>&nbsp;<?php echo $accion." ".nombreCampo($tipo, "rmb_cdoc");?></span>
                </h4>
                <div class="clearfix">&nbsp;</div>
            </div>
        </div>
        <div class="modal-body">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <form id="form_doc" name="form_doc" action="" method="POST" class="form-horizontal" role="form" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="rmb_document_nom">Nombre:</label>
                        <input class="form-control" type="text" id="rmb_document_nom" name="rmb_document_nom" placeholder="Nombre del Documento" <?php echo $desabilitar;?> value="<?php echo $nom;?>">
                    </div>
                    <div class="form-group">
                        <label for="rmb_document_desc">Descripción:</label>
                        <textarea class="form-control" id="rmb_document_desc" name="rmb_document_desc" rows="3" <?php echo $desabilitar;?>><?php echo $desc;?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="rmb_context_id">Visibilidad:</label>
                        <div class="radio">
                            <label>
                                <input type="radio" name="rmb_context_id" id="rmb_context_id1" value="1" <?php if(($cont == '1') || ($cont == '')){echo 'checked="checked"';} echo $desabilitar;?>>
                                Público&nbsp;&nbsp;&nbsp;&nbsp;
                            </label>
                            <label>
                                <input type="radio" name="rmb_context_id" id="rmb_context_id2" value="2" <?php if($cont == '2'){echo 'checked="checked"';} echo $desabilitar;?>>
                                Privado
                            </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="rmb_document_img">Archivo:</label>
                        <input class="form-control" type="file" id="rmb_document_img" name="rmb_document_img" placeholder="Archivo del documento" <?php echo $desabilitar;?> value="<?php echo $img;?>">
                    </div>
                    <div class="form-group">
                        <label for="">Estado:</label>
                        <?php echo Estados($est, "4"); ?>
                    </div>
                    <div class="form-group">
                        <label for="rmb_document_fini">Fecha Publicación:</label>
                        <input class="form-control" type="text" id="rmb_document_fini" name="rmb_document_fini" placeholder="Fecha de publicación" <?php echo $desabilitar;?> value="<?php echo $fini;?>">
                    </div>
                    <div class="form-group">
                        <label for="rmb_document_ffin">Fecha final:</label>
                        <input class="form-control" type="text" id="rmb_document_ffin" name="rmb_document_ffin" placeholder="Fecha final" <?php echo $desabilitar;?> value="<?php echo $ffin;?>">
                    </div><?php 
                    if(!isset($_GET['ver'])){?>
                        <div class="form-group text-center">
                            <button type="submit" class="btn btn-default">Agregar</button>              
                            <input type="hidden" name="rmb_cdoc_id" id="rmb_cdoc_id" class="form-control" value="<?php echo $tipo;?>">
                        </div><?php 
                    }?>
                </form>
            </div>
        </div>
        <div class="modal-footer"></div>
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
        $('#form_doc').bootstrapValidator({
            message: 'Este valor no es valido',
            feedbackIcons: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                rmb_document_nom: {
                    message: 'El nombre del documento no es valido',
                    validators: {
                        notEmpty: {
                            message: 'El nombre del documento es requerido'
                        },
                        stringLength: {
                            min: 3,
                            max: 50,
                            message: 'El nombre del documento debe contener de 3 a 40 caracteres'
                        },
                        regexp: {
                            regexp: /^[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ_ .:,#@%]+$/,
                            message: 'El nombre del documento debe contener letras, numeros, acentos espacios y algunos caracteres especiales.'
                        }
                    }
                },
                rmb_document_desc: {
                    message: 'La descripción del documento no es valido',
                    validators: {
                        notEmpty: {
                            message: 'La descripción del documento es requerido'
                        },
                        stringLength: {
                            min: 3,
                            max: 250,
                            message: 'La descripción del documento debe contener de 3 a 250 caracteres'
                        },
                        regexp: {
                            regexp: /^[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ_ .:,#@%]+$/,
                            message: 'La descripción del documento debe contener letras, numeros, acentos, espacios y algunos caracteres especiales.'
                        }
                    }
                },
                rmb_document_img: {
                    validators: {
                        file: {
                            extension: 'jpeg,jpg,png,doc,docx,xls,xlsx,pdf,txt',
                            type: 'image/jpeg,image/jpeg,image/png,application/msword,application/msword,application/excel,application/x-excel,application/x-msexcel,application/vnd.ms-excel,application/pdf,text/plain',
                            maxSize: 2097152000,
                            message: 'El archivo seleccionado no es valido'
                        }
                    }
                },
                rmb_est_id: {
                    message: 'El estado del documento no es valida',
                    validators: {
                        notEmpty: {
                            message: 'El estado del documento es requerido'
                        }
                    }
                },
                rmb_document_fini: {
                    message: 'La fecha de publicación no es valida',
                    validators: {
                        notEmpty: {
                            message: 'La fecha de publicación es requerida'
                        },
                        date: {
                            format: 'YYYY-MM-DD',
                            message: 'La fecha de publicación no es valida'
                        }
                    }
                },
                rmb_document_ffin: {
                    message: 'La fecha final del documento no es valida',
                    validators: {
                        notEmpty: {
                            message: 'La fecha final del documento es requerida'
                        },
                        date: {
                            format: 'YYYY-MM-DD',
                            message: 'La fecha final del documento no es valida'
                        }
                    }
                }
            }
        })
        .on('success.form.bv', function(e) {
            // Prevent form submission
            e.preventDefault();
            var datos_form = new FormData($("#form_doc")[0]);
            $.ajax({
                url:"../php/ins_upd_doc.php",
                cache:false,
                type:"POST",
                contentType:false,
                data:datos_form,
                processData:false,
                success: function(datos){
                    setTimeout(esperehide, 500);
                    if(datos !== ''){
                        $(".ing-cal").html("");
                        $(".ing-cal").addClass('hidden');
                        swal({
                            title: "Felicidades!",
                            text: "El registro se ha guardado correctamente!",
                            type: "success",
                            confirmButtonText: "Continuar",
                            confirmButtonColor: "#94B86E"
                        },
                        function(){
                            $("#collapseExample"+datos).load("lista-de-documentos.php?tipo="+datos);
                            // $("#col-md-12").load("lista-de-documentos.php?tipo="+datos);
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
    editDocumento();
    $(function () {
        $('#rmb_document_fini').datepicker({format: "yyyy-mm-dd", autoclose: true, endDate: "0d", todayBtn: true});
        $('#rmb_document_ffin').datepicker({format: "yyyy-mm-dd", autoclose: true, startDate: "0d", todayBtn: true});
    });
</script>
<!-- FIN Pagina primera pestaña -->