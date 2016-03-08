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
                <span style="font-weight: bold;color: #EF9614"><span style="font-size: 2.5em;color: #974694;">C</span>ontador</span>
            </h3>
            <input type="hidden" name="rmb_cdoc_id" id="rmb_cdoc_id" class="form-control" value="<?php echo $tipo;?>">
        </div>
        <div class="modal-body">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <!-- Contador titular -->
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 alert alert-info">
                    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                        <img src="../images/CONTADOR1.png" class="img-responsive" alt="Image" style="width: 55%;height: 180px;display:inline-block;">
                        <img src="../images/foto-carnet1.jpg" class="img-responsive" alt="Image" style="width: 45%;border: 8px solid #EF9614;border-radius: 5px;margin-left: -25px;height: 140px;display:inline-block;">
                    </div>
                    <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <div class="alert alert-info text-left">
                                Empresa: Contadores S.A.S.<br>
                                Contacto: Stella Ruiz&nbsp;&nbsp;&nbsp;&nbsp;Teléfono: 5 555555&nbsp;&nbsp;&nbsp;&nbsp;Cel: 300 5555555<br>
                                Correo: inmobiliaria@contadoressas.com&nbsp;&nbsp;&nbsp;&nbsp;Pág. WEB: www.contadoressas.com                                  
                            </div>
                            <div class="alert alert-info text-left">
                                Contador General: Felipe Camargo&nbsp;&nbsp;&nbsp;&nbsp;Teléfono: 5 555555&nbsp;&nbsp;&nbsp;&nbsp;Cel: 300 5555555<br>
                                Correo: inmobiliaria@contadoressas.com
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Contador Delegado -->
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 alert alert-danger">
                    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                        <img src="../images/CONTADOR2.png" class="img-responsive" alt="Image" style="width: 55%;height: 180px;display:inline-block;">
                        <img src="../images/foto-carnet2.jpg" class="img-responsive" alt="Image" style="width: 45%;border: 8px solid #EF9614;border-radius: 5px;margin-left: -25px;height: 140px;display:inline-block;">
                    </div>
                    <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <div class="alert alert-info text-left">
                                Contador Delegado: Javier Espitia&nbsp;&nbsp;&nbsp;&nbsp;Teléfono: 5 555555&nbsp;&nbsp;&nbsp;&nbsp;Cel: 300 5555555<br>
                                Correo: jespitia@contadoressas.com
                            </div>
                            <div class="alert alert-danger text-left">
                                Horario Atención: Lun - Vie 9:00 - 11:00 am<br>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Sáb 9:00 - 11:00 am.
                            </div>
                        </div>
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