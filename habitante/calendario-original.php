<?php session_start();
require_once ("../conexion/conexion.php");
require_once ("../php/funciones.php");
//////////////////////////////////////////////////////////////////////////////////////
// Aplicación PHP usando jquery, HTML5 y CSS - PH                                   //
// Copyright 2014 Wilson Giovanny Velandia Barreto 3204274564 - willyv78@gmail.com  //
//////////////////////////////////////////////////////////////////////////////////////
$id_usu = $_SESSION['UsuID'];
$datoscal = array();
$datosevent = array();
$datoscircu = array();
$datosclasi = array();
$calend = DatosCalendario($id_usu, 1);
if($calend){
    if(mysql_num_rows($calend) > 0){
        while ($row_calend = mysql_fetch_array($calend)){
            $dt = strtotime($row_calend[5]);
            $fecha_cal = date("m-d-Y", $dt);
            if($row_calend[2] == '1'){
                $class = "fc-event1";
            }
            else if($row_calend[2] == '2'){
                $class = "fc-event2";
            }
            else{
                $class = "fc-event3";
            }
            if (array_key_exists($fecha_cal, $datoscal)){
                $datoscal[$fecha_cal] = $datoscal[$fecha_cal]."<a id='".$row_calend[0]."' class='".$class."'>".$row_calend[3]."</a>";
            }
            else{
                $datoscal[$fecha_cal] = "<a id='".$row_calend[0]."' class='".$class."'>".$row_calend[3]."</a>";
            }
            if($row_calend[7] <> '15'){
                if($row_calend[18] <> ''){
                    $img = campoTabla($row_calend[18], "rmb_icono", "rmb_icono_img");
                    $src = $img;
                }
                else{$src = imagenDefault();}
                if($row_calend[2] == '1'){
                    $datosevent[$row_calend[5]] = "<img id='vistaPrevia' src='".$src."' width='50px' height='50px' style='padding:10px;border-radius:5px;'/><strong>- ".$row_calend[3]."</strong>";
                }
                else if($row_calend[2] == '2'){
                    $datoscircu[$row_calend[5]] = "<img id='vistaPrevia' src='".$src."' width='50px' height='50px' style='padding:10px;border-radius:5px;'/><strong>- ".$row_calend[3]."</strong>";
                }
                else{
                    $datosclasi[$row_calend[5]] = "<img id='vistaPrevia' src='".$src."' width='50px' height='50px' style='padding:10px;border-radius:5px;'/><strong>- ".$row_calend[3]."</strong>";
                }
            }
        }
    }
}
?>
<div id="calendario_res">
    <p id="titulo">CALENDARIO</p>
    <p id="texto">Aquí encontrará los eventos relativos al edificio. <br /></p>
    <div id="dodecalendario" class="clearfix">
        <div id="iframe">
            <div class="container"> 
                <div class="custom-calendar-wrap custom-calendar-full">
                    <div class="custom-header clearfix">                    
                        <h3 class="custom-month-year">
                            <span id="custom-month" class="custom-month"></span>
                            <span id="custom-year" class="custom-year"></span>
                        </h3>
                        <nav>
                            <span id="custom-prev" class="custom-prev"></span>
                            <span id="custom-next" class="custom-next"></span>
                            <span id="custom-current" class="custom-current" title="Ir a Hoy"></span>
                        </nav>
                    </div>
                    <div id="calendar" class="fc-calendar-container"></div>
                </div>
            </div><!-- /container -->
        </div>
    </div>
    <div id="eventos" class="clearfix">
        <p id="tituloevento">EVENTOS<br /></p>
        <p id="cuerpoevento"><?php 
            if($datosevent <> ''){
                $n_event = 0;
                foreach ($datosevent as $key => $value){
                    if($n_event <= 2){?>
                        <span class="textspan">
                            <?php echo "<strong>".$key."</strong><br>".$value;?>
                        </span><br /><?php
                    }
                    $n_event ++;
                }
            }?>        
        </p>
    </div>
    <div id="circulares" class="clearfix">
        <p id="textocircular">CIRCULARES<br /></p>
        <p id="cuerpocircular"><?php 
            if($datoscircu <> ''){
                $n_circu = 0;
                foreach ($datoscircu as $key => $value){
                    if($n_circu <= 2){?>
                        <span class="textspan1">
                            <?php echo "<strong>".$key."</strong><br>".$value;?>
                        </span><br /><?php
                    }
                    $n_circu ++;
                }
            }?>
        </p>
    </div>
    <div id="clasificados" class="clearfix">
        <p id="textoclasificado">CLASIFICADOS<br /></p>
        <p id="cuerpoclasificado"><?php 
            if($datosclasi <> ''){
                $n_clasi = 0;
                foreach ($datosclasi as $key => $value){
                    if($n_clasi <= 2){?>
                    <span class="textspan2">
                        <?php echo "<strong>".$key."</strong><br>".$value;?>
                    </span><br /><?php
                    }
                    $n_clasi ++;
                }
            }?>
        </p>
    </div>
</div>
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script type="text/javascript" src="../js/jquery.calendario.js"></script>
<SCRIPT TYPE="text/javascript">
    //funcion para calendario
    $(function() {
        var codropsEvents = <?php echo json_encode($datoscal); ?>;
        var cal = $('#calendar').calendario({
            onEventClick : function( $el, $contentEl, dateProperties ) {
                var id_evento = dateProperties[ 'id_evento' ];
                $("#content_res").load("ver_evento.php?id_event="+id_evento);
                console.log(id_evento);
            },
            /*onDayClick : function( $el, $contentEl, dateProperties ) {
                if(dateProperties['day'].length < 2){var day = "0"+dateProperties['day'];}
                else{var day = dateProperties['day'];}
                var month = dateProperties['month'];
                if(month < 10){month = "0"+month;}
                var fecha_click = dateProperties[ 'year' ]+"-"+month+"-"+day;
                $("#content_res").load("ver_evento.php?fecha_ini="+fecha_click);
                console.log(fecha_click);
            },*/
            caldata : codropsEvents
        }),
        $month = $( '#custom-month' ).html( cal.getMonthName() ),
        $year = $( '#custom-year' ).html( cal.getYear() );
        $( '#custom-next' ).on( 'click', function() {
            cal.gotoNextMonth( updateMonthYear );
        } );
        $( '#custom-prev' ).on( 'click', function() {
            cal.gotoPreviousMonth( updateMonthYear );
        } );
        $( '#custom-current' ).on( 'click', function() {
            cal.gotoNow( updateMonthYear );
        } );
        function updateMonthYear() {                
            $month.html( cal.getMonthName() );
            $year.html( cal.getYear() );
        }       
    });
</SCRIPT>
<script type="text/javascript" src="../js/habitante.js"></script>