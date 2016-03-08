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

?>
<!-- Titulo de la pagina -->
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 titulo-pagina">
   <h3 class="text-left">Bienvenido</h3>
</div>
<div class="widget"></div>
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="z-index:1000">
    <input class="form-control" type="hidden" id="tipo_cal" value="<?php echo $tipo;?>">
    <div class="widget"></div>

    <!-- Ejemplo de carrusell -->
    <div id="home-content-img" class="carousel slide col-xs-12 col-sm-12 col-md-8 col-lg-8 home-content" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
            <li data-target="#carousel-example-generic" data-slide-to="1"></li>
            <li data-target="#carousel-example-generic" data-slide-to="2"></li>
        </ol>

        <!-- Wrapper for slides -->
        <div class="carousel-inner" role="listbox">
            <div class="item active">
                <img src="../images/banners/1.png" alt="Primero">
                <div class="carousel-caption col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 home-content-titulo">
                        <div class="col-xs-11 col-sm-11 col-md-11 col-lg-11">
                            Título uno
                        </div>
                    </div>
                    <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8 home-content-desc">
                        <div class="col-xs-11 col-sm-11 col-md-11 col-lg-11">
                            Descripción uno.
                        </div>
                    </div>
                </div>
            </div>
            <!-- <div class="item">
                <img src="../images/banners/2.png" alt="Segundo">
                <div class="carousel-caption col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4" id="home-content-titulo">
                        <div class="col-xs-11 col-sm-11 col-md-11 col-lg-11">
                            Título dos
                        </div>
                    </div>
                    <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8" id="home-content-desc">
                        <div class="col-xs-11 col-sm-11 col-md-11 col-lg-11">
                            Descripción dos.
                        </div>
                    </div>
                </div>
            </div>
            <div class="item">
                <img src="../images/banners/3.png" alt="Tercero">
                <div class="carousel-caption col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4" id="home-content-titulo">
                        <div class="col-xs-11 col-sm-11 col-md-11 col-lg-11">
                            Título tres
                        </div>
                    </div>
                    <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8" id="home-content-desc">
                        <div class="col-xs-11 col-sm-11 col-md-11 col-lg-11">
                            Descripción tres.
                        </div>
                    </div>
                </div>
            </div> -->
        </div>

        <!-- Controls -->
        <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
            <span class="sr-only">Anterior</span>
        </a>
        <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
            <span class="sr-only">Siguiente</span>
        </a>
    </div>

    <!-- columna izq con los banners -->
    <!-- <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 home-content" id="home-content-img" alt="Noticia Importante" title="Noticia Importante">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4" id="home-content-titulo">
                <div class="col-xs-11 col-sm-11 col-md-11 col-lg-11">
                    m m m m m m m m m m m m m m m m m m 
                </div>
            </div>
            <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8" id="home-content-desc">
                <div class="col-xs-11 col-sm-11 col-md-11 col-lg-11">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium possimus tempore accusamus facere, atque qui sunt nobis itaque. Hic ipsa eius, odi fugiat optio enim praesentium nam animi tenetur harum! atque qui sunt nobis itaque. atque qui sunt nobis itaque. atque qui sunt nobis itaqxxxxxue.
                </div>
            </div>
        </div>
    </div> -->

    <div class="widget visible-xs-*"></div>

    <!-- Columna derecha con los dias y otros botones -->
    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 home-content" style="padding:0;margin:0;">
        <!-- espacio superior de lafecha y dias calendario -->
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" id="space-sup">&nbsp;</div>
        <!-- div de la fecha y dias de la semana en el calendario -->
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="padding:0;margin:0;">
            <div class="col-xs-5 col-sm-5 col-md-5 col-lg-5" id="home-cont-cal">
                <span id="home-dia-cal" data-dia="<?php echo date('d');?>"><?php echo date('d');?></span>
                <div class="hidden" id="home-tip-cal">Evento</div>
                <div class="btn-default" id="home-mes-cal" data-mes="<?php echo date('m');?>" data-anio="<?php echo date('Y');?>"><?php echo mesesLetras(date('m'))." ".date('Y');?></div>
            </div>
            <div class="hidden-xs col-sm-1 hidden-md col-lg-1"></div>
            <div class="col-xs-7 col-sm-6 col-md-7 col-lg-6"><?php 
                for($i = 1; $i <= 7; $i++){
                    $fecha_dia = strtotime ( '+'.($i - 1).' day' , strtotime ( $fecha_lunes ) ) ;
                    $num_dia = date ( 'd' , $fecha_dia );
                    $num_mes = date ( 'm' , $fecha_dia );
                    $num_anio = date ( 'Y' , $fecha_dia );?>
                    <button data-id="<?php echo $i;?>" data-dia="<?php echo $num_dia;?>" data-mes="<?php echo mesesLetras($num_mes);?>" data-nmes="<?php echo $num_mes;?>" data-anio="<?php echo $num_anio;?>" type="button" class="btn btn-default form-control otros-dias <?php if(date('N') == $i){echo "active";} ?>" <?php if($i == 1){echo 'id="dia-primero"';}elseif($i == 7){echo 'id="dia-ultimo"';} ?>>
                        <span class="nom-dia"><?php echo diasTodos($i);?></span><?php 
                        // echo $datostarea;
                        if(($datostarea) && (in_array($i, $datostarea))){?>
                            <span class="pull-right eventos bgreen"><?php //echo count(array_keys($datostarea,$i));?>&nbsp;</span><?php 
                        }
                        if(($datosclasi) && (in_array($i, $datosclasi))){?>
                            <span class="pull-right eventos borange"><?php //echo count(array_keys($datosclasi,$i));?>&nbsp;</span><?php 
                        }
                        if(($datoscircu) && (in_array($i, $datoscircu))){?>
                            <span class="pull-right eventos bred"><?php //echo count(array_keys($datoscircu,$i));?>&nbsp;</span><?php 
                        }
                        if(($datosevent) && (in_array($i, $datosevent))){?>
                            <span class="pull-right eventos bblue"><?php //echo count(array_keys($datosevent,$i));?>&nbsp;</span><?php 
                        }?>
                    </button>
                <?php }?>
            </div>
        </div>
        <!-- Espacio entre la fecha con los dias de la semana y los accesos a otros -->
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">&nbsp;</div>
        <!-- div con los accesos a otros modulos -->
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="padding:0;margin:0;">
            <!-- contenedor de quienes somos -->
            <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3" style="padding:0;margin:0;">
                <img src="../images/home-qui.png" class="img-responsive home-accesos" data-pag="quienes-somos" alt="Conozca quienes somos." title="Conozca quienes somos." style="width:97%;">
            </div>
            <!-- contenedor de imagenes de otros accesos -->
            <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9" style="padding:0;margin:0;">
                <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                    <img src="../images/home-cont.png" class="img-responsive home-accesos" data-pag="contactos" alt="Revise los contactos en su entorno de vivienda" title="Revise los contactos en su entorno de vivienda" style="width:100%;">
                    <div>&nbsp;</div>
                </div>
                <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                    <img src="../images/home-eme.png" class="img-responsive home-accesos" data-pag="contactos" alt="Obtenga los telefonos de entidades y sistemas de emergencia" title="Obtenga los telefonos de entidades y sistemas de emergencia" style="width:100%;">
                    <div>&nbsp;</div>
                </div>
                <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                    <img src="../images/home-tes.png" class="img-responsive home-accesos" data-pag="estado-financiero" alt="Revise su estado finaciero" title="Revise su estado finaciero" style="width:100%;">
                    <div>&nbsp;</div>
                </div>
                <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                    <img src="../images/home-men.png" class="img-responsive home-accesos" data-pag="mensajes" alt="Revise los mensajes enviados y/o recibidos" title="Revise los mensajes enviados y/o recibidos" style="width:100%;">
                    <div>&nbsp;</div>
                </div>
                <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                    <img src="../images/home-con.png" class="img-responsive home-accesos" data-pag="consumos" alt="Entérese de los consumos de servicios públicos de su conjunto." title="Entérese de los consumos de servicios públicos de su conjunto." style="width:100%;">
                    <div>&nbsp;</div>
                </div>
                <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                    <img src="../images/home-doc.png" class="img-responsive home-accesos" data-pag="documentos" alt="Consulte los documentos de interés" title="Consulte los documentos de interés" style="width:100%;">
                    <div>&nbsp;</div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">&nbsp;</div>
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">&nbsp;</div>
<script>
    cargarHome();
    $('.carousel').carousel();
</script>
