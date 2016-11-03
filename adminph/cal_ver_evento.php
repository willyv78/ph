<?php session_start();
require_once ("../conexion/conexion.php");
require_once ("../php/funciones.php");
//////////////////////////////////////////////////////////////////////////////////////
// Aplicación PHP usando Bootstrap, jquery, HTML5 y CSS - PH                        //
// Copyright 2014 Wilson Giovanny Velandia Barreto 3204274564 - willyv78@gmail.com  //
//////////////////////////////////////////////////////////////////////////////////////

$id_even = "";$nom_even = "";$tipo_even = "";$est_even = "";$desc_even = "";$fini_even = "";$ffin_even = "";$img_even = "";$fecha_even = "";$user_even = "";$class_div = "";$pub_even = "";
if(isset($_GET['id'])){
    $res = registroCampo("rmb_calendario", "*", "WHERE rmb_calendario_id = '".$_GET['id']."'", "", "");
    if($res){
        if(mysql_num_rows($res) > 0){
            $row = mysql_fetch_array($res);
            $id_even = $row[0];
            $nom_even = $row[1];
            $pub_even = $row[3];
            $tipo_even = $row[4];
            if($tipo_even == '1'){$tip_even = "Evento";$class_div = "bblue";}
            elseif($tipo_even == '2'){$tip_even = "Circular";$class_div = "bred";}
            elseif($tipo_even == '3'){$tip_even = "Clasificado";$class_div = "borange";}
            else{$tip_even = "Tarea";$class_div = "bgreen";}
            $est_even = $row[5];
            $desc_even = $row[8];
            $fini_even = date('Y-m-d H:i', strtotime($row[9]));
            $ffin_even = date('Y-m-d H:i', strtotime($row[16]));
            $img_even = $row[17];
            $fecha_even = $row[18];
            $user_even = $row[19];
        }
    }
}
?>
<div class="col-xs-12 col-sm-offset-1 col-sm-10 col-md-offset-1 col-md-10 col-lg-offset-2 col-lg-8">
    <div class="modal-content">
        <div class="modal-header">
            <div class="titulo-pagina">
                <div class="clearfix">&nbsp;</div>
                <h3 class="modal-title text-left" id="myModalLabel">
                    <span style="font-weight: 400;color: #546E7A">
                        <?php echo $tip_even." - ".$nom_even; ?>
                    </span>
                </h3>
                <div class="clearfix">&nbsp;</div>
            </div>
        </div>
        <!-- Contenido del modal -->
        <div class="modal-body"><?php 
            if($img_even <> ''){?>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <img class="img-responsive" src="<?php echo $img_even;?>" alt="Image" width="80%" style="margin: auto;">
                </div>
                <div class="clearfix">&nbsp;</div><?php
            }
            if($tipo_even <> '6'){?>
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                    <label class="col-xs-3 col-sm-4 col-md-4 col-lg-4 control-label">
                        Inicia:&nbsp;
                    </label>
                    <div class="col-xs-9 col-sm-8 col-md-8 col-lg-8 text-left">
                        <?php echo $fini_even;?>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                    <label class="col-xs-3 col-sm-4 col-md-4 col-lg-4 control-label">
                        Finaliza:&nbsp;
                    </label>
                    <div class="col-xs-9 col-sm-8 col-md-8 col-lg-8 text-left">
                        <?php echo $ffin_even;?>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <label class="col-xs-3 col-sm-2 col-md-2 col-lg-2 control-label">
                        Contexto:&nbsp;
                    </label>
                    <div class="col-xs-9 col-sm-10 col-md-10 col-lg-10 text-left">
                        <?php if($pub_even == '1'){echo "Público";}else{echo "Privado";}?>
                    </div>
                </div><?php 
            }
            if($desc_even <> ''){?>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <label class="col-xs-12 col-sm-2 col-md-2 col-lg-2 control-label">
                        Mensaje:&nbsp;
                    </label>
                    <div class="col-xs-12 col-sm-10 col-md-10 col-lg-10 text-left">
                        <?php echo $desc_even;?>
                    </div>
                </div><?php 
            }
            if($user_even <> ''){
                $nom_crea = "";
                $fecha_crea = "";
                if($user_even <> '1'){
                    $res_crea = ResidenteDatosId($user_even);
                    if($res_crea){
                        if(mysql_num_rows($res_crea) > 0){
                            $row_crea = mysql_fetch_array($res_crea);
                            $nom_crea = $row_crea[1] . " " . $row_crea[2];
                            if($fecha_even <> ''){
                                $fecha_crea = "<br>Fecha:&nbsp;" . $fecha_even;
                            }
                        }
                    }
                }
                else{
                    $nom_crea = "Administrador";
                    $fecha_crea = "<br>Fecha:&nbsp;".$fecha_even;
                }
                ?>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <label class="col-xs-12 col-sm-2 col-md-2 col-lg-2 control-label">
                        Creador:&nbsp;
                    </label>
                    <div class="col-xs-12 col-sm-10 col-md-10 col-lg-10 text-left">
                        <?php echo $nom_crea . $fecha_crea;?>
                    </div>
                </div><?php 
            }?>
        </div>
        <!-- Pie de página del modal -->
        <div class="modal-footer">
            <div class="widget">&nbsp;</div><?php 
            if(isset($_GET['cal'])){?>
                <button type="buttom" class="btn btn-default btn-close">Cerrar</button>
            <?php }
            else{?>
                <button type="buttom" class="btn btn-default btn-regresar" data-fecha="<?php echo date('d-m-Y', strtotime($fini_even)) ?>">Regresar</button><?php 
            }?>
        </div>
    </div>
</div>
<script>
</script>
<script>
    cargaDetalleEvento();
</script>