<?php session_start();
require_once ("../conexion/conexion.php");
require_once ("../php/funciones.php");
//////////////////////////////////////////////////////////////////////////////////////
// Aplicación PHP usando Bootstrap, jquery, HTML5 y CSS - PH                        //
// Copyright 2014 Wilson Giovanny Velandia Barreto 3204274564 - willyv78@gmail.com  //
//////////////////////////////////////////////////////////////////////////////////////
$tipodoc = $_GET['tipodoc'];
switch ($tipodoc) {
    case '1':
        $color_fondo = "rgb(66, 100, 174)";
        break;
    case '2':
        $color_fondo = "rgb(214,72,154)";
        break;
    case '3':
        $color_fondo = "rgb(145,199,62)";
        break;
    case '4':
        $color_fondo = "rgb(0,136,196)";
        break;
    case '5':
        $color_fondo = "rgb(248,182,32)";
        break;
    case '6':
        $color_fondo = "rgb(72,61,139)";
        break;
    case '7':
        $color_fondo = "rgb(40,118,24)";
        break;
    default:
        $color_fondo = "rgb(66, 100, 174)";
        break;
}
$res_val = Documents($tipodoc);
?>

<div class="cont_doc">
    <div id="header_admin" class="clearfix" style="background-color:<?php echo $color_fondo;?>;">
        <p id="text_admin"><?php echo Nombre_Registro($tipodoc, "rmb_cdoc");?></p>
    </div><?php 
    if($res_val){
        if(mysql_num_rows($res_val) > 0){
            while($row_val = mysql_fetch_array($res_val)){?>
                <div class="cont_doc2">
                    <div class="img_doc">
                        <a href="<?php echo $row_val[5];?>" target="_blank">
                            <img src="../images/descarga.png" alt="placeholder+image" width="35%" style="background-color:<?php echo $color_fondo;?>;border-radius:100%;" title="Descargar">
                        </a>
                    </div>
                    <div class="det_doc">
                        <p>Titulo: <?php echo $row_val[2];?></p>
                        <p>Fecha publicación: <?php echo $row_val[7];?></p>
                        <p>Descripcion: <?php echo $row_val[3];?></p>
                        <p>Estado: <?php echo Nombre_Registro($row_val[6], "rmb_est");?></p>
                    </div>
                </div><?php 
            }
        }
        else{?>
            <div class="cont_doc">
                <div class="img_doc">
                    <img src="../images/cancelar.png" alt="placeholder+image" width="40%" style="background-color:<?php echo $color_fondo;?>;border-radius:100%;">
                </div>
                <div class="det_doc">No se encontraron documentos</div>
            </div><?php 
        }
    }
    else{?>
        <div class="cont_doc">
            <div class="img_doc">
                <img src="../images/cancelar.png" alt="placeholder+image" width="40%" style="background-color:<?php echo $color_fondo;?>;border-radius:100%;">
            </div>
            <div class="det_doc">No se encontraron documentos</div>
        </div><?php 
    }?>
</div>