<?php session_start();
require_once ("../conexion/conexion.php");
require_once ("../php/funciones.php");
//////////////////////////////////////////////////////////////////////////////////////
// Aplicación PHP usando Bootstrap, jquery, HTML5 y CSS - PH                        //
// Copyright 2014 Wilson Giovanny Velandia Barreto 3204274564 - willyv78@gmail.com  //
//////////////////////////////////////////////////////////////////////////////////////
?>
<!-- Titulo de la pagina -->
<!-- <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 titulo-pagina">
   <h3 class="text-left">¿QUIENES SOMOS?</h3>
</div> -->
<!-- Contenido quienes somos -->
<!-- Administración -->
<div class='panel panel-default' data-toggle='collapse' href='#collapseExample1' aria-expanded='false' aria-controls='collapseExample1'>
    <div class='doc-est'>
        <img name="1" class="img-responsive" style="margin: auto; border-radius: 2px; padding: 4px 3px;" width="90%" alt="Administración / administrador" title="Administración / administrador"  src="../images/residentes/quienes-somos/administrador.png"/>
    </div>
    <div class='panel-heading'>
        <span class='col-xs-9 col-sm-10 col-md-10 col-lg-10 text-nowrap modal-open text-left'>Administración</span><br>
    </div>
</div>
<div class='panel-body collapse' id='collapseExample1' style="padding-left:0;padding-right: 0px;">&nbsp;</div>
<!-- Consejo Administrativo -->
<div class='panel panel-default' data-toggle='collapse' href='#collapseExample2' aria-expanded='false' aria-controls='collapseExample2'>
    <div class='doc-est'>
        <img name="2" class="img-responsive" style="margin: auto; border-radius: 2px; padding: 3px 3px;" width="90%" alt="Consejo Administrativo" title="Consejo Administrativo" src="../images/residentes/quienes-somos/consejoadmin.png"/>
    </div>
    <div class='panel-heading'>
        <span class='col-xs-9 col-sm-10 col-md-10 col-lg-10 text-nowrap modal-open text-left'>Consejo Administrativo</span><br>
    </div>
</div>
<div class='panel-body collapse' id='collapseExample2' style="padding-left:0;padding-right: 0px;">&nbsp;</div>
<!-- Comite de convivencia -->
<div class='panel panel-default' data-toggle='collapse' href='#collapseExample3' aria-expanded='false' aria-controls='collapseExample3'>
    <div class='doc-est'>
        <img name="3" class="img-responsive" style="margin: auto; border-radius: 2px; padding: 3px 3px;" width="90%" alt="Comite de convivencia" title="Comite de convivencia" src="../images/residentes/quienes-somos/consejoconvivencia.png"/>
    </div>
    <div class='panel-heading'>
        <span class='col-xs-9 col-sm-10 col-md-10 col-lg-10 text-nowrap modal-open text-left'>Comite de convivencia</span><br>
    </div>
</div>
<div class='panel-body collapse' id='collapseExample3' style="padding-left:0;padding-right: 0px;">&nbsp;</div>
<!-- Edificio -->
<div class='panel panel-default' data-toggle='collapse' href='#collapseExample4' aria-expanded='false' aria-controls='collapseExample4'>
    <div class='doc-est'>
        <img name="4" class="img-responsive" style="margin: auto; border-radius: 2px; padding: 3px 3px;" width="90%" alt="Información del Edificio" title="Información del Edificio" src="../images/residentes/quienes-somos/edificio.png"/>
    </div>
    <div class='panel-heading'>
        <span class='col-xs-9 col-sm-10 col-md-10 col-lg-10 text-nowrap modal-open text-left'>Edificio</span><br>
    </div>
</div>
<div class='panel-body collapse' id='collapseExample4' style="padding-left:0;padding-right: 0px;">&nbsp;</div>
<!-- Contador -->
<div class='panel panel-default' data-toggle='collapse' href='#collapseExample5' aria-expanded='false' aria-controls='collapseExample5'>
    <div class='doc-est'>
        <img name="5" class="img-responsive" style="margin: auto; border-radius: 2px; padding: 3px 3px;" width="90%" alt="Contador o empresa de contadores" title="Contador o empresa de contadores" src="../images/residentes/quienes-somos/contador.png"/>
    </div>
    <div class='panel-heading'>
        <span class='col-xs-9 col-sm-10 col-md-10 col-lg-10 text-nowrap modal-open text-left'>Contador</span><br>
    </div>
</div>
<div class='panel-body collapse' id='collapseExample5' style="padding-left:0;padding-right: 0px;">&nbsp;</div>
<!-- Revisor fiscal -->
<div class='panel panel-default' data-toggle='collapse' href='#collapseExample6' aria-expanded='false' aria-controls='collapseExample6'>
    <div class='doc-est'>
        <img name="6" class="img-responsive" style="margin: auto; border-radius: 2px; padding: 3px 3px;" width="90%" alt="Revisor fiscal" title="Revisor fiscal" src="../images/residentes/quienes-somos/revisorfiscal.png"/>
    </div>
    <div class='panel-heading'>
        <span class='col-xs-9 col-sm-10 col-md-10 col-lg-10 text-nowrap modal-open text-left'>Revisor fiscal</span><br>
    </div>
</div>
<div class='panel-body collapse' id='collapseExample6' style="padding-left:0;padding-right: 0px;">&nbsp;</div>
<!-- Seguridad -->
<div class='panel panel-default' data-toggle='collapse' href='#collapseExample7' aria-expanded='false' aria-controls='collapseExample7'>
    <div class='doc-est'>
        <img name="7" class="img-responsive" style="margin: auto; border-radius: 2px; padding: 3px 3px;" width="90%" alt="Empresa de Seguridad" title="Empresa de Seguridad" src="../images/residentes/quienes-somos/seguridad.png"/>
    </div>
    <div class='panel-heading'>
        <span class='col-xs-9 col-sm-10 col-md-10 col-lg-10 text-nowrap modal-open text-left'>Seguridad</span><br>
    </div>
</div>
<div class='panel-body collapse' id='collapseExample7' style="padding-left:0;padding-right: 0px;">&nbsp;</div>
<!-- Servicios generales -->
<div class='panel panel-default' data-toggle='collapse' href='#collapseExample8' aria-expanded='false' aria-controls='collapseExample8'>
    <div class='doc-est'>
        <img name="8" class="img-responsive" style="margin: auto; border-radius: 2px; padding: 3px 3px;" width="90%" alt="Servicios generales" title="Servicios generales" src="../images/residentes/quienes-somos/servicios.png"/>
    </div>
    <div class='panel-heading'>
        <span class='col-xs-9 col-sm-10 col-md-10 col-lg-10 text-nowrap modal-open text-left'>Servicios generales</span><br>
    </div>
</div>
<div class='panel-body collapse' id='collapseExample8' style="padding-left:0;padding-right: 0px;">&nbsp;</div>
<script>cargarQuienes();</script>
<!-- FIN Pagina primera pestaña -->