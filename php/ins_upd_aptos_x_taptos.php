<?php session_start();
require_once ("../conexion/conexion.php");
require_once ("funciones.php");
$tabla = "rmb_aptos_x_taptos";
if(isset($_POST['id_sup'])){
    $sql_borrar = "DELETE FROM rmb_aptos_x_taptos WHERE rmb_aptos_nom = ".$_POST['id_sup']."";
    $res_borrar = mysql_query($sql_borrar, conexion());
    if($res_borrar){
        $nom_id = $_POST['id_sup'];
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

    $campos .= ", rmb_taptos_fecha = NOW(), rmb_taptos_user = '".$_SESSION['UsuID']."'";

    $sql_upd = "UPDATE ".$tabla." SET ".$campos." WHERE ".$tabla."_id = '".$_POST['id_upd']."'";
    $res_upd = mysql_query($sql_upd, conexion());
    if($res_upd){echo $sql_upd;}
    else{echo "";}
}
else{
    $nex_id = NextID('rmb_admon', 'rmb_taptos');
    $sq = 0;
    $campo = "";
    $valor = "";
    foreach($_POST as $key=>$value){
        if($key <> 'id_apto'){
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

    $campo .= ", rmb_taptos_fecha, rmb_taptos_user";
    $valor .= ", NOW(), ".$_SESSION['UsuID'];

    $sql_ins = "INSERT INTO ".$tabla." (".$campo.") VALUES (".$valor.")";
    $res_ins = mysql_query($sql_ins, conexion());
    if($res_ins){echo $nex_id;}
    else{echo "";}
}
?>