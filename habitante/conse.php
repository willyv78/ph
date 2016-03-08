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
                <span style="font-weight: bold;color: #974694"><span style="font-size: 2.5em;color: #EF9614;">C</span>onsejo <span style="font-size: 2.5em;color: #EF9614;">A</span>dministrativo</span>
            </h3>
        </div>
        <div class="modal-body">
            <!-- Titulares -->
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center">
                        <img src="../images/CONSEJO1.png" class="img-responsive" alt="Image" style="display:inline-block;">
                    </div>
                    
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 text-center">
                            <img src="../images/perfilaseo.jpg" class="img-responsive" alt="Image" style="border: 8px solid #4D3A8F;border-radius: 5px;display:inline-block;width:90%;">
                            <div class="bviolet text-center" style="border:3px solid #4D3A8F;border-radius: 5px;padding:5px;margin:5px;opacity:0.6;">Presidente<br>Camilo Guzman<br>Apto 508</div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 text-center">
                            <img src="../images/perfilaseo.jpg" class="img-responsive" alt="Image" style="border: 8px solid #4D3A8F;border-radius: 5px;display:inline-block;width:90%;">
                            <div class="bviolet text-center" style="border:3px solid #4D3A8F;border-radius: 5px;padding:5px;margin:5px;opacity:0.6;">Vice-Presidente<br>Camilo Guzman<br>Apto 508</div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
                    <div class="col-xs-12 col-sm-4 col-md-3 col-lg-3 text-center">
                        <div class="clearfix">&nbsp;</div>
                        <img src="../images/perfilaseo.jpg" class="img-responsive" alt="Image" style="border: 8px solid #4D3A8F;border-radius: 5px;width:90%;display:inline-block;">
                        <div class="bviolet text-center" style="border:3px solid #4D3A8F;border-radius: 5px;padding:5px;margin:5px;opacity:0.6;">Felipe Ramos<br>Apto 508</div>
                        <div class="clearfix">&nbsp;</div>
                    </div>
                    <div class="col-xs-12 col-sm-4 col-md-3 col-lg-3 text-center">
                        <div class="clearfix">&nbsp;</div>
                        <img src="../images/perfilaseo.jpg" class="img-responsive" alt="Image" style="border: 8px solid #4D3A8F;border-radius: 5px;width:90%;display:inline-block;">
                        <div class="bviolet text-center" style="border:3px solid #4D3A8F;border-radius: 5px;padding:5px;margin:5px;opacity:0.6;">Felipe Ramos<br>Apto 508</div>
                        <div class="clearfix">&nbsp;</div>
                    </div>
                    <div class="col-xs-12 col-sm-4 col-md-3 col-lg-3 text-center">
                        <div class="clearfix">&nbsp;</div>
                        <img src="../images/perfilaseo.jpg" class="img-responsive" alt="Image" style="border: 8px solid #4D3A8F;border-radius: 5px;width:90%;display:inline-block;">
                        <div class="bviolet text-center" style="border:3px solid #4D3A8F;border-radius: 5px;padding:5px;margin:5px;opacity:0.6;">Felipe Ramos<br>Apto 508</div>
                        <div class="clearfix">&nbsp;</div>
                    </div>
                    <div class="col-xs-12 col-sm-4 col-md-3 col-lg-3 text-center">
                        <div class="clearfix">&nbsp;</div>
                        <img src="../images/perfilaseo.jpg" class="img-responsive" alt="Image" style="border: 8px solid #4D3A8F;border-radius: 5px;width:90%;display:inline-block;">
                        <div class="bviolet text-center" style="border:3px solid #4D3A8F;border-radius: 5px;padding:5px;margin:5px;opacity:0.6;">Felipe Ramos<br>Apto 508</div>
                        <div class="clearfix">&nbsp;</div>
                    </div>
                    <div class="col-xs-12 col-sm-4 col-md-3 col-lg-3 text-center">
                        <div class="clearfix">&nbsp;</div>
                        <img src="../images/perfilaseo.jpg" class="img-responsive" alt="Image" style="border: 8px solid #4D3A8F;border-radius: 5px;width:90%;display:inline-block;">
                        <div class="bviolet text-center" style="border:3px solid #4D3A8F;border-radius: 5px;padding:5px;margin:5px;opacity:0.6;">Felipe Ramos<br>Apto 508</div>
                        <div class="clearfix">&nbsp;</div>
                    </div>
                    <div class="col-xs-12 col-sm-4 col-md-3 col-lg-3 text-center">
                        <div class="clearfix">&nbsp;</div>
                        <img src="../images/perfilaseo.jpg" class="img-responsive" alt="Image" style="border: 8px solid #4D3A8F;border-radius: 5px;width:90%;display:inline-block;">
                        <div class="bviolet text-center" style="border:3px solid #4D3A8F;border-radius: 5px;padding:5px;margin:5px;opacity:0.6;">Felipe Ramos<br>Apto 508</div>
                        <div class="clearfix">&nbsp;</div>
                    </div>
                    <div class="col-xs-12 col-sm-4 col-md-3 col-lg-3 text-center">
                        <div class="clearfix">&nbsp;</div>
                        <img src="../images/perfilaseo.jpg" class="img-responsive" alt="Image" style="border: 8px solid #4D3A8F;border-radius: 5px;width:90%;display:inline-block;">
                        <div class="bviolet text-center" style="border:3px solid #4D3A8F;border-radius: 5px;padding:5px;margin:5px;opacity:0.6;">Felipe Ramos<br>Apto 508</div>
                        <div class="clearfix">&nbsp;</div>
                    </div>
                    <div class="col-xs-12 col-sm-4 col-md-3 col-lg-3 text-center">
                        <div class="clearfix">&nbsp;</div>
                        <img src="../images/perfilaseo.jpg" class="img-responsive" alt="Image" style="border: 8px solid #4D3A8F;border-radius: 5px;width:90%;display:inline-block;">
                        <div class="bviolet text-center" style="border:3px solid #4D3A8F;border-radius: 5px;padding:5px;margin:5px;opacity:0.6;">Felipe Ramos<br>Apto 508</div>
                        <div class="clearfix">&nbsp;</div>
                    </div>
                </div>
            </div>
            <!-- Suplentes -->
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 text-center">
                    <img src="../images/CONSEJO2.png" class="img-responsive" alt="Image" style="display:inline-block;">
                </div>
                <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
                    <div class="col-xs-12 col-sm-4 col-md-3 col-lg-3 text-center">
                        <div class="clearfix">&nbsp;</div>
                        <img src="../images/perfilaseo.jpg" class="img-responsive" alt="Image" style="border: 8px solid #EF9614;border-radius: 5px;width:90%;display:inline-block;">
                        <div class="borange text-center" style="border:3px solid #EF9614;border-radius: 5px;padding:5px;margin:5px;opacity:0.6;">Felipe Ramos<br>Apto 508</div>
                        <div class="clearfix">&nbsp;</div>
                    </div>
                    <div class="col-xs-12 col-sm-4 col-md-3 col-lg-3 text-center">
                        <div class="clearfix">&nbsp;</div>
                        <img src="../images/perfilaseo.jpg" class="img-responsive" alt="Image" style="border: 8px solid #EF9614;border-radius: 5px;width:90%;display:inline-block;">
                        <div class="borange text-center" style="border:3px solid #EF9614;border-radius: 5px;padding:5px;margin:5px;opacity:0.6;">Felipe Ramos<br>Apto 508</div>
                        <div class="clearfix">&nbsp;</div>
                    </div>
                    <div class="col-xs-12 col-sm-4 col-md-3 col-lg-3 text-center">
                        <div class="clearfix">&nbsp;</div>
                        <img src="../images/perfilaseo.jpg" class="img-responsive" alt="Image" style="border: 8px solid #EF9614;border-radius: 5px;width:90%;display:inline-block;">
                        <div class="borange text-center" style="border:3px solid #EF9614;border-radius: 5px;padding:5px;margin:5px;opacity:0.6;">Felipe Ramos<br>Apto 508</div>
                        <div class="clearfix">&nbsp;</div>
                    </div>
                    <div class="col-xs-12 col-sm-4 col-md-3 col-lg-3 text-center">
                        <div class="clearfix">&nbsp;</div>
                        <img src="../images/perfilaseo.jpg" class="img-responsive" alt="Image" style="border: 8px solid #EF9614;border-radius: 5px;width:90%;display:inline-block;">
                        <div class="borange text-center" style="border:3px solid #EF9614;border-radius: 5px;padding:5px;margin:5px;opacity:0.6;">Felipe Ramos<br>Apto 508</div>
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