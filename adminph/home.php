<?php session_start();
require_once ("../conexion/conexion.php");
require_once ("../php/funciones.php");
//////////////////////////////////////////////////////////////////////////////////////
// Aplicación PHP usando Bootstrap, jquery, HTML5 y CSS - PH                        //
// Copyright 2014 Wilson Giovanny Velandia Barreto 3204274564 - willyv78@gmail.com  //
//////////////////////////////////////////////////////////////////////////////////////
$id_usu = $_SESSION['UsuID'];
$id = "";$nom = "";$tipo = "";$desc = "";$fini = "";$ffin = "";$datosevent = array();$datoscircu = array();$datosclasi = array();$datostarea = array();
// Se obtiene la fecha actual
$fecha_hoy = date('Y-m-d');
// Se obtiene el dia de la semana 1 = lunes hasta el 7 = Domingo
$dia_sem = date('N');
// Se calculan los dias diferencia entre el dia de hoy y el lunes (1)
$n_dias_lunes = $dia_sem - 1;
// Se calculan los dias diferencia entre el dia actual y el domingo (7)
$n_dias_domingo = 7 - $dia_sem;
// Se calcula la fecha del lunes dela semana actual restando los dias diferencia hasta el lunes a lal fecha actual
$fecha_lunes = strtotime ( '-'.$n_dias_lunes.' day' , strtotime ( $fecha_hoy ) ) ;
$fecha_lunes = date ( 'Y-m-d 00:00:00' , $fecha_lunes );
// Se calcula la fecha del Domingo de la semana actual sumando los dias diferencia hasta el Domingo a la fecha actual
$fecha_domingo = strtotime ( '+'.$n_dias_domingo.' day' , strtotime ( $fecha_hoy ) ) ;
$fecha_domingo = date ( 'Y-m-d 23:59:59' , $fecha_domingo );

// SELECT * FROM `rmb_calendario` WHERE rmb_calendario_fini >= '2016-02-22' AND rmb_calendario_ffin <= '2016-02-28' ORDER BY rmb_calendario_fini ASC, rmb_calendario_id ASC 
$res = registroCampo("rmb_calendario", "rmb_tcal_id, rmb_calendario_fini", " WHERE rmb_calendario_fini >= '$fecha_lunes' AND rmb_calendario_ffin <= '$fecha_domingo' AND (rmb_calendario_user = $id_usu OR rmb_context_id = 1)", "", "ORDER BY rmb_calendario_fini ASC, rmb_calendario_id ASC");

if($res){
	if(mysql_num_rows($res) > 0){
		while($row = mysql_fetch_array($res)){
            $tipo = $row[0];
            $fini = date('N', strtotime($row[1]));
            // Eventos
            if($tipo == '1'){
                $datosevent[] = $fini;
            }
            // Circulares
            elseif($tipo == '2'){
                $datoscircu[] = $fini;
            }
            // Clasificados
            elseif($tipo == '3'){
                $datosclasi[] = $fini;
            }
            // Tareas
            else{
                $datostarea[] = $fini;
            }
		}
	}
}
// echo $datostarea[0]." - ".$datostarea[1]." - ".$datostarea[2];
if(isset($_GET['tipo'])){$tipo = $_GET['tipo'];}
else{$tipo = 1;}
if(isset($_GET['date'])){$dates = date('m-d-Y H:i', strtotime($_GET['date']));}
else{$dates = "";}

// consulta para obtener los banner que estan en la base de datos y que tienen un estado visible
$res_banner = registroCampo("rmb_banner", "rmb_banner_id, rmb_banner_nom, rmb_banner_desc, rmb_banner_img", " WHERE rmb_est_id = 25", "", "ORDER BY rmb_banner_ord ASC");

$banner_default = '
    <div class="item active">
        <img src="../images/banners/default.png" alt="Banner informativo">
        <div class="carousel-caption col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 home-content-titulo">
                <div class="col-xs-11 col-sm-11 col-md-11 col-lg-11"></div>
            </div>
            <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8 home-content-desc">
                <div class="col-xs-11 col-sm-11 col-md-11 col-lg-11"></div>
            </div>
        </div>
    </div>
';
$n_rows = 1;
?>
<!-- Titulo de la pagina -->
<!-- <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 titulo-pagina">
   <h3 class="text-left">Bienvenido</h3>
</div> -->
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="z-index:1000">
    <input class="form-control" type="hidden" id="tipo_cal" value="<?php echo $tipo;?>">
    <!-- Carrusell Banner -->
    <div id="home-content-img" class="carousel slide col-xs-12 col-sm-12 col-md-12 col-lg-8 home-content" data-ride="carousel">
        <!-- Wrapper for slides -->
        <div class="carousel-inner" role="listbox"><?php 
            if($res_banner){
                if(mysql_num_rows($res_banner) > 0){
                    $n_rows = mysql_num_rows($res_banner);
                    $sq = 0;
                    while($row_banner = mysql_fetch_array($res_banner)){?>
                        <div id="<?php echo $sq;?>" class="item <?php if($sq == 0){echo "active";}?>" data-id="<?php echo $row_banner[0];?>">
                            <img src="<?php if($row_banner[3] <> ''){echo $row_banner[3];}else{echo '../images/banners/default.png';} ?>" alt="<?php echo $row_banner[1];?>" title="<?php echo $row_banner[1];?>"><?php 
                            if(($row_banner[1] <> '') || ($row_banner[2] <> '')){?>
                                <div class="carousel-caption col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                    <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 home-content-titulo">
                                        <div class="col-xs-11 col-sm-11 col-md-11 col-lg-11">
                                            <?php echo $row_banner[1];?>
                                        </div>
                                    </div>
                                    <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8 home-content-desc">
                                        <div class="col-xs-11 col-sm-11 col-md-11 col-lg-11">
                                            <?php echo $row_banner[2];?>
                                        </div>
                                    </div>
                                </div><?php 
                            }?>
                        </div><?php 
                        $sq++;
                    }
                }
                else{echo $banner_default;}
            }
            else{echo $banner_default;}?>
        </div>
        <!-- Indicators -->
        <ol class="carousel-indicators"><?php 
            for($i = 0; $i < $n_rows; $i++){?>
                <li data-target="#home-content-img" data-slide-to="<?php echo $i;?>" class="<?php if($i == 0){echo "active";}?>"></li><?php 
            }?>
        </ol>
        <!-- Controls -->
        <a class="left carousel-control" href="#home-content-img" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
            <span class="sr-only">Anterior</span>
        </a>
        <a class="right carousel-control" href="#home-content-img" role="button" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
            <span class="sr-only">Siguiente</span>
        </a>
    </div>
    <!-- Espacio entre carrusell y dias -->
    <div class="col-xs-12 esp-carrusel-dias">&nbsp;</div>
    <!-- Columna derecha con los dias y otros botones -->
    <div id="home-content-dias" class="col-xs-12 col-sm-12 col-md-12 col-lg-4 home-content">
        <!-- div de la fecha y dias de la semana en el calendario -->
        <div class="col-xs-12 col-sm-12 col-md-5 col-lg-12 dias-cal" style="padding:0;margin:0;">
            <div class="col-xs-5 col-sm-5 col-md-5 col-lg-6" id="home-cont-cal">
                <span id="home-dia-cal" data-dia="<?php echo date('d');?>"><?php echo date('d');?></span>
                <div class="hidden" id="home-tip-cal"></div>
                <div class="btn-default" id="home-mes-cal" data-mes="<?php echo date('m');?>" data-anio="<?php echo date('Y');?>"><?php echo mesesLetras(date('m'))." ".date('Y');?></div>
            </div>
            <div class="col-xs-7 col-sm-7 col-md-7 col-lg-6"><?php 
                for($i = 1; $i <= 7; $i++){
                    $fecha_dia = strtotime ( '+'.($i - 1).' day' , strtotime ( $fecha_lunes ) ) ;
                    $num_dia = date ( 'd' , $fecha_dia );
                    $num_mes = date ( 'm' , $fecha_dia );
                    $num_anio = date ( 'Y' , $fecha_dia );?>
                    <div data-id="<?php echo $i;?>" data-dia="<?php echo $num_dia;?>" data-mes="<?php echo mesesLetras($num_mes);?>" data-nmes="<?php echo $num_mes;?>" data-anio="<?php echo $num_anio;?>" class="btn btn-default form-control otros-dias<?php if(date('N') == $i){echo " active";} ?>" <?php if($i == 1){echo 'id="dia-primero"';}elseif($i == 7){echo 'id="dia-ultimo"';} ?>>
                        <span class="nom-dia"><?php echo diasTodos($i);?></span><?php 
                        // echo $datostarea;
                        if(($datostarea) && (in_array($i, $datostarea))){?>
                            <span class="pull-right eventos bgreen"><div class="clearfix"></div></span><?php 
                        }
                        if(($datosclasi) && (in_array($i, $datosclasi))){?>
                            <span class="pull-right eventos borange"><div class="clearfix"></div></span><?php 
                        }
                        if(($datoscircu) && (in_array($i, $datoscircu))){?>
                            <span class="pull-right eventos bred"><div class="clearfix"></div></span><?php 
                        }
                        if(($datosevent) && (in_array($i, $datosevent))){?>
                            <span class="pull-right eventos bblue"><div class="clearfix"></div></span><?php 
                        }?>
                    </div>
                <?php }?>
            </div>
        </div>
        <!-- Espacio entre la fecha con los dias de la semana y los accesos a otros -->
        <div class="col-xs-12 col-sm-12 hidden-md col-lg-12 esp-icon-dias">&nbsp;</div>
        <!-- div con los accesos a otros modulos -->
        <div class="hidden-xs hidden-sm col-md-7 col-lg-12 icon-mod" style="padding:0;margin:0;">
            <!-- contenedor de quienes somos -->
            <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3" style="padding:0;margin:0;">
                <img src="../images/home-qui.png" class="img-responsive home-accesos" data-pag="quienes-somos" alt="Conozca quiénes somos." title="Conozca quiénes somos." style="cursor: pointer;">
            </div>
            <!-- contenedor de imagenes de otros accesos -->
            <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9" style="padding:0;margin:0;">
                <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                    <img src="../images/home-cont.png" class="img-responsive home-accesos" data-pag="contactos" alt="Revise los contactos en su entorno de vivienda" title="Revise los contactos en su entorno de vivienda" style="width:100%; cursor: pointer;">
                    <div>&nbsp;</div>
                </div>
                <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                    <img src="../images/home-eme.png" class="img-responsive home-accesos" data-pag="contactos" alt="Obtenga los teléfonos de entidades y sistemas de emergencia" title="Obtenga los teléfonos de entidades y sistemas de emergencia" style="width:100%; cursor: pointer;">
                    <div>&nbsp;</div>
                </div>
                <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                    <img src="../images/home-tes.png" class="img-responsive home-accesos" data-pag="lista-de-apartamentos" alt="Revise su estado finaciero" title="Revise su estado finaciero" style="width:100%; cursor: pointer;">
                    <div>&nbsp;</div>
                </div>
                <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                    <img src="../images/home-men.png" class="img-responsive home-accesos" data-pag="mensajes" alt="Revise los mensajes enviados y/o recibidos" title="Revise los mensajes enviados y/o recibidos" style="width:100%; cursor: pointer;">
                    <div>&nbsp;</div>
                </div>
                <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                    <img src="../images/home-con.png" class="img-responsive home-accesos" data-pag="consumos" alt="Entérese de los consumos de servicios públicos de su conjunto." title="Entérese de los consumos de servicios públicos de su conjunto." style="width:100%; cursor: pointer;">
                    <div>&nbsp;</div>
                </div>
                <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                    <img src="../images/home-doc.png" class="img-responsive home-accesos" data-pag="documentos" alt="Consulte los documentos de interés" title="Consulte los documentos de interés" style="width:100%; cursor: pointer;">
                    <div>&nbsp;</div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    cargarHome();
    $('.carousel').carousel();
</script>
