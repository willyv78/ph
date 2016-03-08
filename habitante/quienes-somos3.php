<?php session_start();
require_once ("../conexion/conexion.php");
require_once ("../php/funciones.php");
//////////////////////////////////////////////////////////////////////////////////////
// Aplicación PHP usando Bootstrap, jquery, HTML5 y CSS - PH                        //
// Copyright 2014 Wilson Giovanny Velandia Barreto 3204274564 - willyv78@gmail.com  //
//////////////////////////////////////////////////////////////////////////////////////
?>
<!-- Titulo de la pagina -->
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
   <h3 class="text-left">¿QUIENES SOMOS?</h3>
</div>
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
    <!-- Administracion -->
    <div id="admin" class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
        <img style="margin: 20px 25px 0 0" name="2" class="barrasmenu" width="88%" src="../images/administracion.png"/>
    </div>
    <!-- Consejo Administrativo -->
    <div id="conse" class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
        <img style="margin: 20px 25px 0 0" name="3" class="barrasmenu" width="88%" src="../images/consejo-administracion.png"/>
    </div>
    <!-- Comite de convivencia -->
    <div id="comit" class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
        <img style="margin: 20px 25px 0 0" name="9" class="barrasmenu" width="88%" src="../images/comite-convivencia.png"/>
    </div>
    <!-- Edificio -->
    <div id="edifi" class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
        <img style="margin: 20px 25px 0 0" name="9" class="barrasmenu" width="88%" src="../images/edificio.png"/>
    </div>
    <!-- Contador -->
    <div id="conta" class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
        <img style="margin: 20px 25px 0 0" name="5" class="barrasmenu" width="88%" src="../images/contador.png"/>
    </div>
    <!-- Revisor fiscal -->
    <div id="revis" class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
        <img style="margin: 20px 25px 0 0" name="3" class="barrasmenu" width="88%" src="../images/revisor-fiscal.png"/>
    </div>
    <!-- seguridad -->
    <div id="segur" class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
        <img style="margin: 20px 25px 0 0" name="7" class="barrasmenu" width="88%" src="../images/seguridad.png"/>
    </div>
    <!-- Servicios generales -->
    <div id="servi" class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
        <img style="margin: 20px 25px 0 0" name="8" class="barrasmenu" width="88%" src="../images/servicios-generales.png"/>
    </div>
</div>
<script type="text/javascript">
    cargarQuienes();
</script>