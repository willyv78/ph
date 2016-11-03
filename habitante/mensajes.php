<?php session_start();
require_once ("../conexion/conexion.php");
require_once ("../php/funciones.php");
?>
<!-- Pagina sexta pestaña -->
<!-- Titulo de la pagina -->
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 titulo-pagina">
   <h3 class="text-left">Mensajes</h3>
</div>
<div class="clearfix">&nbsp;</div>
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
  <!-- DIV botones -->
  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
      <button id="recibidos" type="button" class="btn btn-default btn-lg active col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1">&nbsp;</div>
        <div class="col-xs-10 col-sm-10 col-md-10 col-lg-10">
          Recibidos
        </div>
        <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1">
          <span class="badge badge-recibidos cant_men hidden">0</span>    
        </div>
      </button>
    </div>
    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
      <button id="enviados" type="button" class="btn btn-default btn-lg col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1">&nbsp;</div>
        <div class="col-xs-10 col-sm-10 col-md-10 col-lg-10">
          Enviados
        </div>
        <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1">&nbsp;</div>
      </button>
    </div>
  </div>
  <div class="clearfix">&nbsp;</div>
  <!-- DIV lista mensajes -->
  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
    <div id="mensajes" class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-left"></div>
  </div>
</div>

<script>
	$(document).ready(function() {
    verMensajes();
	});
</script>


<!-- Fin pestaña seis -->