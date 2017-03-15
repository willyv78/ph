<?php session_start();
require_once ("../conexion/conexion.php");
require_once ("funciones.php");
$tabla = "rmb_calendario";
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
        if($key <> 'id_upd'){
            if($sq == 0){
                $campos .= $key."='".mysql_escape_string($value)."'";
            }
            else{
                $campos .= ", ".$key."='".mysql_escape_string($value)."'";
            }
            $sq += 1;
        }
    }
    $campos .= ", rmb_context_id = 2, rmb_calendario_fecha = NOW(), rmb_calendario_user = '".$_SESSION['UsuID']."'";
    $sql_upd = "UPDATE ".$tabla." SET ".$campos." WHERE ".$tabla."_id = '".$_POST['id_upd']."'";
    $res_upd = mysql_query($sql_upd, conexion());
    // si los sql en esta seccion se ejecutaron correctamente hace esto
    if($res_upd){echo "Todo estuvo bien";}
}
else{
    $nex_id = NextID('rmb_admon', $tabla);
    $sq = 0;$sw = 0;
    $campo = "";
    $valor = "";
    foreach($_POST as $key=>$value){
        if($key <> 'id_upd'){
            if($sq == 0){
                $campo .= $key;
                $valor .= "'".trim($value)."'";
            }
            else{
                $campo .= ",".$key;
                $valor .= ",'".trim($value)."'";
            }            
            $sq += 1;
        }
    }
    $campo .= ", rmb_context_id, rmb_tcal_id, rmb_calendario_fecha, rmb_calendario_user";
    $valor .= ", 2, 4, NOW(), ".$_SESSION['UsuID'];
    $sql_ins = "INSERT INTO ".$tabla." (".$campo.") VALUES (".$valor.")";
    $res_ins = mysql_query($sql_ins, conexion());
    // si los sql en esta seccion se ejecutaron correctamente hace esto
    if($res_ins){echo "Todo estuvo bien";}
}
?>