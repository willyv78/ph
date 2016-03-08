<?php session_start();
require_once ("../conexion/conexion.php");
require_once ("../php/funciones.php");

$tipo_de_equipo = "";
if($_GET['inactivos']){
  $tipo_de_equipo = $_GET['inactivos'];  
}

$res_tipoeq = registroCampo("rmb_teq", "*", "", "", "ORDER BY rmb_teq_nom ASC");

?>
<!-- Titulo de la pagina -->
<div id="titulo" class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 pull-left text-left titulo-pagina">
        <input id="tabla-actual" type="hidden" value="rmb_residente">
        <input type="hidden" name="tipo-de-equipo" id="tipo-de-equipo" value="<?php echo $tipo_de_equipo;?>">
        <h3 class="text-left">Inventario, equipos y mantenimiento</h3>
    </div>
</div>
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-left">
    <div class="col-xs-12 col-sm-3 col-md-2 col-lg-2">
        <span style="color:#546E7A;font-family:Arial;font-size:15px;font-weight:bold">Tipo de equipo:</span>
    </div>
    <div class="col-xs-9 col-sm-6 col-md-8 col-lg-8"><?php echo TipoEquipo(""); ?></div>
    <div class="col-xs-3 col-sm-2 col-md-2 col-lg-2" id="nuevo">
        <button id="nuevo" type="button" class="btn btn-default form-control" data-dismiss="modal">Nuevo</button>
    </div>
</div>
<div class="clearfix">&nbsp;</div>
<!-- contenido de la pagina equipos y mantenimiento -->
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" id="content-mant"></div>
<div class="clearfix">&nbsp;</div>
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
    <div class="alert alert-warning text-left">
        <!-- <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> -->
        <strong>Atención!</strong>
          <p>En esta pestaña encontrará el inventario de equipos y el historial de mantenimientos para cada uno de ellos.</p>
          <footer>Si no esta seguro de los cambios a realizar o si el cambio afectará el funcionamiento de la aplicación, comuniquese con el desarrollador de la aplicación al correo <cite title="Source Title">info@rmasb.com</cite> o al telefono <cite title="Source Title">7569919</cite></footer>
          
    </div>
</div>

<script>
	$(document).ready(function() {
    cargarMantenimiento();
	});
</script>


<!-- Fin pestaña siete -->