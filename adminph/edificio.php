<?php
session_start();
require_once ("../conexion/conexion.php");
require_once ("../php/funciones.php");
//////////////////////////////////////////////////////////////////////////////////////
// Aplicación PHP usando Bootstrap, jquery, HTML5 y CSS - PH                        //
// Copyright 2014 Wilson Giovanny Velandia Barreto 3204274564 - willyv78@gmail.com  //
//////////////////////////////////////////////////////////////////////////////////////
$const = "";$curad = "";$dhidra = "";$chidra = "";$delect = "";$celect = "";$finio = "";$ffino = "";$id_proy = "";
if(isset($_GET['id_proy'])){
    $id_proy = $_GET['id_proy'];
}
$res_edificio = registroCampo("rmb_proyecto p", "p.rmb_proyecto_constructora, p.rmb_proyecto_curaduria, p.rmb_proyecto_dhidraulico, p.rmb_proyecto_chidraulico, p.rmb_proyecto_delectrico, p.rmb_proyecto_celectrico, p.rmb_proyecto_finiobra, p.rmb_proyecto_ffinobra", "WHERE p.rmb_proyecto_id = $id_proy", "", "ORDER BY p.rmb_proyecto_id ASC");
if($res_edificio){
    $edificio_all = true;
    if(mysql_num_rows($res_edificio) > 0){
        $row_edificio = mysql_fetch_array($res_edificio);
        $const = $row_edificio[0];$curad = $row_edificio[1];$dhidra = $row_edificio[2];$chidra = $row_edificio[3];$delect = $row_edificio[4];$celect = $row_edificio[5];$finio = $row_edificio[6];$ffino = $row_edificio[7];
    }
}?>
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 alert alert-info">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
        <div class="col-xs-12 col-sm-4 col-md-3 col-lg-5 text-left"><b>Constructura:</b></div>
        <div class="col-xs-12 col-sm-8 col-md-9 col-lg-7 text-left"><?php echo $const;?></div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
        <div class="col-xs-12 col-sm-4 col-md-3 col-lg-5 text-left"><b>Curaduría:</b></div>
        <div class="col-xs-12 col-sm-8 col-md-9 col-lg-7 text-left"><?php echo $curad;?></div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
        <div class="col-xs-12 col-sm-4 col-md-3 col-lg-5 text-left"><b>Diseño Hidráulico:</b></div>
        <div class="col-xs-12 col-sm-8 col-md-9 col-lg-7 text-left"><?php echo $dhidra;?></div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
        <div class="col-xs-12 col-sm-4 col-md-3 col-lg-5 text-left"><b>Constructor Hidráulico:</b></div>
        <div class="col-xs-12 col-sm-8 col-md-9 col-lg-7 text-left"><?php echo $chidra;?></div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
        <div class="col-xs-12 col-sm-4 col-md-3 col-lg-5 text-left"><b>Diseño Eléctrico:</b></div>
        <div class="col-xs-12 col-sm-8 col-md-9 col-lg-7 text-left"><?php echo $delect;?></div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
        <div class="col-xs-12 col-sm-4 col-md-3 col-lg-5 text-left"><b>Constructor Eléctrico:</b></div>
        <div class="col-xs-12 col-sm-8 col-md-9 col-lg-7 text-left"><?php echo $celect;?></div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
        <div class="col-xs-12 col-sm-4 col-md-3 col-lg-5 text-left"><b>Fecha inicio de obra:</b></div>
        <div class="col-xs-12 col-sm-8 col-md-9 col-lg-7 text-left"><?php echo $finio;?></div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
        <div class="col-xs-12 col-sm-4 col-md-3 col-lg-5 text-left"><b>Fecha fin de obra:</b></div>
        <div class="col-xs-12 col-sm-8 col-md-9 col-lg-7 text-left"><?php echo $ffino;?></div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">&nbsp;</div>
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <button type="button" class="btn btn-default pull-right form-edificio" data-quien="4">Editar</button>
    </div>
</div>
<script>cargarPerfil();</script>