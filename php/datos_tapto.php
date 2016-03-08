<?php session_start();
require_once ("../conexion/conexion.php");
//////////////////////////////////////////////////////////////////////////////////////
// Aplicación javascript usando jquery - Juego Crucigrama                           //
// Copyright 2014 Wilson Giovanny Velandia Barreto 3204274564 - willyv78@gmail.com  //
//////////////////////////////////////////////////////////////////////////////////////
$apto = $_POST['apto'];
$apto_id = $_POST['id_upd'];
$con = conexion();

// si se envio el id del apartamento es por que lo esta editando
if($apto_id){
    $sql_aptos = "SELECT rmb_aptos_nom FROM rmb_aptos WHERE rmb_aptos_id = '$apto_id'";
    $res_aptos = mysql_query($sql_aptos, $con);
    if($res_aptos){
        if(mysql_num_rows($res_aptos) > 0){
            $row_aptos = mysql_fetch_array($res_aptos);
            // si el numero de apartamento es igual al encontrado segun su id hace esto
            if($row_aptos[0] == $apto){
                $sql_aptos_x_taptos = "SELECT t.rmb_taptos_area, t.rmb_taptos_priv, t.rmb_taptos_banos, t.rmb_taptos_coc, t.rmb_taptos_hab, t.rmb_taptos_balc, t.rmb_taptos_coef, t.rmb_taptos_nom, t.rmb_taptos_id, t.rmb_taptos_est, t.rmb_taptos_serv, t.rmb_taptos_terr FROM rmb_aptos_x_taptos axt LEFT JOIN rmb_taptos t USING(rmb_taptos_id) WHERE axt.rmb_aptos_nom = '$apto'";
                $res_aptos_x_taptos = mysql_query($sql_aptos_x_taptos, $con);
                if($res_aptos_x_taptos){
                    if(mysql_num_rows($res_aptos_x_taptos) > 0){
                        list($const, $priv, $banos, $coc, $hab, $balc, $coef, $tipo_nom, $tipo, $est, $serv, $terr) = mysql_fetch_array($res_aptos_x_taptos);
                        echo $const."|".$priv."|".$banos."|".$coc."|".$hab."|".$balc."|".$coef."|".$tipo_nom."|".$tipo."|".$est."|".$serv."|".$terr;
                    }
                }
            }
            else{
                $sql_aptos2 = "SELECT rmb_aptos_id FROM rmb_aptos WHERE rmb_aptos_nom = '$apto'";
                $res_aptos2 = mysql_query($sql_aptos2, $con);
                if($res_aptos2){
                    // si no existe el numero de apartamento hace esto
                    if(mysql_num_rows($res_aptos2) <= 0){
                        $sql_aptos_x_taptos = "SELECT t.rmb_taptos_area, t.rmb_taptos_priv, t.rmb_taptos_banos, t.rmb_taptos_coc, t.rmb_taptos_hab, t.rmb_taptos_balc, t.rmb_taptos_coef, t.rmb_taptos_nom, t.rmb_taptos_id, t.rmb_taptos_est, t.rmb_taptos_serv, t.rmb_taptos_terr FROM rmb_aptos_x_taptos axt LEFT JOIN rmb_taptos t USING(rmb_taptos_id) WHERE axt.rmb_aptos_nom = '$apto'";
                        $res_aptos_x_taptos = mysql_query($sql_aptos_x_taptos, $con);
                        if($res_aptos_x_taptos){
                            if(mysql_num_rows($res_aptos_x_taptos) > 0){
                                list($const, $priv, $banos, $coc, $hab, $balc, $coef, $tipo_nom, $tipo, $est, $serv, $terr) = mysql_fetch_array($res_aptos_x_taptos);
                                echo $const."|".$priv."|".$banos."|".$coc."|".$hab."|".$balc."|".$coef."|".$tipo_nom."|".$tipo."|".$est."|".$serv."|".$terr;
                            }
                            else{
                                echo $const."|".$priv."|".$banos."|".$coc."|".$hab."|".$balc."|".$coef."|".$tipo_nom."|".$tipo."|".$est."|".$serv."|".$terr;
                            }
                        }
                    }
                }
            }
        }
    }
}
// hace esto si es un nuevo apartamento
else{
    $sql_aptos = "SELECT rmb_aptos_id FROM rmb_aptos WHERE rmb_aptos_nom = '$apto'";
    $res_aptos = mysql_query($sql_aptos, $con);
    if($res_aptos){
        if(mysql_num_rows($res_aptos) <= 0){
            $sql_aptos_x_taptos = "SELECT t.rmb_taptos_area, t.rmb_taptos_priv, t.rmb_taptos_banos, t.rmb_taptos_coc, t.rmb_taptos_hab, t.rmb_taptos_balc, t.rmb_taptos_coef, t.rmb_taptos_nom, t.rmb_taptos_id, t.rmb_taptos_est, t.rmb_taptos_serv, t.rmb_taptos_terr FROM rmb_aptos_x_taptos axt LEFT JOIN rmb_taptos t USING(rmb_taptos_id) WHERE axt.rmb_aptos_nom = '$apto'";
            $res_aptos_x_taptos = mysql_query($sql_aptos_x_taptos, $con);
            if($res_aptos_x_taptos){
                if(mysql_num_rows($res_aptos_x_taptos) > 0){
                    list($cont, $priv, $banos, $coc, $hab, $balc, $coef, $tipo_nom, $tipo, $est, $serv, $terr) = mysql_fetch_array($res_aptos_x_taptos);
                    echo $cont."|".$priv."|".$banos."|".$coc."|".$hab."|".$balc."|".$coef."|".$tipo_nom."|".$tipo."|".$est."|".$serv."|".$terr;
                }
            }
        }
    }
}

?>