<?php session_start();
require_once ("../conexion/conexion.php");
require_once ("../php/funciones.php");
//////////////////////////////////////////////////////////////////////////////////////
// Aplicación javascript usando jquery - Juego Crucigrama                           //
// Copyright 2014 Wilson Giovanny Velandia Barreto 3204274564 - willyv78@gmail.com  //
//////////////////////////////////////////////////////////////////////////////////////
$Perfil = $_GET['perfil'];
$res_val = UsuariosPerfil($Perfil);
$datos = "";
$table = "";
$table .= "<table width='100%'>";
$tipodoc = $_GET['perfil'];
switch ($tipodoc) {
    case '2'://Administración
        $color_fondo = "rgb(66, 100, 174)";
        $titulo = "ADMINISTRACIÓN";
        break;
    case '3'://Consejo Administrativo
        $color_fondo = "rgb(72,61,139)";
        $titulo = "CONSEJO ADMINISTRATIVO";
        break;
    case '4':
        $color_fondo = "rgb(0,136,196)";
        $titulo = "WEB MASTER";
        break;
    case '5'://Contador
        $color_fondo = "rgb(248,182,32)";
        $titulo = "CONTADOR";
        break;
    case '6'://Revisor Fiscal
        $color_fondo = "rgb(214,72,154)";
        $titulo = "REVISOR FISCAL";
        break;
    case '7'://Seguridad
        $color_fondo = "#91C73E";
        $titulo = "SEGURIDAD";
        break;
    case '8'://Aseo
        $color_fondo = "rgb(40,118,24)";
        $titulo = "ASEO";
        break;
    case '9'://Comite de Convivencia
        $color_fondo = "#0088C4";
        $titulo = "COMITE DE CONVIVENCIA";
        break;
    default://Azul #2
        $color_fondo = "rgb(66, 100, 174)";
        break;
}
if($res_val){
    if(mysql_num_rows($res_val) > 0){
        $row_val = mysql_fetch_array($res_val);
        if($row_val[11] != ''){
            $src = base64_decode($row_val[11]);
        }
        else{
            $src = "../images/fotografiacaadministradora.jpg";
        }?>
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div id="header_admin" class="clearfix" style="background-color:<?php echo $color_fondo;?>;">
                <span class="back"> Regresar </span>
                <span id="text_quien5"><?php echo $titulo;?></span>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <br>
            <span><?php echo Nombre_Registro($row_val[4], 'rmb_carg');?></span>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <img id="image_admin" src="../images/fotografiacaadministradora.jpg" class="image" />
            <br>
            
            <p class="text1_admin">
                <span class="textspan3_admin">Nombre:</span>
                <?php echo $row_val[1]." ".$row_val[1];?>
            </p>
            <p class="text1_admin">
                <span id="textspan_admin">
                    <?php echo Nombre_Registro($row_val[5], 'rmb_tdoc').": ".$row_val[6];?>
                </span>
            </p>
            <p class="text1_admin">
                <span class="textspan3_admin">Teléfono Contacto:</span>
                <a href="tel:+573002325">+ 57 3002325<?php echo $row_val[9];?></a>
            </p>
            <p class="text1_admin">
                <span class="textspan3_admin">Correo Electrónico: </span>
                <a href="mailto:<?php echo $row_val[3];?>"><?php echo $row_val[3];?></a>
            </p>
            <p class="text1_admin">
                <span class="textspan3_admin">Más información:</span>
                <?php echo $row_val[10];?>
            </p>
        </div><?php 
    }
    else{?>
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div id="header_admin" class="clearfix" style="background-color:<?php echo $color_fondo;?>;">
                <span class="back"> Regresar </span>
                <span id="text_quien5"><?php echo $titulo;?></span>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <br>
            <span>No hay datos para mostrar</span>
        </div><?php 
    }
}
else{?>
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div id="header_admin" class="clearfix" style="background-color:<?php echo $color_fondo;?>;">
            <span class="back"> Regresar </span>
            <span id="text_quien5"><?php echo $titulo;?></span>
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <br>
        <span>No hay datos para mostrar</span>
    </div><?php }
?>
<style type="text/css">
    a[href^="tel:"]:before {
        content: "\260E";
        display: inline-block;
        margin-right: 0.2em;
    }

</style>
<script type="text/javascript">
    //hacer clik en regresar en quienes somos
    $(".back").click(function() {
        $("#content_res").load("quienes.php");
    });
</script>