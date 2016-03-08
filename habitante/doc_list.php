<?php session_start();
require_once ("../conexion/conexion.php");
require_once ("../php/funciones.php");
include_once ("../php/datatable.php");
//////////////////////////////////////////////////////////////////////////////////////
// Aplicación PHP usando Bootstrap, jquery, HTML5 y CSS - PH                        //
// Copyright 2014 Wilson Giovanny Velandia Barreto 3204274564 - willyv78@gmail.com  //
//////////////////////////////////////////////////////////////////////////////////////
$tipo = "";
if(isset($_GET['tipo'])){
    $tipo = $_GET['tipo'];
}
?>
<!-- Titulo de la pagina -->
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
    <input id="rmb_cdoc_id" type="hidden" value="<?php echo $tipo;?>">
   <h3 class="text-left">Documentos</h3>
</div>
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
    <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel">
            <span style="font-weight: bold;color: #546E7A"><?php echo nombreCampo($tipo, "rmb_cdoc");?></span>
        </h4>
    </div>
    <div class="modal-body">
        <?php echo DocumentoTipo2($tipo); ?>
    </div>
    <div class="clearfix"></div>
    <div class="clearfix"></div>
    <div class="modal-footer">
        <button type="button" class="btn btn-danger" title="Regresar"><i class="glyphicon glyphicon-arrow-left"></i> Regresar</button>
    </div>
</div>
<div class="clearfix"></div>
<script>
    $(document).ready(function() {
        editarDocs();
    });
</script>
<!-- FIN Pagina primera pestaña -->