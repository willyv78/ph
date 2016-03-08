<?php session_start();
require_once ("../conexion/conexion.php");
require_once ("funciones.php");
$tabla = "rmb_taptos";
if(isset($_POST['id_sup'])){
    $sql_borrar = "DELETE FROM $tabla WHERE ".$tabla."_id = ".$_POST['id_sup']."";
    $res_borrar = mysql_query($sql_borrar, conexion());
    if($res_borrar){
        $nom_id = $_POST['id_sup']."_vac";
        echo "Se borro el registro Nº ".$nom_id;
    }
}
else if(isset($_POST['id_upd'])){
    $sq = 0;$sw = 0;
    $campos = "";
    $sql_upd = "";
    foreach($_POST as $key => $value){
        if(($key <> 'id_upd') && ($key <> 'array_aptos') && ($key <> 'rmb_aptos_nom')){
            if($sq == 0){
                if(($key == 'rmb_taptos_serv') || ($key == 'rmb_taptos_est')){
                    $campos .= $key."=".mysql_escape_string($value);
                }
                else{
                    $campos .= $key."='".mysql_escape_string($value)."'";
                }
            }
            else{
                if(($key == 'rmb_taptos_serv') || ($key == 'rmb_taptos_est')){
                    $campos .= ", ".$key."=".mysql_escape_string($value);
                }
                else{
                    $campos .= ", ".$key."='".mysql_escape_string($value)."'";
                }
            }
            $sq += 1;
        }
    }

    $campos .= ", rmb_taptos_fecha = NOW(), rmb_taptos_user = '".$_SESSION['UsuID']."'";

    $sql_upd = "UPDATE ".$tabla." SET ".$campos." WHERE ".$tabla."_id = '".$_POST['id_upd']."'";
    $res_upd = mysql_query($sql_upd, conexion());
    // si el sql no se executa correctamente hace esto
    if(!$res_upd){$sw ++;}
    // si la variable tiene algun valor hace esto
    if($_POST['array_aptos']){
        // asignamos a la variable el array separado por comas
        $array_aptos = explode(",", $_POST['array_aptos']);
        // borramos todos los apartamentos asignados al tipo
        $sql_borrar = "DELETE FROM rmb_aptos_x_taptos WHERE rmb_taptos_id = ".$_POST['id_upd']."";
        $res_borrar = mysql_query($sql_borrar, conexion());
        // si se borro con exito hace esto
        if($res_borrar){
            // recorremos cada item del array
            foreach ($array_aptos as $key => $value) {
                $sql_aptos = "INSERT INTO rmb_aptos_x_taptos (rmb_aptos_nom, rmb_taptos_id, rmb_aptos_x_taptos_fecha, rmb_aptos_x_taptos_user) VALUES ('$value', '".$_POST['id_upd']."', NOW(), '".$_SESSION['UsuID']."')";
                $res_aptos = mysql_query($sql_aptos, conexion());
                if(!$sql_aptos){
                    $sw ++;
                }
            }
        }
    }
    // si los sql en esta seccion se ejecutaron correctamente hace esto
    if($sw == 0){echo "Todo estuvo bien";}
}
else{
    $nex_id = NextID('rmb_admon', 'rmb_taptos');
    $sq = 0;$sw = 0;
    $campo = "";
    $valor = "";
    foreach($_POST as $key=>$value){
        if(($key <> 'array_aptos') && ($key <> 'rmb_aptos_nom')){
            if($sq == 0){
                $campo .= $key;
                if(($key == 'rmb_taptos_serv') || ($key == 'rmb_taptos_est')){
                    $valor .= ",".trim($value);
                }
                else{
                    $valor .= "'".trim($value)."'";
                }
            }
            else{
                $campo .= ",".$key;
                if(($key == 'rmb_taptos_serv') || ($key == 'rmb_taptos_est')){
                    $valor .= ",".trim($value);
                }
                else{
                    $valor .= ",'".trim($value)."'";
                }
            }            
            $sq += 1;
        }
    }

    $campo .= ", rmb_taptos_fecha, rmb_taptos_user";
    $valor .= ", NOW(), ".$_SESSION['UsuID'];

    $sql_ins = "INSERT INTO ".$tabla." (".$campo.") VALUES (".$valor.")";
    $res_ins = mysql_query($sql_ins, conexion());
    // si el sql no se executa correctamente hace esto
    if(!$res_ins){$sw ++;}
    // si la variable tiene algun valor hace esto
    if($_POST['array_aptos']){
        // asignamos a la variable el array separado por comas
        $array_aptos = explode(",", $_POST['array_aptos']);
        // recorremos cada item del array
        foreach ($array_aptos as $key => $value) {
            $sql_aptos = "INSERT INTO rmb_aptos_x_taptos (rmb_aptos_nom, rmb_taptos_id, rmb_aptos_x_taptos_fecha, rmb_aptos_x_taptos_user) VALUES ('$value', '$nex_id', NOW(), '".$_SESSION['UsuID']."')";
            $res_aptos = mysql_query($sql_aptos, conexion());
            if(!$sql_aptos){
                $sw ++;
            }
        }
    }
    // si los sql en esta seccion se ejecutaron correctamente hace esto
    if($sw == 0){echo "Todo estuvo bien";}
}
?>