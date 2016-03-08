<?php session_start();
require_once ("../conexion/conexion.php");
require_once ("../php/funciones.php");
//////////////////////////////////////////////////////////////////////////////////////
// Aplicación javascript usando jquery - Juego Crucigrama                           //
// Copyright 2014 Wilson Giovanny Velandia Barreto 3204274564 - willyv78@gmail.com  //
//////////////////////////////////////////////////////////////////////////////////////
$UsuID = $_SESSION['UsuID'];
$id_contac = $_GET['id_contac'];
if(isset($_GET['id_contac'])){
    $res_contac = Id_Contac($id_contac);
    if($res_contac){
        if(mysql_num_rows($res_contac) > 0){
            $row_contac = mysql_fetch_array($res_contac);
        }
    }
}
?>
<p id="titulo">Agregar Contacto</p>
<div class="agrega">
    <label class="formgroup_contac">
        <p  class="text3_contac">Titulo</p>
        <input class="textinput_contac" type="text" value="<?php echo $row_contac[5];?>"></input>
    </label>
    <label class="formgroup_contac">
        <p class="text3_contac">Nombre</p>
        <input class="textinput_contac" type="text" value="<?php echo $row_contac[4];?>"></input>
    </label>
    <label class="formgroup_contac">
        <p class="text3_contac">Teléfono</p>
        <input class="textinput_contac" type="text" value="<?php echo $row_contac[6];?>"></input>
    </label>
    <label class="formgroup_contac">
        <p class="text3_contac">Icono:</p>
        <p class="text3_contac"><?php echo TipoContacto($row_contac[2]); ?></p>
    </label><?php 
    if(isset($_GET['id_contac'])){?>
        <input id="input_contac" type="button" value="Actualizar" class="ins_contac"></input><?php 
    }
    else{?>
        <input id="input_contac" type="button" value="Agregar" class="ins_contac"></input><?php 
    }?>
    <input id="input_contac" type="button" value="Cancelar" class="ins_contac"></input>
    <div id="box10_contac" class="clearfix"></div>
</div>
<script type="text/javascript" src="../js/habitante.js"></script>