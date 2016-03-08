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
   <h3 class="text-left">Documentos</h3>
</div>
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" id="content_res">
    <div style="cursor: pointer" class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <img name="5" width="100%" src="../images/reglamento.png"/>
        </div>
    </div>
    <div style="cursor: pointer" class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <img name="6" width="100%" src="../images/manualconvi.png"/>
        </div>
    </div>
    <div style="cursor: pointer" class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <img name="2" width="100%"src="../images/circular.png"/>
        </div>
    </div>
    <div style="cursor: pointer" class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <img name="7" width="100%"src="../images/administrativo.png"/>
        </div>
    </div>
    <div style="cursor: pointer" class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <img name="4" width="100%" src="../images/contables.png"/>
        </div>
    </div>
    <div style="cursor: pointer" class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <img name="3" width="100%" src="../images/fiscales.png"/>
        </div>
    </div>
    <div style="cursor: pointer" class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <img name="1" width="100%" src="../images/actas.png"/>
        </div>
    </div>
    <div id="box" class="clearfix"></div>
</div>
<script>mostrarDocs();</script>
<!-- FIN Pagina primera pestaña -->