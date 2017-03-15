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
<!-- <div id="titulo" class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 pull-left text-left titulo-pagina">
        <input id="id_apartamento" name="id_apartamento" type="hidden" value="<?php echo $id_apto;?>">
        <h3 class="text-left">Estadísticas</h3>
    </div>
</div> -->
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12"><br>
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
            <div class="grafico-estadistico" id="container6" style="background-color:#FFFFFF;text-align:center;">0.5</div>
        </div>
        <div class="clearfix">&nbsp;</div>
        <div class="clearfix">&nbsp;</div>
    </div>
    <div class="clearfix"></div>
</div>
<script src="../js/jquery.min.js"></script>
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
                            enabled: false,
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
                    backgroundColor: '#FFFFFF'
                },
                title: {
                    text: 'Número de mascotas por tipo'
                },
                // tabla de descripcion de elementos
                legend: {
                    margin: 5,
                    align: 'center',
                    borderWidth: 1,
                    padding: 10
                },
                tooltip: {
                    pointFormat: '{series.name}: <b>{point.y}</b>',
                    style: {
                        "fontSize": "10px"
                    }
                },
                plotOptions: {
                    pie: {
                        allowPointSelect: false,
                        cursor: 'pointer',
                        depth: 35,
                        dataLabels: {
                            enabled: true,
                            format: '{point.name}'
                        }
                    }
                },
                series: [{
                    type: 'pie',
                    name: 'Total',
                    data: [<?php echo $array_mas;?>],
                    dataLabels: {
                        enabled: false,
                        format: '{point.name}: {point.y}'
                    },
                    showInLegend: true,
                    point: {
                        events: {
                            legendItemClick: function () {
                                return false;
                            }
                        }
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
                    backgroundColor: '#FFFFFF'
                },
                title: {
                    text: 'Número de madres y padres'
                },
                // tabla de descripcion de elementos
                legend: {
                    margin: 5,
                    align: 'center',
                    borderWidth: 1,
                    padding: 10
                }
                ,
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
                        }
                    }
                },
                series: [{
                    type: 'pie',
                    name: 'Total',
                    data: [<?php echo $array_pad;?>],
                    dataLabels: {
                        enabled: false,
                        format: '{point.name}: {point.y}'
                    },
                    showInLegend: true,
                    point: {
                        events: {
                            legendItemClick: function () {
                                return false;
                            }
                        }
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
                    backgroundColor: '#FFFFFF'
                },
                title: {
                    text: 'Propietarios, Arrendatarios, bancos'
                },
                // tabla de descripcion de elementos
                legend: {
                    margin: 5,
                    align: 'center',
                    borderWidth: 1,
                    padding: 10
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
                        enabled: false,
                        format: '{point.name}: {point.y}'
                    },
                    showInLegend: true,
                    point: {
                        events: {
                            legendItemClick: function () {
                                return false;
                            }
                        }
                    }
                }]
            });
        }
        // funcion que genera el grafico de la media de habitantes por apartamento
        function cartHabApto () {
            var altoDiv = $("#container4").children("div").children("svg").attr("height");
            var contDiv = '<div class="clearfix">&nbsp;</div><text y="24" style="color:#333333;font-size:18px;fill:#333333;width:476px;" zIndex="4" class="highcharts-title" text-anchor="middle" x="270"><tspan>Promedio de Habitantes por Apto.</tspan></text><div class="clearfix">&nbsp;</div><div class="clearfix">&nbsp;</div><div class="clearfix">&nbsp;</div><div style="text-align:center;margin:auto;vertical-align:middle;font-size:3em;">0.5</div><div style="text-align:center;margin:auto;vertical-align:middle;font-size:2em;">Habitantes</div><div class="clearfix">&nbsp;</div>';
            $("#container6").html(contDiv).css("height", altoDiv);
        }
        chartGenero ();
        chartMascota ();
        chartPadresMadres ();
        chartPropArrendOtros ();
        cartHabApto ();
        cargarEstadisticas();
    });
</script>