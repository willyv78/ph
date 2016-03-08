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

// consulta de hombre y mujeres registrados
$res_gen = registroCampo("rmb_residente_x_aptos rxa", "r.rmb_gen_id, YEAR(CURDATE()) - YEAR(r.rmb_residente_fnac) + IF(DATE_FORMAT(CURDATE(),'%m-%d') > DATE_FORMAT(r.rmb_residente_fnac,'%m-%d'), 0, -1) AS anios", "LEFT JOIN rmb_residente r USING(rmb_residente_id) WHERE rxa.rmb_tres_id = '1' OR rxa.rmb_tres_id = '2' OR rxa.rmb_tres_id = '3'", "", "ORDER BY r.rmb_residente_fnac DESC");
// Inicializamos las variables que se pasaran a la grafica
$n_hom_0a3 = 0;$n_muj_0a3 = 0;$n_hom_4a8 = 0;$n_muj_4a8 = 0;$n_hom_9a15 = 0;$n_muj_9a15 = 0;$n_hom_15a18 = 0;$n_muj_15a18 = 0;$n_hom_19a25 = 0;$n_muj_19a25 = 0;$n_hom_26a40 = 0;$n_muj_26a40 = 0;$n_hom_41a65 = 0;$n_muj_41a65 = 0;$n_hom_66 = 0;$n_muj_66 = 0;$n_hom_total = 0;$n_muj_total = 0;
// si la consulta es correcta hace esto
if($res_gen){
    // si se encontraron resultados hace esto
    if(mysql_num_rows($res_gen) > 0){
        // para cada registro hace esto
        while($row_gen = mysql_fetch_array($res_gen)){
            // si la edad de la persona es menor a 4 años hace esto
            if($row_gen[1] < 4){
                // si la persona es hombre
                if($row_gen[0] == '1'){
                    $n_hom_0a3 += 1;
                }
                // si es mujer
                else{
                    $n_muj_0a3 += 1;
                }
            }
            // si la edad de la personaes mayor o tiene 4 y es menor a 9 años hace esto
            elseif(($row_gen[1] >= 4) && ($row_gen[1] < 9)){
                // si es hombre
                if($row_gen[0] == '1'){
                    $n_hom_4a8 += 1;
                }
                // si es mujer
                else{
                    $n_muj_4a8 += 1;
                }
            }
            // si la edad de la persona es mayor o tiene 9 y es menor a 15 años hace esto
            elseif(($row_gen[1] >= 9) && ($row_gen[1] < 15)){
                // si es hombre
                if($row_gen[0] == '1'){
                    $n_hom_9a15 += 1;
                }
                // si es mujer
                else{
                    $n_muj_9a15 += 1;
                }
            }
            // si la persona es mayor o tiene 15 y es menor a 19 años hace esto
            elseif(($row_gen[1] >= 15) && ($row_gen[1] < 19)){
                // si es hombre
                if($row_gen[0] == '1'){
                    $n_hom_15a18 += 1;
                }
                // si es mujer
                else{
                    $n_muj_15a18 += 1;
                }
            }
            // si la persona es mayor o tiene 19 y es menor a 26 años hace esto
            elseif(($row_gen[1] >= 19) && ($row_gen[1] < 26)){
                // si es hombre
                if($row_gen[0] == '1'){
                    $n_hom_19a25 += 1;
                }
                // si es mujer
                else{
                    $n_muj_19a25 += 1;
                }
            }
            // si la persona es mayor o tiene 26 y es menor a 41 años hace esto
            elseif(($row_gen[1] >= 26) && ($row_gen[1] < 41)){
                // si es hombre
                if($row_gen[0] == '1'){
                    $n_hom_26a40 += 1;
                }
                // si es mujer
                else{
                    $n_muj_26a40 += 1;
                }
            }
            // si la persona es mayor o tiene 41 y es menor a 66 años hace esto
            elseif(($row_gen[1] >= 41) && ($row_gen[1] < 66)){
                // si es hombre
                if($row_gen[0] == '1'){
                    $n_hom_41a65 += 1;
                }
                // si es mujer
                else{
                    $n_muj_41a65 += 1;
                }
            }
            // si la persona es mayor a 66 años hace esto
            else{
                // si es hombre
                if($row_gen[0] == '1'){
                    $n_hom_66 += 1;
                }
                // si es mujer
                else{
                    $n_muj_66 += 1;
                }
            }
            // si es hombre suma al total general
            if($row_gen[0] == '1'){
                $n_hom_total += 1;
            }
            // si es mujer
            else{
                $n_muj_total += 1;
            }
        }
    }
}

// consulta de mascotas por tipo registrados
$res_mas = registroCampo("rmb_mascotas m", "tm.rmb_tmascotas_nom, COUNT(m.rmb_mascotas_id)", "LEFT JOIN rmb_tmascotas tm USING(rmb_tmascotas_id)", "GROUP BY m.rmb_tmascotas_id", "ORDER BY COUNT(m.rmb_mascotas_id) DESC");
// inicializamos las variables a utilizar en mascotas
$array_mas = "";
// si la consulta es correcta hace esto
if($res_mas){
    $sw = 0;
    // si se encuentran resultados hace esto
    if(mysql_num_rows($res_mas) > 0){
        // para cada registro encontrado se hace esto
        while($row_mas = mysql_fetch_array($res_mas)){
            // si es el primer registro (con valor mayor) hace esto
            if($sw == 0){
                $array_mas .= "{y:".$row_mas[1].",name:'".$row_mas[0]."s',color:'".$array_color[$sw]."',selected:true,sliced:true}";
            }
            // si es diferente al primer registro hace esto
            else{
                $array_mas .= ",{y:".$row_mas[1].",name:'".$row_mas[0]."s',color:'".$array_color[$sw]."'}";
            }
            // adiciona uno al contador
            $sw += 1;
        }
    }
}

// consulta de padres y madres registrados
$res_pad = registroCampo("rmb_residente r", "r.rmb_gen_id, COUNT(r.rmb_residente_hijo)", "WHERE r.rmb_residente_hijo = 1", "GROUP BY r.rmb_gen_id", "ORDER BY COUNT(r.rmb_residente_hijo) DESC");
// inicializamos las variables a utilizar en padres
$array_pad = "";
// si la consulta es correcta hace esto
if($res_pad){
    $sw = 0;
    // si se encuentran resultados hace esto
    if(mysql_num_rows($res_pad) > 0){
        // para cada registro encontrado se hace esto
        while($row_pad = mysql_fetch_array($res_pad)){
            // si el genero es uno (1) es hombre
            if($row_pad[0] == '1'){
                $tipo_pad = "Padres";
            }
            // si el genero es diferente a uno (1) es mujer
            else{
                $tipo_pad = "Madres";
            }
            // si es el primer registro (con valor mayor) hace esto
            if($sw == 0){
                $array_pad .= "{y:".$row_pad[1].",name:'".$tipo_pad."',color:'".$array_color[$sw]."',selected:true,sliced:true}";
            }
            // si es diferente al primer registro hace esto
            else{
                $array_pad .= ",{y:".$row_pad[1].",name:'".$tipo_pad."',color:'".$array_color[$sw]."'}";
            }
            // adiciona uno al contador
            $sw += 1;
        }
    }
}

// consulta de propiestarios, arrendatarios y bancos registrados
$res_pab = registroCampo("rmb_residente_x_aptos rxa", "tr.rmb_tres_nom, COUNT(rxa.rmb_tres_id)", "LEFT JOIN rmb_tres tr USING(rmb_tres_id) WHERE (rxa.rmb_tres_id = '1' OR rxa.rmb_tres_id = '3' OR rxa.rmb_tres_id = '6' OR rxa.rmb_tres_id = '8')", "GROUP BY rxa.rmb_tres_id", "ORDER BY COUNT(rxa.rmb_tres_id) DESC");
// inicializamos las variables a utilizar en padres
$array_pab = "";
// si la consulta es correcta hace esto
if($res_pab){
    $sw = 0;
    // si se encuentran resultados hace esto
    if(mysql_num_rows($res_pab) > 0){
        // para cada registro encontrado se hace esto
        while($row_pab = mysql_fetch_array($res_pab)){
            // si es el primer registro (con valor mayor) hace esto
            if($sw == 0){
                $array_pab .= "{y:".$row_pab[1].",name:'".$row_pab[0]."',color:'".$array_color[$sw]."',selected:true,sliced:true}";
            }
            // si es diferente al primer registro hace esto
            else{
                $array_pab .= ",{y:".$row_pab[1].",name:'".$row_pab[0]."',color:'".$array_color[$sw]."'}";
            }
            // adiciona uno al contador
            $sw += 1;
        }
    }
}


// SELECT ((SELECT COUNT(a.rmb_aptos_id) FROM rmb_aptos a) / COUNT(rxa.rmb_residente_id)) FROM `rmb_residente_x_aptos` rxa LEFT JOIN rmb_residente r USING(rmb_residente_id) WHERE (rxa.rmb_tres_id = '1' OR rxa.rmb_tres_id = '2' OR rxa.rmb_tres_id = '3') AND r.rmb_residente_vive = '1' 
// SELECT COUNT(rxa.rmb_residente_id) FROM `rmb_residente_x_aptos` rxa LEFT JOIN rmb_residente r USING(rmb_residente_id) WHERE (rxa.rmb_tres_id = '1' OR rxa.rmb_tres_id = '2' OR rxa.rmb_tres_id = '3') AND r.rmb_residente_vive = '1' GROUP BY rxa.rmb_aptos_id ORDER BY COUNT(rxa.rmb_residente_id) ASC 
// consulta de media de habitantes en la totalidad de apartamentos registrados
$res_med = registroCampo("rmb_residente_x_aptos rxa", "COUNT(rxa.rmb_residente_id), (SELECT COUNT(a.rmb_aptos_id) FROM rmb_aptos a)", "LEFT JOIN rmb_residente r USING(rmb_residente_id) WHERE (rxa.rmb_tres_id = '1' OR rxa.rmb_tres_id = '2' OR rxa.rmb_tres_id = '3') AND r.rmb_residente_vive = '1'", "GROUP BY rxa.rmb_aptos_id", "ORDER BY COUNT(rxa.rmb_residente_id) ASC");
// inicializamos las variables a utilizar en padres
$array_med = 0;
// si la consulta es correcta hace esto
if($res_med){
    // si se encuentran resultados hace esto
    if(mysql_num_rows($res_med) > 0){
        $smax = 0;
        $stotal_aptos = 0;
        $stotal_residentes = 0;
        while($row_med = mysql_fetch_array($res_med)){
            $stotal_residentes += $row_med[0];
            $stotal_aptos = $row_med[1];
            $smax = $row_med[0];
        }
        $array_med = $stotal_residentes / $stotal_aptos;
    }
}
?>
<!-- Titulo de la pagina -->
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 titulo-pagina">
   <h3 class="text-left">Estadísticas</h3>
</div>
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
    <br><br>
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" id="myChart1">
            <div class="grafico-estadistico" id="container1"></div>
        </div>
        <div class="clearfix">&nbsp;</div>
        <div class="clearfix">&nbsp;</div>
    </div>
    <hr>
    <div class="clearfix"></div>
    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" id="myChart2">
            <div class="grafico-estadistico" id="container2"></div>
        </div>
        <div class="clearfix">&nbsp;</div>
        <div class="clearfix">&nbsp;</div>
    </div>
    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" id="myChart3">
            <div class="grafico-estadistico" id="container3"></div>
        </div>
        <div class="clearfix">&nbsp;</div>
        <div class="clearfix">&nbsp;</div>
    </div>
    <hr>
    <div class="clearfix"></div>
    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" id="myChart4">
            <div class="grafico-estadistico" id="container4"></div>
        </div>
        <div class="clearfix">&nbsp;</div>
        <div class="clearfix">&nbsp;</div>
    </div>
    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" id="myChart5">
            <div class="grafico-estadistico" id="container6"></div>
        </div>
        <div class="clearfix">&nbsp;</div>
        <div class="clearfix">&nbsp;</div>
    </div>
    <div class="clearfix"></div>
</div>
<script>
    $(document).ready(function() {
        var chart = "";
        var chart2 = "";
        var chart3 = "";
        var chart4 = "";
        var chart6 = "";
        // vaciamos el contenido de los div que contienen los graficos
        $(".grafico-estadistico").html("");
        // funcion que genera el grafico de genero por rango de edad
        function chartGenero () {
            chart = new Highcharts.Chart({
                chart: {
                    renderTo: 'container1',
                    type: 'column',
                    margin: 75,
                    backgroundColor: '#F5F6F6',
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
                    borderWidth: .5,
                    padding: 10
                },
                // titulo del grafico
                title: {
                    text: 'Datos de genero por rango de edad'
                },
                // Subtitulo del grafico
                subtitle: {
                    text: 'Mujeres, hombres, niñas y niños.'
                },
                // titulos de los valores del eje x
                xAxis: {
                    title: {
                        text: 'Rango de Edad',
                        rotation: 0,
                        margin: 20,
                        align: 'middle'
                    },
                    categories: ['0 a 3', '4 a 8', '9 a 14', '15 a 18', '19 a 25', '26 a 40', '41 a 65', '66+']
                },
                yAxis: {
                    title: {
                        text: 'Cantidad',
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
                    }
                },
                series: [
                    // Datos y configuracion de las mujeres
                    {
                        name: 'Mujeres',
                        data: [<?php echo $n_muj_0a3;?>,<?php echo $n_muj_4a8;?>,<?php echo $n_muj_9a15;?>,<?php echo $n_muj_15a18;?>,<?php echo $n_muj_19a25;?>,<?php echo $n_muj_26a40;?>,<?php echo $n_muj_41a65;?>,<?php echo $n_muj_66;?>],
                        color: '#FF5A5E'
                    },
                    // Datos y configuracion de los Hombres
                    {
                        name: 'Hombres',
                        data: [<?php echo $n_hom_0a3;?>,<?php echo $n_hom_4a8;?>,<?php echo $n_hom_9a15;?>,<?php echo $n_hom_15a18;?>,<?php echo $n_hom_19a25;?>,<?php echo $n_hom_26a40;?>,<?php echo $n_hom_41a65;?>,<?php echo $n_hom_66;?>],
                        color: '#5AD3D1'
                    },
                    // configuracion y datos del pastel de los totales
                    {
                        type: 'pie',
                        name: 'Total',
                        data: [
                            {
                                name: 'Mujeres',
                                y: <?php echo $n_muj_total;?>,
                                color: '#FF5A5E'
                            },
                            {
                                name: 'Hombres',
                                y: <?php echo $n_hom_total;?>,
                                color: '#5AD3D1'
                            }
                        ],
                        center: [100, 20],
                        size: 100,
                        showInLegend: false,
                        dataLabels: {
                            enabled: true,
                            format: '{point.name}: {point.y}'
                        }
                    }
                ]
            });
        }
        // funcion que genera el grafico de mascotas por tipo de mascota
        function chartMascota () {
            chart2 = new Highcharts.Chart({
                chart: {
                    renderTo: 'container2',
                    type: 'pie',
                    options3d: {
                        enabled: false,
                        alpha: 45,
                        beta: 0
                    },
                    backgroundColor: '#F5F6F6'
                },
                title: {
                    text: 'Número de mascotas por tipo'
                },
                tooltip: {
                    pointFormat: '{series.name}: <b>{point.y}</b>',
                    style: {
                        "fontSize": "10px"
                    }
                },
                plotOptions: {
                    pie: {
                        allowPointSelect: true,
                        cursor: 'pointer',
                        depth: 35,
                        dataLabels: {
                            enabled: false,
                            format: '{point.name}'
                        },
                        showInLegend: true
                    }
                },
                series: [{
                    type: 'pie',
                    name: 'Total',
                    data: [<?php echo $array_mas;?>],
                    dataLabels: {
                        enabled: true,
                        format: '{point.name}: {point.y}'
                    }
                }]
            });
        }
        // funcion que genera el grafico de mascotas por tipo de mascota
        function chartPadresMadres () {
            chart3 = new Highcharts.Chart({
                chart: {
                    renderTo: 'container3',
                    type: 'pie',
                    options3d: {
                        enabled: false,
                        alpha: 45,
                        beta: 0
                    },
                    backgroundColor: '#F5F6F6'
                },
                title: {
                    text: 'Número de madres y padres'
                },
                tooltip: {
                    pointFormat: '{series.name}: <b>{point.y}</b>',
                    style: {
                        "fontSize": "10px"
                    }
                },
                plotOptions: {
                    pie: {
                        allowPointSelect: true,
                        cursor: 'pointer',
                        depth: 35,
                        dataLabels: {
                            enabled: false,
                            format: '{point.name}'
                        },
                        showInLegend: true
                    }
                },
                series: [{
                    type: 'pie',
                    name: 'Total',
                    data: [<?php echo $array_pad;?>],
                    dataLabels: {
                        enabled: true,
                        format: '{point.name}: {point.y}'
                    }
                }]
            });
        }
        // funcion que genera el grafico de numero de propietarios, arrendatarios, otros
        function chartPropArrendOtros () {
            chart4 = new Highcharts.Chart({
                chart: {
                    renderTo: 'container4',
                    type: 'pie',
                    options3d: {
                        enabled: false,
                        alpha: 45,
                        beta: 0
                    },
                    backgroundColor: '#F5F6F6'
                },
                title: {
                    text: 'Propietarios, Arrendatarios, bancos'
                },
                tooltip: {
                    pointFormat: '{series.name}: <b>{point.y}</b>',
                    style: {
                        "fontSize": "10px"
                    }
                },
                plotOptions: {
                    pie: {
                        allowPointSelect: true,
                        cursor: 'pointer',
                        depth: 35,
                        dataLabels: {
                            enabled: false,
                            format: '{point.name}'
                        },
                        showInLegend: true
                    }
                },
                series: [{
                    type: 'pie',
                    name: 'Total',
                    data: [<?php echo $array_pab;?>],
                    dataLabels: {
                        enabled: true,
                        format: '{point.name}: {point.y}'
                    }
                }]
            });
        }
        // funcion que genera el grafico de la media de habitantes por apartamento
        function cartHabApto () {
            chart6 = new Highcharts.Chart({
                chart: {
                    renderTo: 'container6',
                    type: 'gauge',
                    plotBackgroundColor: null,
                    plotBackgroundImage: null,
                    plotBorderWidth: 0,
                    plotShadow: false,
                    backgroundColor: '#F5F6F6'
                },

                title: {
                    text: 'Media de habitantes por apartamento'
                },

                pane: {
                    startAngle: -150,
                    endAngle: 150,
                    background: [{
                        backgroundColor: {
                            linearGradient: { x1: 0, y1: 0, x2: 0, y2: 1 },
                            stops: [
                                [0, '#FFF'],
                                [1, '#333']
                            ]
                        },
                        borderWidth: 0,
                        outerRadius: '109%'
                    }, {
                        backgroundColor: {
                            linearGradient: { x1: 0, y1: 0, x2: 0, y2: 1 },
                            stops: [
                                [0, '#333'],
                                [1, '#FFF']
                            ]
                        },
                        borderWidth: 1,
                        outerRadius: '107%'
                    }, {
                        // default background
                    }, {
                        backgroundColor: '#DDD',
                        borderWidth: 0,
                        outerRadius: '105%',
                        innerRadius: '103%'
                    }]
                },

                // the value axis
                yAxis: {
                    min: 0,
                    max: <?php echo $smax;?>,

                    minorTickInterval: 'auto',
                    minorTickWidth: 1,
                    minorTickLength: 10,
                    minorTickPosition: 'inside',
                    minorTickColor: '#666',

                    tickPixelInterval: 30,
                    tickWidth: 2,
                    tickPosition: 'inside',
                    tickLength: 10,
                    tickColor: '#666',
                    labels: {
                        step: 2,
                        rotation: 'auto'
                    },
                    title: {
                        text: 'Media Habitantes'
                    },
                    plotBands: [{
                        from: 0,
                        to: <?php echo $smax;?>,
                        color: '#55BF3B' // green
                    }, {
                        from: 0,
                        to: <?php echo $array_med;?>,
                        color: '#DF5353' // red
                    }]
                },

                series: [{
                    name: 'Media',
                    data: [<?php echo $array_med;?>],
                    tooltip: {
                        valueSuffix: ' habitantes'
                    }
                }]
            });
        }

        chartGenero ();
        chartMascota ();
        chartPadresMadres ();
        chartPropArrendOtros ();
        cartHabApto ();

        cargarEstadisticas();

        // function eliminarGrafico (datos) {
        //     var id_chart = $(this).parent("div").children('div').attr('id');
        //     $("#"+id_chart).highcharts().destroy();
        //     $(this).remove();
        // }
        // $(".btn-default").on("click", eliminarGrafico);

    });
</script>
