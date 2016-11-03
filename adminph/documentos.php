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
   <h3 class="text-left">Documentos</h3>
</div> -->
<!-- Contenido documentos -->
<!-- Reglamento del edificio -->
<div class='panel panel-default' data-toggle='collapse' href='#collapseExample5' aria-expanded='false' aria-controls='collapseExample5'>
    <div class='doc-est bred'>
        <img name="5" class="img-responsive bred" style="margin: auto; border-radius: 2px; padding: 7px 3px;" width="90%" alt="Reglamento del edificio" title="Reglamento del edificio"  src="../css/plantilla1/img/reglamento.png"/>
    </div>
    <div class='panel-heading'>
        <span class='col-xs-9 col-sm-10 col-md-10 col-lg-10 text-nowrap modal-open text-left'>Reglamento del edificio</span><br>
    </div>
</div>
<div class='panel-body collapse' id='collapseExample5'>&nbsp;</div>
<!-- Manual de convivencia -->
<div class='panel panel-default' data-toggle='collapse' href='#collapseExample6' aria-expanded='false' aria-controls='collapseExample6'>
    <div class='doc-est bblue'>
        <img name="6" class="img-responsive bblue" style="margin: auto; border-radius: 2px; padding: 7px 3px;" width="90%" alt="Manual de convivencia" title="Manual de convivencia" src="../css/plantilla1/img/manual.png"/>
    </div>
    <div class='panel-heading'>
        <span class='col-xs-9 col-sm-10 col-md-10 col-lg-10 text-nowrap modal-open text-left'>Manual de convivencia</span><br>
    </div>
</div>
<div class='panel-body collapse' id='collapseExample6'>&nbsp;</div>
<!-- Circulares informativas -->
<div class='panel panel-default' data-toggle='collapse' href='#collapseExample2' aria-expanded='false' aria-controls='collapseExample2'>
    <div class='doc-est bgreen'>
        <img name="2" class="img-responsive bgreen" style="margin: auto; border-radius: 2px; padding: 7px 3px;" width="90%" alt="Circulares informativas" title="Circulares informativas" src="../css/plantilla1/img/circular.png"/>
    </div>
    <div class='panel-heading'>
        <span class='col-xs-9 col-sm-10 col-md-10 col-lg-10 text-nowrap modal-open text-left'>Circulares informativas</span><br>
    </div>
</div>
<div class='panel-body collapse' id='collapseExample2'>&nbsp;</div>
<!-- Documentos administrativos -->
<div class='panel panel-default' data-toggle='collapse' href='#collapseExample7' aria-expanded='false' aria-controls='collapseExample7'>
    <div class='doc-est blightblue'>
        <img name="7" class="img-responsive blightblue" style="margin: auto; border-radius: 2px; padding: 7px 3px;" width="90%" alt="Documentos administrativos" title="Documentos administrativos" src="../css/plantilla1/img/administrativo.png"/>
    </div>
    <div class='panel-heading'>
        <span class='col-xs-9 col-sm-10 col-md-10 col-lg-10 text-nowrap modal-open text-left'>Documentos administrativos</span><br>
    </div>
</div>
<div class='panel-body collapse' id='collapseExample7'>&nbsp;</div>
<!-- Documentos contables -->
<div class='panel panel-default' data-toggle='collapse' href='#collapseExample4' aria-expanded='false' aria-controls='collapseExample4'>
    <div class='doc-est borange'>
        <img name="4" class="img-responsive borange" style="margin: auto; border-radius: 2px; padding: 7px 3px;" width="90%" alt="Documentos contables" title="Documentos contables" src="../css/plantilla1/img/contables.png"/>
    </div>
    <div class='panel-heading'>
        <span class='col-xs-9 col-sm-10 col-md-10 col-lg-10 text-nowrap modal-open text-left'>Documentos contables</span><br>
    </div>
</div>
<div class='panel-body collapse' id='collapseExample4'>&nbsp;</div>
<!-- Documentos fiscales -->
<div class='panel panel-default' data-toggle='collapse' href='#collapseExample3' aria-expanded='false' aria-controls='collapseExample3'>
    <div class='doc-est bpink'>
        <img name="3" class="img-responsive bpink" style="margin: auto; border-radius: 2px; padding: 7px 3px;" width="90%" alt="Documentos fiscales" title="Documentos fiscales" src="../css/plantilla1/img/fiscales.png"/>
    </div>
    <div class='panel-heading'>
        <span class='col-xs-9 col-sm-10 col-md-10 col-lg-10 text-nowrap modal-open text-left'>Documentos fiscales</span><br>
    </div>
</div>
<div class='panel-body collapse' id='collapseExample3'>&nbsp;</div>
<!-- Actas de reuniones -->
<div class='panel panel-default' data-toggle='collapse' href='#collapseExample1' aria-expanded='false' aria-controls='collapseExample1'>
    <div class='doc-est bviolet'>
        <img name="1" class="img-responsive bviolet" style="margin: auto; border-radius: 2px; padding: 7px 3px;" width="90%" alt="Actas de reuniones" title="Actas de reuniones" src="../css/plantilla1/img/actas.png"/>
    </div>
    <div class='panel-heading'>
        <span class='col-xs-9 col-sm-10 col-md-10 col-lg-10 text-nowrap modal-open text-left'>Actas de reuniones</span><br>
    </div>
</div>
<div class='panel-body collapse' id='collapseExample1'>&nbsp;</div>
<script>mostrarDocs();</script>
<!-- FIN Pagina primera pestaña -->