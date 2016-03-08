<?php
session_start();
require_once ("../conexion/conexion.php");
require_once ("../php/funciones.php");
//////////////////////////////////////////////////////////////////////////////////////
// Aplicación PHP usando Bootstrap, jquery, HTML5 y CSS - PH                        //
// Copyright 2014 Wilson Giovanny Velandia Barreto 3204274564 - willyv78@gmail.com  //
//////////////////////////////////////////////////////////////////////////////////////
?>
<div class="col-xs-12 col-sm-10 col-md-10 col-lg-10" style="margin:30px auto;">
    <div class="modal-content">
        <div class="modal-header text-right">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h3 class="modal-title" id="myModalLabel">
                <span style="font-weight: bold;color: #546E7A"><span style="font-size: 2.5em;color: #73B848;">E</span>dificio</span>
            </h3>
        </div>
        <div class="modal-body">
            <dl class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <dt>Constructura</dt>
                <dd>Información de la constructora</dd>
                <dt>Curaduría</dt>
                <dd>Información de la curaduría</dd>
                <dt>Diseño Hidráulico</dt>
                <dd>Información del diseño hidráulico</dd>
                <dt>Diseño Eléctrico</dt>
                <dd>Información del diseño eléctrico</dd>
                <dt>Constructor Hidráulico</dt>
                <dd>Información del constructor hidráulico </dd>
                <dt>Constructor Eléctrico</dt>
                <dd>Información del constructor eléctrico</dd>
            </dl>
        </div>
        <div class="clearfix">&nbsp;</div>
        <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
        </div>
    </div>
</div>
<script>camposDinamicos();</script>