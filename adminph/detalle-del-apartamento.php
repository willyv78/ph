<?php
session_start();
require_once ("../conexion/conexion.php");
require_once ("../php/funciones.php");
//////////////////////////////////////////////////////////////////////////////////////
// Aplicación PHP usando Bootstrap, jquery, HTML5 y CSS - PH                        //
// Copyright 2014 Wilson Giovanny Velandia Barreto 3204274564 - willyv78@gmail.com  //
//////////////////////////////////////////////////////////////////////////////////////
$id_apto = "";
if(isset($_GET['id_apto'])){
    $id_apto = $_GET['id_apto'];
}

// Datos del apartamento
$apto_id = "";$apto_nom = "";$apto_torre = "";$apto_tipo = "";$apto_dir = "";$apto_tel = "";$apto_area = "";$apto_priv = "";$apto_banc = "";$apto_coc = "";$apto_hab = "";$apto_est = "";$apto_obs = "";$apto_inm = "";$apto_habita = "";$apto_parq = "";$apto_dep = "";$apto_coef = "";$apto_terr = "";$apto_balc = "";$apto_vul = "";$apto_nom_res = "";$apto_ape_res = "";$apto_banco = "";$prop_vive = "";
$res_apto = registroCampo("rmb_aptos a", "a.rmb_aptos_id, a.rmb_aptos_nom, a.rmb_torres_id, a.rmb_taptos_id, a.rmb_aptos_dir, a.rmb_aptos_tel, a.rmb_aptos_area, a.rmb_aptos_priv, a.rmb_aptos_banos, a.rmb_aptos_coc, a.rmb_aptos_hab, a.rmb_aptos_balc, a.rmb_est_id, a.rmb_aptos_obs, a.rmb_aptos_inm, a.rmb_aptos_habita, a.rmb_aptos_parq, a.rmb_aptos_dep, a.rmb_aptos_coef, a.rmb_aptos_terr, a.rmb_aptos_vul, a.rmb_aptos_banco", "WHERE a.rmb_aptos_id = '$id_apto'", "", "");
if($res_apto){
    if(mysql_num_rows($res_apto) > 0){
        $row_apto = mysql_fetch_array($res_apto);
        $apto_id = $row_apto[0];$apto_nom = $row_apto[1];$apto_torre = $row_apto[2];$apto_tipo = $row_apto[3];$apto_dir = $row_apto[4];$apto_tel = $row_apto[5];$apto_area = $row_apto[6];$apto_priv = $row_apto[7];$apto_banos = $row_apto[8];$apto_coc = $row_apto[9];$apto_hab = $row_apto[10];$apto_balc = $row_apto[11];$apto_est = $row_apto[12];$apto_obs = $row_apto[13];$apto_inm = $row_apto[14];$apto_habita = $row_apto[15];$apto_parq = $row_apto[16];$apto_dep = $row_apto[17];$apto_coef = $row_apto[18];$apto_terr = $row_apto[19];$apto_vul = $row_apto[20];$apto_banco = $row_apto[21];
        $res_reside = registroCampo("rmb_residente_x_aptos rxa", "r.rmb_residente_vive", "LEFT JOIN rmb_residente r USING(rmb_residente_id) WHERE rxa.rmb_aptos_id = '$id_apto' AND rxa.rmb_tres_id = '1'", "GROUP BY rxa.rmb_aptos_id", "ORDER BY rxa.rmb_residente_id DESC LIMIT 1");
        if($res_reside){
            if(mysql_num_rows($res_reside) > 0){
                $row_reside = mysql_fetch_array($res_reside);
                $prop_vive = $row_reside[0];
            }
        }
    }
}
?>
<!-- Titulo de la pagina -->
<div id="titulo" class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
    <div class="col-xs-12 col-sm-10 col-md-10 col-lg-10 pull-left text-left titulo-pagina">
        <input id="id_apartamento" name="id_apartamento" type="hidden" value="<?php echo $id_apto;?>">
        <h3 class="text-left"><?php 
            if($id_apto <> ''){
                echo "Apartamento: ".nombreCampo($id_apto, "rmb_aptos")." Torre: ".$apto_torre;
            }?>
        </h3>
    </div>
    <div class="col-xs-12 col-sm-2 col-md-2 col-lg-2 pull-right text-right">
        <h3>
            <button type="button" class="btn btn-default form-control">Regresar</button>
        </h3>
    </div>
</div>
<dl class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
    <a id="apartamentos" href="#titulo"><dt id="apto">Apartamento<img src="../css/plantilla1/img/residentes1.png" alt=""></dt></a>
    <dd></dd><?php 
    // Si el apartamento existe muestra esto
    if($id_apto){?>
        <a id="propietarios" href="#apto"><dt id="propietario">Propietario<img src="../css/plantilla1/img/residentes10.png" alt=""></dt></a>
        <dd></dd><?php 
    }
    // Si el apartamento existe y si marco inmobiliaria en la pestaña del apartamento
    if(($id_apto) && ($apto_inm == '1')){?>
        <a id="inmobiliarias" href="#propietario"><dt id="inmobiliaria">Inmobiliaria<img src="../css/plantilla1/img/residentes3.png" alt=""></dt></a>
        <dd></dd><?php 
    }
    // Si el apartamento existe y si marco banco en la pestaña del apartamento
    if(($id_apto) && ($apto_banco == '1')){?>
        <!-- Datos basicos del Banco -->
        <a id="locatarios" href="#propietario"><dt id="banco">Locatario<img src="../css/plantilla1/img/residentes4.png" alt=""></dt></a>
        <dd></dd><?php 
    }
    // Si el apartamento existe y si marco que NO VIVE en la pestaña del propietario
    if(($id_apto) && ($prop_vive == '0')){?>
        <a id="arrendatarios" href="#propietario"><dt id="arrendatario">Arrendatario<img src="../css/plantilla1/img/residentes2.png" alt=""></dt></a>
        <dd></dd><?php 
    }
    // Si el apartamento existe muestra esto
    if($id_apto){?>
        <a id="habitantes" href="#propietario"><dt id="residente">Habitantes<img src="../css/plantilla1/img/residentes14.png" alt=""></dt></a>
        <dd></dd><?php 
    }
    // Si el apartamento existe y si marco PARQUEADERO en la pestaña del apartamento
    if(($id_apto) && ($apto_parq == '1')){?>
        <a id="parqueaderos" href="#residente"><dt id="parqueadero">Parqueaderos<img src="../css/plantilla1/img/residentes11.png" alt=""></dt></a>
        <dd></dd><?php 
    }
    // Si el apartamento existe y marco DEPOSITO en la pestaña del apartamento muestra esto
    if(($id_apto) && ($apto_dep == '1')){?>
        <a id="depositos" href="#residente"><dt id="deposito">Depositos<img src="../css/plantilla1/img/residentes12.png" alt=""></dt></a>
        <dd></dd><?php 
    }
    // Si el apartamento existe muestra esto
    if($id_apto){?>
        <a id="vehiculos" href="#residente"><dt id="vehiculo">Vehículos<img src="../css/plantilla1/img/residentes5.png" alt=""></dt></a>
        <dd></dd>
        <a id="servicio" href="#vehiculo"><dt id="empleado">Personal de servicio<img src="../css/plantilla1/img/residentes6.png" alt=""></dt></a>
        <dd></dd>
        <a id="mascotas" href="#empleado"><dt id="mascota">Mascotas<img src="../css/plantilla1/img/residentes7.png" alt=""></dt></a>
        <dd></dd>
        <a id="autorizadas" href="#mascota"><dt id="autorizada">Personas Autorizadas para ingresar al apartamento<img src="../css/plantilla1/img/residentes8.png" alt=""></dt></a>
        <dd></dd>
        <a id="emergencias" href="#autorizada"><dt id="emergencia">En caso de emergencia<img src="../css/plantilla1/img/residentes9.png" alt=""></dt></a>
        <dd></dd><?php 
    }
    // Si el apartamento existe y marco VULNERABILIDADES en la pestaña del apartamento muestra esto
    if(($id_apto) && ($apto_vul == '1')){?>
        <a id="vulnerabilidades" href="#residente"><dt id="vulnerabilidad">Vulnerabilidades<img src="../css/plantilla1/img/residentes13.png" alt=""></dt></a>
        <dd></dd><?php 
    }?>
</dl>
<script>
    $(document).ready(function() {
        camposDinamicos();
    });
</script>