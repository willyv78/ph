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
<div class="col-xs-12 col-sm-10 col-md-10 col-lg-10" style="margin:30px auto;">
    <div class="modal-content">
        <div class="modal-header text-right">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h3 class="modal-title" id="myModalLabel">
                <span style="font-weight: bold;color: #73B848"><span style="font-size: 2.5em;color: #974694;">S</span>eguridad</span>
            </h3>
        </div>
        <div class="modal-body">
            <!-- Titulares -->
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="col-xs-12 col-sm-2 col-md-2 col-lg-2 text-center">
                    <img src="../images/VIGILANCIA1.png" class="img-responsive" alt="Image" style="display:inline-block;">
                </div>
                <div class="col-xs-12 col-sm-10 col-md-10 col-lg-10">
                    <div class="clearfix">&nbsp;</div>
                </div>
                <div class="col-xs-12 col-sm-10 col-md-10 col-lg-10">
                    <div class="clearfix">&nbsp;</div>
                </div>
                <div class="col-xs-12 col-sm-10 col-md-10 col-lg-10">
                    <div class="clearfix">&nbsp;</div>
                </div>
                <div class="bgreen col-xs-12 col-sm-10 col-md-10 col-lg-10 text-center" style="border:3px solid #73B848;border-radius: 5px;padding:5px;opacity:0.6;">
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
                        <img src="../images/perfilaseo.jpg" class="img-responsive" alt="Image" style="border: 8px solid #73B848;border-radius: 5px;width:90%;display:inline-block;">
                        <div class="bgreen text-center" style="border:3px solid #73B848;border-radius: 5px;padding:5px;margin:5px;opacity:0.6;">Andres Parra</div>
                        <div class="clearfix">&nbsp;</div>
                    </div>
                    <div class="col-xs-12 col-sm-4 col-md-2 col-lg-2 text-center">
                        <div class="clearfix">&nbsp;</div>
                        <img src="../images/perfilaseo.jpg" class="img-responsive" alt="Image" style="border: 8px solid #73B848;border-radius: 5px;width:90%;display:inline-block;">
                        <div class="bgreen text-center" style="border:3px solid #73B848;border-radius: 5px;padding:5px;margin:5px;opacity:0.6;">Andres Parra</div>
                        <div class="clearfix">&nbsp;</div>
                    </div>
                    <div class="col-xs-12 col-sm-4 col-md-2 col-lg-2 text-center">
                        <div class="clearfix">&nbsp;</div>
                        <img src="../images/perfilaseo.jpg" class="img-responsive" alt="Image" style="border: 8px solid #73B848;border-radius: 5px;width:90%;display:inline-block;">
                        <div class="bgreen text-center" style="border:3px solid #73B848;border-radius: 5px;padding:5px;margin:5px;opacity:0.6;">Andres Parra</div>
                        <div class="clearfix">&nbsp;</div>
                    </div>
                    <div class="col-xs-12 col-sm-4 col-md-2 col-lg-2 text-center">
                        <div class="clearfix">&nbsp;</div>
                        <img src="../images/perfilaseo.jpg" class="img-responsive" alt="Image" style="border: 8px solid #73B848;border-radius: 5px;width:90%;display:inline-block;">
                        <div class="bgreen text-center" style="border:3px solid #73B848;border-radius: 5px;padding:5px;margin:5px;opacity:0.6;">Andres Parra</div>
                        <div class="clearfix">&nbsp;</div>
                    </div>
                    <div class="col-xs-12 col-sm-4 col-md-2 col-lg-2 text-center">
                        <div class="clearfix">&nbsp;</div>
                        <img src="../images/perfilaseo.jpg" class="img-responsive" alt="Image" style="border: 8px solid #73B848;border-radius: 5px;width:90%;display:inline-block;">
                        <div class="bgreen text-center" style="border:3px solid #73B848;border-radius: 5px;padding:5px;margin:5px;opacity:0.6;">Andres Parra</div>
                        <div class="clearfix">&nbsp;</div>
                    </div>
                    <div class="col-xs-12 col-sm-4 col-md-2 col-lg-2 text-center">
                        <div class="clearfix">&nbsp;</div>
                        <img src="../images/perfilaseo.jpg" class="img-responsive" alt="Image" style="border: 8px solid #73B848;border-radius: 5px;width:90%;display:inline-block;">
                        <div class="bgreen text-center" style="border:3px solid #73B848;border-radius: 5px;padding:5px;margin:5px;opacity:0.6;">Andres Parra</div>
                        <div class="clearfix">&nbsp;</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        cargarAdmin();
    });
</script>
<!-- FIN Pagina primera pestaña -->