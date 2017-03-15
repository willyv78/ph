<?php session_start();
require_once ("../conexion/conexion.php");
require_once ("funciones.php");
$tabla = "rmb_aptos";
if(isset($_POST['id_sup'])){
    $sql_borrar = "DELETE FROM $tabla WHERE ".$tabla."_id = '".$_POST['id_sup']."'";
    $res_borrar = mysql_query($sql_borrar, conexion());
    if($res_borrar){
        echo "Se borro el registro";
    }
}
else if(isset($_POST['id_upd'])){
    $sq = 0;$sw = 0;
    $campos = "";
    $sql_upd = "";
    foreach($_POST as $key => $value){
        if($key <> 'id_upd'){
            if($sq == 0){
                if(($key == 'rmb_aptos_inm') || ($key == 'rmb_aptos_habita') || ($key == 'rmb_aptos_parq') || ($key == 'rmb_aptos_dep') || ($key == 'rmb_aptos_vul') || ($key == 'rmb_aptos_banco') || ($key == 'rmb_aptos_propio') || ($key == 'rmb_torres_id') || ($key == 'rmb_taptos_id') || ($key == 'rmb_est_id') || ($key == 'rmb_aptos_user') || ($key == 'rmb_aptos_masc') || ($key == 'rmb_aptos_arrend')){
                    $campos .= $key."=".mysql_escape_string($value);
                }
                else{
                    $campos .= $key."='".mysql_escape_string($value)."'";
                }
            }
            else{
                if(($key == 'rmb_aptos_inm') || ($key == 'rmb_aptos_habita') || ($key == 'rmb_aptos_parq') || ($key == 'rmb_aptos_dep') || ($key == 'rmb_aptos_vul') || ($key == 'rmb_aptos_banco') || ($key == 'rmb_aptos_propio') || ($key == 'rmb_torres_id') || ($key == 'rmb_taptos_id') || ($key == 'rmb_est_id') || ($key == 'rmb_aptos_user') || ($key == 'rmb_aptos_masc') || ($key == 'rmb_aptos_arrend')){
                    $campos .= ", ".$key."=".mysql_escape_string($value);
                }
                else{
                    $campos .= ", ".$key."='".mysql_escape_string($value)."'";
                }
            }
            $sq += 1;
        }
    }
    $campos .= ", rmb_aptos_fecha = NOW(), rmb_aptos_user = ".$_SESSION['UsuID'];

    $sql_upd = "UPDATE ".$tabla." SET ".$campos." WHERE ".$tabla."_id = ".$_POST['id_upd'];
    // echo $sql_upd;
    $res_upd = mysql_query($sql_upd, conexion());
    if($res_upd){echo $_POST['id_upd'];}
}
else{
    $nex_id = NextID('rmb_admon', 'rmb_aptos');
    $sq = 0;$sw = 0;
    $campo = "";
    $valor = "";
    foreach($_POST as $key => $value){
        if($key <> 'ins'){
            if($sq == 0){
                $campo .= $key;
                if(($key == 'rmb_aptos_inm') || ($key == 'rmb_aptos_habita') || ($key == 'rmb_aptos_parq') || ($key == 'rmb_aptos_dep') || ($key == 'rmb_aptos_vul') || ($key == 'rmb_aptos_banco') || ($key == 'rmb_aptos_propio') || ($key == 'rmb_aptos_masc') || ($key == 'rmb_aptos_arrend')){
                    $valor .= trim($value);
                }
                else{
                    $valor .= "'".trim($value)."'";
                }
            }
            else{
                $campo .= ",".$key;
                if(($key == 'rmb_aptos_inm') || ($key == 'rmb_aptos_habita') || ($key == 'rmb_aptos_parq') || ($key == 'rmb_aptos_dep') || ($key == 'rmb_aptos_vul') || ($key == 'rmb_aptos_banco') || ($key == 'rmb_aptos_propio') || ($key == 'rmb_aptos_masc') || ($key == 'rmb_aptos_arrend')){
                    $valor .= ",".trim($value);
                }
                else{
                    $valor .= ",'".trim($value)."'";
                }
            }            
            $sq += 1;
        }
    }
    $campo .= ", rmb_aptos_fecha, rmb_aptos_user";
    $valor .= ", NOW(), ".$_SESSION['UsuID'];
    $sql_ins = "INSERT INTO ".$tabla." (".$campo.") VALUES (".$valor.")";
    $res_ins = mysql_query($sql_ins, conexion());
    if($res_ins){echo $nex_id;}
}
?>