<?php session_start();
require_once ("../conexion/conexion.php");
require_once ("../php/funciones.php");

$id_eq = "";$nom = "";$marc = "";$mod = "";$fab = "";$fcom = "";$val = "";$est = "";$obs = "";$tipo = "";$foto = "";$fecha = "";$user = "";$accion = "VER MÁS";

if(isset($_GET['id_equipo'])){
   $id_eq = $_GET['id_equipo'];
   $res_val = EquiposId($id_eq);
   if($res_val){
      if(mysql_num_rows($res_val) > 0){
         $row_val = mysql_fetch_array($res_val);
         $nom = $row_val[1];$marc = $row_val[2];$mod = $row_val[3];$fab = $row_val[4];$fcom = $row_val[5];$val = $row_val[6];$est = $row_val[7];$obs = $row_val[8];$tipo = $row_val[9];$foto = $row_val[10];$fecha = $row_val[11];$user = $row_val[12];
      }
   }
}
?>
<div class="col-xs-12 col-sm-offset-1 col-sm-10 col-md-offset-1 col-md-10 col-lg-offset-2 col-lg-8">
    <div class="modal-content">
        <div class="modal-header">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 titulo-pagina">
                <div class="clearfix">&nbsp;</div>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" alt="Cerrar Ventana" title="Cerrar Ventana"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">
                    <span style="font-weight: bold;color: #546E7A">
                        <i class="glyphicon glyphicon-search"></i>&nbsp;<?php echo $accion;?></span>
                </h4>
                <div class="clearfix">&nbsp;</div>
            </div>
        </div>
        <div class="modal-body">
            <div class="clearfix">&nbsp;</div>
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 eq-t-ver-mas">
                <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">Nombre</div>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 pull-right text-right"><?php echo $nom;?></div>
                </div>
                <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">Marca</div>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 pull-right text-right"><?php echo $marc;?></div>
                </div>
                <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">Modelo</div>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 pull-right text-right"><?php echo $mod;?></div>
                </div>
                <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">Fabricante</div>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 pull-right text-right"><?php echo $fab;?></div>
                </div>
                <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">Fecha compra</div>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 pull-right text-right"><?php echo $fcom;?></div>
                </div>
                <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">Valor</div>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 pull-right text-right"><?php echo "$ " . number_format($val, 0, ',', '.');?></div>
                </div>
                <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">Estado</div>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 pull-right text-right"><?php echo $est;?></div>
                </div>
                <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">Imagen</div><?php 
                    if($foto){$src = $foto;}
                    else{$src = "../images/noimage.png";}?>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 pull-right text-right"><img id="vistaPrevia" src="<?php echo $src; ?>" width="120px" height="120px"/></div>
                </div>
                <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">Observación</div>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 pull-right text-right"><?php echo $obs;?></div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <!-- <button id="cerrar_modal" type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button> -->
        </div>
    </div>
</div>
<script>cargaVerMas();</script>
<!-- FIN Pagina primera pestaña -->