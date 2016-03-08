<?php session_start();
require_once ("../conexion/conexion.php");
require_once ("../php/funciones.php");

$teq = "";
if(isset($_GET['teq'])){
    $teq = $_GET['teq'];
}
$tipo_de_equipo = "";
$where = " AND rmb_est_id <> '9'";
if($_GET['inactivo']){
  $tipo_de_equipo = $_GET['inactivo'];
  $where = " AND rmb_est_id = '9'"; 
}
$res_tipoeq = registroCampo("rmb_equipos", "rmb_equipos_id, rmb_equipos_nom, rmb_equipos_foto", "WHERE rmb_teq_id = '$teq' $where", "", "ORDER BY rmb_equipos_nom ASC");
?>
<!-- Boton de regresar a listado -->
<div class="col-lg-offset-5 col-md-offset-5 col-sm-offset-5 col-xs-offset-2 col-xs-8 col-sm-2 col-md-2 col-lg-2" id="regresar" name="regresar">
    <button type="button" class="btn btn-default form-control">Regresar</button>
</div>
<!-- lista de equipos por tipo -->
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12"><?php 
if($res_tipoeq){
    if(mysql_num_rows($res_tipoeq) > 0){
        while($row_tipoeq = mysql_fetch_array($res_tipoeq)){?>
            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 eq-t-content">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 eq-t-titulo">
                    <?php echo $row_tipoeq[1] ?>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 eq-t-imagen"><?php 
                    if($row_tipoeq[2]){
                       $src = $row_tipoeq[2];
                    }
                    else{
                       $src = "../images/noimage.png";
                    }?>
                    <img id='vistaPrevia' src='<?php echo $src;?>' width='100px' height="100px"/>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 eq-t-botones">
                    <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4" id="historial" name="<?php echo $row_tipoeq[0];?>">
                        <button id="history" type="button" class="btn btn-default form-control" data-dismiss="modal" alt="Historial de mantenimientos" title="Ver Historial de mantenimientos">Historial</button>
                    </div>
                    <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4" id="editar" name="<?php echo $row_tipoeq[0];?>">
                        <button id="edit" type="button" class="btn btn-default form-control" data-dismiss="modal" alt="Modificar datos del equipo" title="Modificar datos del equipo">Editar</button>
                    </div>
                    <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4" id="detalle" name="<?php echo $row_tipoeq[0];?>">
                        <button id="show" type="button" class="btn btn-default form-control" data-dismiss="modal" alt="Consultar datos del equipo" title="Consultar datos del equipo">Ver más</button>
                    </div>
                </div>
            </div><?php
        }
    }
    else{?>
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="alert alert-danger text-left">
                <!-- <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> -->
                <strong>Importante!</strong>
                  <p>No se encontraron resultados para el tipo de equipo seleccionado.</p>
                  
            </div>
        </div><?php 
    }
}
else{?>
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div class="alert alert-danger text-left">
            <!-- <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> -->
            <strong>Importante!</strong>
              <p>No se realizó la consulta a la base de datos. Contacte al administrador del sistema para reportar el error.</p>        
        </div>
    </div><?php 
}
?>
</div>  
<script>
    $(document).ready(function() {
        cargarEquipoTipo();
    });
</script>
<!-- Fin lista de tipos de equipos -->