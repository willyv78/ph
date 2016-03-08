<?php session_start();
require_once ("../conexion/conexion.php");
require_once ("../php/funciones.php");
//////////////////////////////////////////////////////////////////////////////////////
// Aplicación PHP usando Bootstrap, jquery, HTML5 y CSS - PH                        //
// Copyright 2014 Wilson Giovanny Velandia Barreto 3204274564 - willyv78@gmail.com  //
//////////////////////////////////////////////////////////////////////////////////////

$id_even = "";
$nom_even = "";
$tipo_even = "";
$tip_even = "";
$fini_even = "";
$ffin_even = "";
$emp_even = "";
$file_even = "";
$obs_even = "";
$fecha_even = "";
$user_even = "";
$class_div = "";
if(isset($_GET['id'])){
    // $res = registroCampo("e3_cal", "*", "WHERE e3_cal_id = '".$_GET['id']."'", "", "");
    // if($res){
    //     if(mysql_num_rows($res) > 0){
    //         $row = mysql_fetch_array($res);
    //         $id_even = $row[0];
    //         $nom_even = $row[1];
    //         $tipo_even = $row[2];
    //         if($tipo_even == '1'){$tip_even = "Notificación";$class_div = "btn-info";}
    //         elseif($tipo_even == '2'){$tip_even = "Festivo";$class_div = "btn-success";}
    //         elseif($tipo_even == '3'){$tip_even = "Día Especial";$class_div = "btn btn-warning";}
    //         else{$tip_even = "Emergencia";$class_div = "btn-danger";}
    //         $fini_even = date('Y-m-d H:i', strtotime($row[3]));
    //         $ffin_even = date('Y-m-d H:i', strtotime($row[4]));
    //         $emp_even = $row[5];
    //         $file_even = $row[6];
    //         $obs_even = $row[7];
    //         $fecha_even = $row[9];
    //         $user_even = $row[10];
    //     }
    // }
}
// echo $ffecha_date;
?>
<div class="col-xs-11 col-sm-11 col-md-10 col-lg-10" style="position:absolute;margin:5%;">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div class="form-group text-right">
            <legend><h1>Ver Evento</h1></legend>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <h2>Nombre del Evento</h2>
            <div class="widget"></div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <img class="img-responsive" src="../images/fondogrande.jpg" alt="Image" width="100%" style="margin: auto;height:300px;">
            <div class="widget"></div>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
            <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                <h4>Inicio: </h4>
            </div>
            <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
                01-06-2015 08:00 AM
            </div>            
            <div class="widget"></div>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
            <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                <h4>Finaliza: </h4>
            </div>
            <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
                01-06-2015 12:00 M
            </div>
            <div class="widget"></div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="col-xs-3 col-sm-2 col-md-2 col-lg-2">
                <h4>Para:</h4>
            </div>
            <div class="col-xs-9 col-sm-10 col-md-10 col-lg-10">
                Residentes
            </div>
            <div class="widget"></div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="col-xs-12 col-sm-2 col-md-2 col-lg-2">
                <h4>Mensaje: </h4>
            </div>
            <div class="col-xs-12 col-sm-10 col-md-10 col-lg-10">
                Día del padre, es el día más importante del año, por tal motivo los invitamos a celebrarlo en familia, viendo partidos de futbol todo el día, en compañia de sus amigos, comida chatarra y una cerveza.
            </div>
            <div class="widget"></div>
        </div>
        <div class="form-group text-center">
            <div class="widget">&nbsp;</div>
            <button type="buttom" class="btn btn-default">Regresar</button>
        </div>
    </div>
</div>
<script>
</script>
<script>
    editEvento();
</script>