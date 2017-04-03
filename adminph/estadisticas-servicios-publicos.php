<?php session_start();
require_once ("../conexion/conexion.php");
require_once ("../php/funciones.php");
//////////////////////////////////////////////////////////////////////////////////////
// Aplicación PHP usando Bootstrap, jquery, HTML5 y CSS - PH                        //
// Copyright 2014 Wilson Giovanny Velandia Barreto 3204274564 - willyv78@gmail.com  //
//////////////////////////////////////////////////////////////////////////////////////
// id de l usuario que se encuenta logueado
$id_usu = $_SESSION['UsuID'];
// array de colores para utilizar en las graficas de acuerdo a su contenido
$array_color = ["#FF5A5E", "#5AD3D1", "#BA44BA", "#54D955", "white", "black", "yellow", "red", "green", "pink"];

$where = "";
$serv_tipo = 1; // Por default el tipo de servicio es agua
if(isset($_POST['serv_tipo'])){
    $serv_tipo = $_POST['serv_tipo'];
}

// Inciamos las variables de la fecha inicial con la fecha actual por defecto
$fecha_actual = new DateTime("NOW");
$fecha_get_ini = "";
$fecha_get_fin = "";
// Obtenemos el ultimo del dia del mes actual
$fecha_hoy = new DateTime("NOW");
// Si se envia la fecha de inicio hace esto
if(isset($_GET['serv_fini'])){
    $fecha_actual = new DateTime($_GET['serv_fini']);
    $fecha_get_ini = $_GET['serv_fini'];
}
// Si se envia la fecha final hace esto
if(isset($_GET['serv_ffin'])){
    $fecha_hoy = new DateTime($_GET['serv_ffin']);
    $fecha_get_fin = $_GET['serv_ffin'];
}
// Obtenemos el primer dia del mes que se calcula restando 6 meses al actual
$fecha_seismeses = $fecha_actual->modify('-6 month');
$fecha_primerdia = $fecha_seismeses->modify('first day of this month');
$seismeses_dia = $fecha_primerdia->format('d');
$seismeses_mes = $fecha_primerdia->format('m');
$seismeses_anio = $fecha_primerdia->format('Y');
$serv_fini = $fecha_primerdia->format("Y-m-d");
// Obtenemos el ultimo del dia del mes actual
$fecha_ultimodia = $fecha_hoy->modify('last day of this month');
$ultimo_dia = $fecha_ultimodia->format('d');
$ultimo_mes = $fecha_ultimodia->format('m');
$ultimo_anio = $fecha_ultimodia->format('Y');
$serv_ffin = $fecha_ultimodia->format('Y-m-d');
$where .= " AND (DATE_FORMAT(s.rmb_servicios_fini,'%Y-%m-%d') >= '$serv_fini' AND DATE_FORMAT(s.rmb_servicios_ffin,'%Y-%m-%d') <= '$serv_ffin')";

// consulta de servicios públicos registrados
$res_gen = registroCampo("rmb_servicios s", "s.rmb_servicios_id, s.rmb_serviciostipo_id, ts.rmb_serviciostipo_nom, s.rmb_servicios_valor, s.rmb_servicios_fini, s.rmb_servicios_ffin, s.rmb_servicios_fopo, s.rmb_servicios_fult, s.rmb_servicios_fpag, s.rmb_servicios_consumo", "LEFT JOIN rmb_serviciostipo ts USING(rmb_serviciostipo_id) WHERE s.rmb_servicios_fecha <> '' $where", "", "ORDER BY s.rmb_servicios_fini ASC");
// Inicializamos las variables que se pasaran a la grafica
$agua = 0;
$cons_agua = array();
$val_agua = array();
$mes_agua = array();
$luz = 0;
$cons_luz = array();
$val_luz = array();
$mes_luz = array();
$gas = 0;
$cons_gas = array();
$val_gas = array();
$mes_gas = array();
$tele = 0;
$cons_tele = array();
$val_tele = array();
$mes_tele = array();
$total_valor = 0;
$total_cons = 0;
// si la consulta es correcta hace esto
if($res_gen){
    // si se encontraron resultados hace esto
    if(mysql_num_rows($res_gen) > 0){
        // para cada registro hace esto
        while($row_gen = mysql_fetch_array($res_gen)){
            // obtenemos el nombre del mes que se factura
            $mes_mini = mesesLetras(date('m', strtotime($row_gen[4])));
            // Si el tipo de servicio es agua hace esto
            if($row_gen[1] == 1){
                array_push($cons_agua, intval($row_gen[9]));
                array_push($val_agua, intval($row_gen[3]));
                $mes_mfin = mesesLetras(date('m', strtotime($row_gen[5])));
                array_push($mes_agua, $mes_mini." - ".$mes_mfin);
                $agua += 1;
            }
            // Si el tipo de servicio es luz hace esto
            elseif($row_gen[1] == 2){
                $cons_luz[] = intval($row_gen[9]);
                $val_luz[] = intval($row_gen[3]);
                $mes_luz[] = $mes_mini;
                $luz += 1;
            }
            // Si el tipo de servicio es gas hace esto
            elseif($row_gen[1] == 3){
                $cons_gas[] = intval($row_gen[9]);
                $val_gas[] = intval($row_gen[3]);
                $mes_gas[] = $mes_mini;
                $gas += 1;
            }
            // Si el tipo de servicio es teléfono hace esto
            elseif($row_gen[1] == 4){
                $cons_tele[] = intval($row_gen[9]);
                $val_tele[] = intval($row_gen[3]);
                $mes_tele[] = $mes_mini;
                $tele += 1;
            }
        }
    }
}?>
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12"><br>
    <div class="col-xs-12 col-sm-12 col-md-offset-1 col-md-10 col-lg-offset-2 col-lg-8">
        <form action="" method="POST" role="form">
            <div class="form-group">
                <div class="col-xs-4 col-sm-2 col-md-2 col-lg-2 text-right">
                    <label for="serv_fini" style="    margin-bottom: -10px;">Fecha desde:</label>
                </div>
                <div class="col-xs-6 col-sm-3 col-md-3 col-lg-3">
                    <input type="text" class="form-control" id="serv_fini" name="serv_fini" placeholder="dd-mm-aaaa" value="<?php echo $fecha_get_ini;?>">
                </div>
                <div class="col-xs-4 col-sm-2 col-md-2 col-lg-2 text-right">
                    <label for="serv_ffin" style="    margin-bottom: -10px;">Fecha hasta:</label>
                </div>
                <div class="col-xs-6 col-sm-3 col-md-3 col-lg-3">
                    <input type="text" class="form-control" id="serv_ffin" name="serv_ffin" placeholder="dd-mm-aaaa" value="<?php echo $fecha_get_fin;?>">
                </div>
                <div class="col-xs-12 col-sm-2 col-md-2 col-lg-2">
                    <button type="button" class="btn btn-primary">Generar</button>
                </div>
            </div>
            <div class="clearfix">&nbsp;</div>
        </form>
    </div>
    <div class="clearfix">&nbsp;</div>
    <div class="clearfix">&nbsp;</div>
    <!-- Agua -->
    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" id="myChart1">
            <div class="grafico-estadistico" id="container1"></div>
        </div>
        <div class="clearfix">&nbsp;</div>
        <div class="clearfix">&nbsp;</div>
    </div>
    <!-- Luz -->
    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" id="myChart2">
            <div class="grafico-estadistico" id="container2"></div>
        </div>
        <div class="clearfix">&nbsp;</div>
        <div class="clearfix">&nbsp;</div>
    </div>
    <div class="clearfix"></div>
    <hr>
    <!-- GAS -->
    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" id="myChart3">
            <div class="grafico-estadistico" id="container3"></div>
        </div>
        <div class="clearfix">&nbsp;</div>
        <div class="clearfix">&nbsp;</div>
    </div>
    <!-- Teléfono -->
    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" id="myChart4">
            <div class="grafico-estadistico" id="container4"></div>
        </div>
        <div class="clearfix">&nbsp;</div>
        <div class="clearfix">&nbsp;</div>
    </div>
    <hr>
    <div class="clearfix"></div>
</div>
<script src="../js/jquery.min.js"></script>
<script src="../js/bootstrap-datepicker.js"></script>
<script>
    $(document).ready(function() {
        var chart = "";
        var chart2 = "";
        var chart3 = "";
        var chart4 = "";
        // vaciamos el contenido de los div que contienen los graficos
        $(".grafico-estadistico").html("");
        // funcion que genera el grafico de genero por rango de edad
        function chartAgua () {
            // asignamos el array de las preguntas con su valor
            var mes_agua = '<?php echo json_encode($mes_agua);?>';
            // convertimos el array php  array javascript
            var array_mes = JSON.parse(mes_agua);
            // asignamos el array de las preguntas con su valor
            var cons_agua = '<?php echo json_encode($cons_agua);?>';
            // convertimos el array php  array javascript
            var array_cons = JSON.parse(cons_agua);
            chart = new Highcharts.Chart({
                chart: {
                    renderTo: 'container1',
                    type: 'column',
                    margin: 75,
                    backgroundColor: '#FFFFFF',
                    options3d: {
                        enabled: false,
                        alpha: 15,
                        beta: 15,
                        depth: 50,
                        viewDistance: 25,
                        frame: {
                            back: {
                                color: '#F7F7F7',
                                size: 2
                            },
                            bottom: {
                                color: '#F7F7F7',
                                size: 3
                            },
                            side: {
                                color: '#F7F7F7',
                                size: 1
                            }
                        }
                    }
                },
                // tabla de descripcion de elementos
                legend: {
                    margin: 5,
                    align: 'left',
                    borderWidth: 1,
                    padding: 10
                },
                // titulo del grafico
                title: {
                    text: 'Datos de consumo de Agua'
                },
                // Subtitulo del grafico
                subtitle: {
                    text: 'Consumo de los últimos 6 meses en M3.'
                },
                // titulos de los valores del eje x
                xAxis: {
                    title: {
                        text: 'Periodos',
                        rotation: 0,
                        margin: 20,
                        align: 'middle'
                    },
                    categories: array_mes
                },
                yAxis: {
                    title: {
                        text: 'Metros Cúbicos',
                        rotation: -90,
                        margin: 20
                    }
                },
                tooltip: {
                    headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                    pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                        '<td style="padding:0"><b>{point.y}</b></td></tr>',
                    footerFormat: '</table>',
                    shared: true,
                    useHTML: true
                },
                // Propiedades de la columna
                plotOptions: {
                    column: {
                        dataLabels: {
                            enabled: true,
                            color: 'grey',
                            style: {
                                // textShadow: '0 0 3px grey'
                            }
                        }
                    },
                    series: {
                        events: {
                            legendItemClick: function () {
                                return false;
                            }
                        }
                    }
                },
                series: [
                    // Datos y configuracion de las mujeres
                    {
                        name: 'Agua',
                        data: array_cons,
                        color: '#5AD3D1'
                    }
                ]
            });
        }
        // funcion que genera el grafico de mascotas por tipo de mascota
        function chartLuz () {
            // asignamos el array de las preguntas con su valor
            var mes_luz = '<?php echo json_encode($mes_luz);?>';
            // convertimos el array php  array javascript
            var array_mes = JSON.parse(mes_luz);
            // asignamos el array de las preguntas con su valor
            var cons_luz = '<?php echo json_encode($cons_luz);?>';
            // convertimos el array php  array javascript
            var array_cons = JSON.parse(cons_luz);
            chart = new Highcharts.Chart({
                chart: {
                    renderTo: 'container2',
                    type: 'column',
                    margin: 75,
                    backgroundColor: '#FFFFFF',
                    options3d: {
                        enabled: false,
                        alpha: 15,
                        beta: 15,
                        depth: 50,
                        viewDistance: 25,
                        frame: {
                            back: {
                                color: '#F7F7F7',
                                size: 2
                            },
                            bottom: {
                                color: '#F7F7F7',
                                size: 3
                            },
                            side: {
                                color: '#F7F7F7',
                                size: 1
                            }
                        }
                    }
                },
                // tabla de descripcion de elementos
                legend: {
                    margin: 5,
                    align: 'left',
                    borderWidth: 1,
                    padding: 10
                },
                // titulo del grafico
                title: {
                    text: 'Datos de consumo de Luz'
                },
                // Subtitulo del grafico
                subtitle: {
                    text: 'Consumo de los últimos 6 meses en KWH.'
                },
                // titulos de los valores del eje x
                xAxis: {
                    title: {
                        text: 'Periodos',
                        rotation: 0,
                        margin: 20,
                        align: 'middle'
                    },
                    categories: array_mes
                },
                yAxis: {
                    title: {
                        text: 'Kilovatio hora',
                        rotation: -90,
                        margin: 20
                    }
                },
                tooltip: {
                    headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                    pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                        '<td style="padding:0"><b>{point.y}</b></td></tr>',
                    footerFormat: '</table>',
                    shared: true,
                    useHTML: true
                },
                // Propiedades de la columna
                plotOptions: {
                    column: {
                        dataLabels: {
                            enabled: true,
                            color: 'grey',
                            style: {
                                // textShadow: '0 0 3px grey'
                            }
                        }
                    },
                    series: {
                        events: {
                            legendItemClick: function () {
                                return false;
                            }
                        }
                    }
                },
                series: [
                    // Datos y configuracion de las mujeres
                    {
                        name: 'Luz',
                        data: array_cons,
                        color: '#FF8D04'
                    }
                ]
            });
        }
        // funcion que genera el grafico de mascotas por tipo de mascota
        function chartGas () {
            // asignamos el array de las preguntas con su valor
            var mes_gas = '<?php echo json_encode($mes_gas);?>';
            // convertimos el array php  array javascript
            var array_mes = JSON.parse(mes_gas);
            // asignamos el array de las preguntas con su valor
            var cons_gas = '<?php echo json_encode($cons_gas);?>';
            // convertimos el array php  array javascript
            var array_cons = JSON.parse(cons_gas);

            chart = new Highcharts.Chart({
                chart: {
                    renderTo: 'container3',
                    type: 'column',
                    margin: 75,
                    backgroundColor: '#FFFFFF',
                    options3d: {
                        enabled: false,
                        alpha: 15,
                        beta: 15,
                        depth: 50,
                        viewDistance: 25,
                        frame: {
                            back: {
                                color: '#F7F7F7',
                                size: 2
                            },
                            bottom: {
                                color: '#F7F7F7',
                                size: 3
                            },
                            side: {
                                color: '#F7F7F7',
                                size: 1
                            }
                        }
                    }
                },
                // tabla de descripcion de elementos
                legend: {
                    margin: 5,
                    align: 'left',
                    borderWidth: 1,
                    padding: 10
                },
                // titulo del grafico
                title: {
                    text: 'Datos de consumo de GAS'
                },
                // Subtitulo del grafico
                subtitle: {
                    text: 'Consumo de los últimos 6 meses en M3.'
                },
                // titulos de los valores del eje x
                xAxis: {
                    title: {
                        text: 'Periodos',
                        rotation: 0,
                        margin: 20,
                        align: 'middle'
                    },
                    categories: array_mes
                },
                yAxis: {
                    title: {
                        text: 'Metros Cúbicos',
                        rotation: -90,
                        margin: 20
                    }
                },
                tooltip: {
                    headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                    pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                        '<td style="padding:0"><b>{point.y}</b></td></tr>',
                    footerFormat: '</table>',
                    shared: true,
                    useHTML: true
                },
                // Propiedades de la columna
                plotOptions: {
                    column: {
                        dataLabels: {
                            enabled: true,
                            color: 'grey',
                            style: {
                                // textShadow: '0 0 3px grey'
                            }
                        }
                    },
                    series: {
                        events: {
                            legendItemClick: function () {
                                return false;
                            }
                        }
                    }
                },
                series: [
                    // Datos y configuracion de las mujeres
                    {
                        name: 'GAS',
                        data: array_cons,
                        color: '#ECE900'
                    }
                ]
            });
        }
        // funcion que genera el grafico de numero de propietarios, arrendatarios, otros
        function chartTelefono () {
            // asignamos el array de las preguntas con su valor
            var mes_tele = '<?php echo json_encode($mes_tele);?>';
            // convertimos el array php  array javascript
            var array_mes = JSON.parse(mes_tele);
            // asignamos el array de las preguntas con su valor
            var cons_tele = '<?php echo json_encode($cons_tele);?>';
            // convertimos el array php  array javascript
            var array_cons = JSON.parse(cons_tele);

            chart = new Highcharts.Chart({
                chart: {
                    renderTo: 'container4',
                    type: 'column',
                    margin: 75,
                    backgroundColor: '#FFFFFF',
                    options3d: {
                        enabled: false,
                        alpha: 15,
                        beta: 15,
                        depth: 50,
                        viewDistance: 25,
                        frame: {
                            back: {
                                color: '#F7F7F7',
                                size: 2
                            },
                            bottom: {
                                color: '#F7F7F7',
                                size: 3
                            },
                            side: {
                                color: '#F7F7F7',
                                size: 1
                            }
                        }
                    }
                },
                // tabla de descripcion de elementos
                legend: {
                    margin: 5,
                    align: 'left',
                    borderWidth: 1,
                    padding: 10
                },
                // titulo del grafico
                title: {
                    text: 'Datos de consumo de Teléfono'
                },
                // Subtitulo del grafico
                subtitle: {
                    text: 'Consumo de los últimos 6 meses en Minutos.'
                },
                // titulos de los valores del eje x
                xAxis: {
                    title: {
                        text: 'Periodos',
                        rotation: 0,
                        margin: 20,
                        align: 'middle'
                    },
                    categories: array_mes
                },
                yAxis: {
                    title: {
                        text: 'Minutos',
                        rotation: -90,
                        margin: 20
                    }
                },
                tooltip: {
                    headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                    pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                        '<td style="padding:0"><b>{point.y}</b></td></tr>',
                    footerFormat: '</table>',
                    shared: true,
                    useHTML: true
                },
                // Propiedades de la columna
                plotOptions: {
                    column: {
                        dataLabels: {
                            enabled: true,
                            color: 'grey',
                            style: {
                                // textShadow: '0 0 3px grey'
                            }
                        }
                    },
                    series: {
                        events: {
                            legendItemClick: function () {
                                return false;
                            }
                        }
                    }
                },
                series: [
                    // Datos y configuracion de las mujeres
                    {
                        name: 'Teléfono',
                        data: array_cons,
                        color: '#FF5A5E'
                    }
                ]
            });
        }
        var agua = '<?php echo $agua;?>';
        var luz = '<?php echo $luz;?>';
        var gas = '<?php echo $gas;?>';
        var tele = '<?php echo $tele;?>';
        if(agua > 0){
            chartAgua ();
        }
        if(luz > 0){
            chartLuz ();
        }
        if(gas > 0){
            chartGas ();
        }
        if(tele > 0){
            chartTelefono ();
        }
        cargarEstadisticas();
        $('#serv_fini').datepicker({format: "yyyy-mm-dd", autoclose: true});
        $('#serv_ffin').datepicker({format: "yyyy-mm-dd", autoclose: true});
    });
</script>