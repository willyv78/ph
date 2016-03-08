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
            $nom  = $row_doc[2];
            $desc = $row_doc[3];
            $cont = $row_doc[4];
            $img  = $row_doc[5];
            $est  = $row_doc[6];
            $fini = $row_doc[7];
            $ffin = $row_doc[8];
        }
    }
}
?>
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="auto;">
    <div class="modal-content">
        <div class="modal-header text-right">
            <h3 class="modal-title" id="myModalLabel">
                <img src="../images/imgFoto9.png" class="img-responsive" alt="Image" style="display:inline-block;margin-top: -30px;">
                <span style="font-weight: bold;color: #139445"><span style="font-size: 2.5em;color: #EF9614;">S</span>ervicios <span style="font-size: 2.5em;color: #EF9614;">G</span>enerales</span>
            </h3>
        </div>
        <div class="modal-body">
            <!-- Titulares -->
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 text-center">
                    <img src="../images/ASEO1.png" class="img-responsive" alt="Image" style="display:inline-block;">
                </div>
                <div class="col-xs-12 col-sm-9 col-md-9 col-lg-9">
                    <div class="clearfix">&nbsp;</div>
                </div>
                <div class="col-xs-12 col-sm-9 col-md-9 col-lg-9">
                    <div class="clearfix">&nbsp;</div>
                </div>
                <div class="col-xs-12 col-sm-9 col-md-9 col-lg-9">
                    <div class="clearfix">&nbsp;</div>
                </div>
                <div class="bgreen col-xs-12 col-sm-9 col-md-9 col-lg-9 text-center" style="border:3px solid #139445;border-radius: 5px;padding:5px;opacity:1;">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-left">
                        <div class="clearfix">&nbsp;</div>
                        Empresa:
                        <div class="clearfix">&nbsp;</div>
                    </div>
                    
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6 text-left">
                        Persona de Contacto:
                        <div class="clearfix">&nbsp;</div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-3 text-left">
                        Tel:
                        <div class="clearfix">&nbsp;</div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-3 text-left">
                        Cel:
                        <div class="clearfix">&nbsp;</div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6 text-left">
                        Email:
                        <div class="clearfix">&nbsp;</div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6 text-left">
                        Página WEB:
                        <div class="clearfix">&nbsp;</div>
                    </div>
                </div>
            </div>
            <!-- Suplentes -->
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="col-xs-12 col-sm-4 col-md-2 col-lg-2 text-center">
                        <div class="clearfix">&nbsp;</div>
                        <img src="../images/perfilaseo.jpg" class="img-responsive" alt="Image" style="border: 8px solid #139445;border-radius: 5px;width:90%;display:inline-block;">
                        <div class="bgreen text-center" style="border:3px solid #139445;border-radius: 5px;padding:5px;margin:5px;opacity:1;">Andres Parra</div>
                        <div class="clearfix">&nbsp;</div>
                    </div>
                    <div class="col-xs-12 col-sm-4 col-md-2 col-lg-2 text-center">
                        <div class="clearfix">&nbsp;</div>
                        <img src="../images/perfilaseo.jpg" class="img-responsive" alt="Image" style="border: 8px solid #139445;border-radius: 5px;width:90%;display:inline-block;">
                        <div class="bgreen text-center" style="border:3px solid #139445;border-radius: 5px;padding:5px;margin:5px;opacity:1;">Andres Parra</div>
                        <div class="clearfix">&nbsp;</div>
                    </div>
                    <div class="col-xs-12 col-sm-4 col-md-2 col-lg-2 text-center">
                        <div class="clearfix">&nbsp;</div>
                        <img src="../images/perfilaseo.jpg" class="img-responsive" alt="Image" style="border: 8px solid #139445;border-radius: 5px;width:90%;display:inline-block;">
                        <div class="bgreen text-center" style="border:3px solid #139445;border-radius: 5px;padding:5px;margin:5px;opacity:1;">Andres Parra</div>
                        <div class="clearfix">&nbsp;</div>
                    </div>
                    <div class="col-xs-12 col-sm-4 col-md-2 col-lg-2 text-center">
                        <div class="clearfix">&nbsp;</div>
                        <img src="../images/perfilaseo.jpg" class="img-responsive" alt="Image" style="border: 8px solid #139445;border-radius: 5px;width:90%;display:inline-block;">
                        <div class="bgreen text-center" style="border:3px solid #139445;border-radius: 5px;padding:5px;margin:5px;opacity:1;">Andres Parra</div>
                        <div class="clearfix">&nbsp;</div>
                    </div>
                    <div class="col-xs-12 col-sm-4 col-md-2 col-lg-2 text-center">
                        <div class="clearfix">&nbsp;</div>
                        <img src="../images/perfilaseo.jpg" class="img-responsive" alt="Image" style="border: 8px solid #139445;border-radius: 5px;width:90%;display:inline-block;">
                        <div class="bgreen text-center" style="border:3px solid #139445;border-radius: 5px;padding:5px;margin:5px;opacity:1;">Andres Parra</div>
                        <div class="clearfix">&nbsp;</div>
                    </div>
                    <div class="col-xs-12 col-sm-4 col-md-2 col-lg-2 text-center">
                        <div class="clearfix">&nbsp;</div>
                        <img src="../images/perfilaseo.jpg" class="img-responsive" alt="Image" style="border: 8px solid #139445;border-radius: 5px;width:90%;display:inline-block;">
                        <div class="bgreen text-center" style="border:3px solid #139445;border-radius: 5px;padding:5px;margin:5px;opacity:1;">Andres Parra</div>
                        <div class="clearfix">&nbsp;</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer"></div>
    </div>
</div>
<script>
    $(document).ready(function() {
        cargarPerfil();
    });
</script>
<!-- FIN Pagina primera pestaña -->