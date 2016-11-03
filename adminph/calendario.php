<?php session_start();
require_once ("../conexion/conexion.php");
require_once ("../php/funciones.php");
//////////////////////////////////////////////////////////////////////////////////////
// Aplicación PHP usando Bootstrap, jquery, HTML5 y CSS - PH                        //
// Copyright 2014 Wilson Giovanny Velandia Barreto 3204274564 - willyv78@gmail.com  //
//////////////////////////////////////////////////////////////////////////////////////
$id_usu = $_SESSION['UsuID'];
$datoscal = array();
$datosevent = array();
$datoscircu = array();
$datosclasi = array();
$res = DatosCalendario($id_usu, 1);

$array_events = "";
if($res){
	if(mysql_num_rows($res) > 0){
		$sq = 1;
		while($row = mysql_fetch_array($res)){
			$id = $row[0];
			$nom = $row[1];
            $proy = $row[2];
            $cont = $row[3];
			$tipo = $row[4];
            $est = $row[5];
			$fini = str_replace(" ", "T", $row[9]);
			$ffin = str_replace(" ", "T", $row[16]);;
            $user = $row[19];
			if($tipo == '1'){
				$array_events .= "{id:".$id.", title:'".$nom."', start:'".$fini."', end:'".$ffin."', className:'".$user."', color:'#257e4a', backgroundColor:'#337ab7'}";

			}
			elseif($tipo == '2'){
                $array_events .= "{id:".$id.", title:'".$nom."', start:'".$fini."', end:'".$ffin."', className:'".$user."', color:'#257e4a', backgroundColor:'#d9534f'}";
			}
			elseif($tipo == '3'){
				$array_events .= "{id:".$id.", title:'".$nom."', start:'".$fini."', end:'".$ffin."', className:'".$user."', color:'#257e4a', backgroundColor:'#f0ad4e'}";
			}
            else{
                $array_events .= "{id:".$id.", title:'".$nom."', start:'".$fini."', end:'".$ffin."', className:'".$user."', color:'#257e4a', backgroundColor:'#5cb85c'}";
            }
			if($sq < mysql_num_rows($res)){$array_events .= ",";}
			$sq++;
		}
	}
}
$evetos_base = json_encode($array_events);
if(isset($_GET['tipo'])){$tipo = $_GET['tipo'];}
else{$tipo = 1;}
if(isset($_GET['date'])){
    $dates = date('Y-m-d', strtotime($_GET['date']));
}
else{$dates = "";}
?>
<!-- Titulo de la pagina -->
<!-- <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 titulo-pagina">
   <h3 class="text-left">Calendario</h3>
</div> -->
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="z-index:1000">
	<div class="widget"></div>
    <input class="form-control" type="hidden" id="tipo_cal" value="<?php echo $tipo;?>">
	<div id='calendar'></div>
</div>
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
    <br>
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 text-right">
          <div class="mens-est-nom bgreen"></div>
          <span>Tareas&nbsp;</span>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 text-right">
          <div class="mens-est-nom borange"></div>
          <span>Clasificados&nbsp;</span>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 text-right">
          <div class="mens-est-nom bblue"></div>
          <span>Eventos&nbsp;</span>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 text-right">
          <div class="mens-est-nom bred"></div>
          <span>Circulares&nbsp;</span>
        </div>
    </div>
</div>
<script src="../js/jquery.min.js"></script>
<script src='../js/moment.min.js'></script>
<script src='../js/fullcalendar.js'></script>
<script src='../js/lang-all.js'></script>
<script src='../js/gcal.js'></script>
<script>
    $(document).ready(function() {
        var altopag = resizePag();
        var eventos = [<?php echo $array_events;?>];
        var dates = '<?php echo $dates;?>';
        if(dates.length < 1){var dates = new Date();}
        else{
            dates = dates.replace(/ /g, ',T');
            dates = new Date(dates);
        }
        dateString = dates;
        var currentLangCode = 'es';
        $('#calendar').fullCalendar({
            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'month,agendaWeek,agendaDay'
            },
            defaultDate: dateString,
            lang: currentLangCode,
            buttonIcons: true, // show the prev/next text
            weekNumbers: false,
            businessHours: false, // display business hours
            displayEventStart: false,
            displayEventEnd: false,
            eventLimit: true,
            editable: false,
            events: eventos,
            dayClick: function(date, jsEvent, view) {
                var tipocal = $("#tipo_cal").val();
                var si = "";
                if(tipocal === '1'){var tip_evento = "1";}
                else if(tipocal === '2'){var tip_evento = "2";}
                else if(tipocal === '3'){var tip_evento = "3";}
                else{var tip_evento = "4";}
                var ini_evento = date.format();
                $(".ing-cal").load("detalle-evento-calendario.php?tipo="+tip_evento+"&start="+ini_evento);
                $(".ing-cal").height(altopag);
                $(".ing-cal").removeClass('hidden');
            },
            eventClick: function(calEvent, jsEvent, view) {
                var tipocal = $("#tipo_cal").val();
                var si = "";
                var className = calEvent.className;
                if(parseInt(className) === parseInt(sess_id)){
                    var ini_evento = calEvent.start.format();
                    swal({
                        title: "¿Que desea hacer?",
                        text: "Eliminar el evento o editarlo",
                        type: "warning",
                        showCancelButton: true,
                        cancelButtonText: "Eliminar",
                        confirmButtonColor: "#F89406",
                        confirmButtonText: "Editar!",
                        closeOnConfirm: true
                    },
                    function(isConfirm){
                        if (isConfirm) {
                            $(".ing-cal").load("detalle-evento-calendario.php?id="+calEvent.id);
                            $(".ing-cal").height(altopag);
                            $(".ing-cal").removeClass('hidden');
                        }
                        else {
                            $.ajax({
                                url:"../php/ins_cal.php",
                                cache:false,
                                type:"POST",
                                data:"id_sup="+calEvent.id,
                                success: function(datos){
                                    if(datos !== ''){
                                        swal({
                                            title: "Felicidades!",
                                            text: "El registro se ha eliminado correctamente!",
                                            type: "success",
                                            confirmButtonText: "Continuar",
                                            confirmButtonColor: "#94B86E"
                                        });
                                    }
                                    else{
                                        swal({
                                            title: "Error!",
                                            text: "Ha ocurrido un error,\nNo se ha realizado cambios,\nrevise la información diligenciada he intentelo nuevamente.",
                                            type: "error",
                                            confirmButtonText: "Aceptar",
                                            confirmButtonColor: "#E25856"
                                        });
                                        return;
                                    }
                                    $("#col-md-12").load("calendario.php?tipo="+tipocal+"&date="+calEvent.start.format());
                                }
                            });
                        }
                    });
                }
                else{
                    $(".ing-cal").load("detalle-evento-calendario.php?id="+calEvent.id);
                    $(".ing-cal").height(altopag);
                    $(".ing-cal").removeClass('hidden');
                }
            }
        });
        cargarCalendario();
    });
</script>
