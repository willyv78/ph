<?php session_start();
require_once ("../conexion/conexion.php");
require_once ("../php/funciones.php");
//////////////////////////////////////////////////////////////////////////////////////
// Aplicación PHP usando Javascript, Bootstrap, jquery, HTML5 y CSS3 - PH           //
// Copyright 2016 Wilson Giovanny Velandia Barreto 3204274564 - willyv78@gmail.com  //
//////////////////////////////////////////////////////////////////////////////////////
$id_usu = $_SESSION['UsuID'];
$fecha_ini = date('Y-m-d 00:00:00');
$fecha_fin = date('Y-m-d 23:59:59');
$num_res = 0;
if(isset($_GET['fecha'])){
    $fecha_ini = date('Y-m-d 00:00:00', strtotime($_GET['fecha']));
    $fecha_fin = date('Y-m-d 23:59:59', strtotime($_GET['fecha']));
}
echo $fecha_ini;
$res = registroCampo("rmb_calendario", "rmb_calendario_id, rmb_calendario_nom, rmb_tcal_id, rmb_calendario_desc, rmb_calendario_img", " WHERE rmb_calendario_fini >= '$fecha_ini' AND rmb_calendario_ffin <= '$fecha_fin' AND (rmb_calendario_user = $id_usu OR rmb_context_id = 1)", "", "ORDER BY rmb_calendario_fini ASC, rmb_calendario_id ASC");
?>
<div class="col-xs-12 col-sm-offset-1 col-sm-10 col-md-offset-1 col-md-10 col-lg-offset-2 col-lg-8">
    <div class="modal-content">
        <!-- Encabezado del modal -->
        <div class="modal-header">
            <div class="titulo-pagina">
                <div class="clearfix"></div>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">
                    <span style="font-weight: bold;color: #546E7A">
                        <i class="glyphicon glyphicon-send"></i>&nbsp;Eventos
                    </span>
                </h4>
                <div class="clearfix"></div>
            </div>
        </div>
        <!-- Contenido del modal -->
        <div class="modal-body"><?php 
            if($res){
                if(mysql_num_rows($res) > 0){
                    $num_res = mysql_num_rows($res);
                    while($row_res = mysql_fetch_array($res)){
                        if($row_res[2] == "1"){$class = "bblue";$tipo = "Evento";}
                        elseif($row_res[2] == "2"){$class = "bred";$tipo = "Circular";}
                        elseif($row_res[2] == "3"){$class = "borange";$tipo = "Clasificado";}
                        else{$class = "bgreen";$tipo = "Tarea";}?>
                        <div class="col-sm-6 col-md-4 welly evento" data-id="<?php echo $row_res[0];?>">
                            <div class="thumbnail <?php echo $class;?>"><?php 
                                if($row_res[4]){?>
                                    <div class="img-evento" style="background-image: url(<?php echo $row_res[4];?>);"></div>
                                    <!-- <img class="img-evento" src="<?php echo $row_res[4];?>" alt="<?php echo $tipo;?>"> --><?php 
                                }
                                else{?>
                                    <h2 class="text-center img-evento">
                                        <?php echo $tipo;?>
                                    </h2>
                                    <!-- <div class="text-center"><?php echo $tipo;?></div> --><?php 
                                }?>
                                
                                <div class="<?php echo $class;?> caption">
                                    <h3><?php echo $row_res[1];?></h3>
                                    <p><?php echo $row_res[3];?>&nbsp;</p>
                                    <p>
                                        <span class="pull-right ver-mas">Ver más...</span>
                                    </p>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </div><?php 
                    }
                }
            }?>
        </div>
        <!-- Pie de página del modal -->
        <div class="modal-footer">
            <div class="clearfix"></div>
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
              <div class="col-lg-offset-2 col-xs-12 col-sm-12 col-md-12 col-lg-10">
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3 text-right">
                  <div class="mens-est-nom bgreen"></div>
                  <span>Tareas&nbsp;</span>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3 text-right">
                  <div class="mens-est-nom borange"></div>
                  <span>Clasificados&nbsp;</span>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3 text-right">
                  <div class="mens-est-nom bblue"></div>
                  <span>Eventos&nbsp;</span>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3 text-right">
                  <div class="mens-est-nom bred"></div>
                  <span>Circulares&nbsp;</span>
                </div>
              </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        var num_res = <?php echo $num_res;?>;
        if(num_res > 3){
            heightEvento(".welly");
        }
        cargaDetalleHome();
    });
</script>
