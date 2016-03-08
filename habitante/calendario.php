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
if(isset($_GET['date'])){$dates = date('m-d-Y H:i', strtotime($_GET['date']));}
else{$dates = "";}
// echo $evetos_base;
?>
<!-- Titulo de la pagina -->
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 titulo-pagina">
   <h3 class="text-left">Calendario</h3>
</div>
<div class="widget"></div>
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="z-index:1000">
    <input class="form-control" type="hidden" id="tipo_cal" value="<?php echo $tipo;?>">
    <div class="widget"></div>
    <div class="widget visible-xs-*"></div>
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div id='calendar'></div>
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <br>
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="col-xs-6 col-sm-3 col-md-6 col-lg-3 text-right">
                    <div class="mens-est-nom btn-danger"></div>
                    <span>Circulares&nbsp;</span>
                </div>
                <div class="col-xs-6 col-sm-3 col-md-6 col-lg-3 text-right">
                    <div class="mens-est-nom btn-primary"></div>
                    <span>Eventos&nbsp;</span>
                </div>
                <div class="col-xs-6 col-sm-3 col-md-6 col-lg-3 text-right">
                    <div class="mens-est-nom btn-warning"></div>
                    <span>Clasificados&nbsp;</span>
                </div>
                <div class="col-xs-6 col-sm-3 col-md-6 col-lg-3 text-right">
                    <div class="mens-est-nom btn-success"></div>
                    <span>Tareas&nbsp;</span>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-left">
    <div class="alert alert-success">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <p><strong>¡Tenga en cuenta!</strong></p><p>Para agregar un nuevo Evento, Circular o Clasificado debe hacer click dentro del cuadro del día deseado, si hace click en un evento ya creado podrá editarlo o eliminarlo.</p>
    </div>
</div>


<script src="../js/jquery.min.js"></script>
<script src='../js/moment.min.js'></script>
<script src='../js/fullcalendar.js'></script>
<script src='../js/lang-all.js'></script>
<script src='../js/gcal.js'></script>
<script>
    var eventos = [<?php echo $array_events;?>];
    function dibujaCalendario() {
        var dates = '<?php echo $dates;?>';
        if(dates.length < 1){
            var dates = new Date();
        }
        else{
            dates = dates.replace(/\-/g, ',');
            dates = new Date(dates);
            
        }
        dateString = dates;
        // (date.getMonth() + 1) + "-" + date.getDate() + "-" + date.getFullYear().toString().substr(2,2);
        var currentLangCode = 'es';
        $('#calendar').fullCalendar({
            header: {
                left: 'title',
                center: '',
                right: 'prev,next today'
            },
            defaultDate: dateString,
            lang: currentLangCode,
            buttonIcons: true, // show the prev/next text
            weekNumbers: false,
            businessHours: false, // display business hours
            displayEventStart: false,
            displayEventEnd: false,
            eventLimit: true,
            editable: true,
            events: eventos,
            eventClick: function(calEvent, jsEvent, view) {
                // alert('Id: ' + calEvent.id);
                // alert('Title: ' + calEvent.title);
                // alert('Start: ' + calEvent.start.format());
                // alert('End: ' + calEvent.end.format());
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
                            $(".ing-cal").load("cal_det.php?id="+calEvent.id);
                            $(".ing-cal").removeClass('hidden');
                        }
                        else {
                            $.ajax({
                                url:"../php/ins_upd_cal.php",
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
                                    $("#col-md-12").load("cal.php?tipo="+tipocal+"&date="+calEvent.start.format());
                                }
                            });
                        }
                    });
                }
                else{
                    $(".ing-cal").load("cal_ver_evento.php?id="+calEvent.id+"&cal=1");
                    $(".ing-cal").removeClass('hidden');
                }
            }
        });
        cargarCalendario();
    }
    dibujaCalendario();
    // $(document).on('ready', dibujaCalendario);
</script>
