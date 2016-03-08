<?php session_start();
require_once ("../conexion/conexion.php");
require_once ("funciones.php");
$tabla = "rmb_parq";
if(isset($_POST['id_sup'])){
    $sql_borrar = "UPDATE $tabla SET rmb_aptos_id = 0 WHERE ".$tabla."_id = ".$_POST['id_sup']."";
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
        if(($key <> 'id_upd') && ($key <> 'id_apto') && ($key <> 'tipo_res') && ($key <> 'rmb_residente_foto')){
            if($sq == 0){
                if(($key == 'rmb_residente_hijo') || ($key == 'rmb_residente_vive')){
                    $campos .= $key."=".mysql_escape_string($value);
                }
                else{
                    $campos .= $key."='".mysql_escape_string($value)."'";
                }
            }
            else{
                if(($key == 'rmb_residente_hijo') || ($key == 'rmb_residente_vive')){
                    $campos .= ", ".$key."=".mysql_escape_string($value);
                }
                else{
                    $campos .= ", ".$key."='".mysql_escape_string($value)."'";
                }
            }
            $sq += 1;
        }
    }

    $campos .= ", rmb_residente_fecha = NOW(), rmb_residente_user = '".$_SESSION['UsuID']."'";

    $sql_upd = "UPDATE ".$tabla." SET ".$campos." WHERE ".$tabla."_id = '".$_POST['id_upd']."'";
    $res_upd = mysql_query($sql_upd, conexion());
    if($res_upd){echo $_POST['id_upd'];}
    else{echo "";}
}
else{
    $campos = "rmb_aptos_id = '".$_POST['id_apto']."'";
    $sql_ins = "UPDATE ".$tabla." SET $campos WHERE rmb_parq_id = '".$_POST['rmb_parq_id']."'";
    $res_ins = mysql_query($sql_ins, conexion());
    if($res_ins){
        echo $_POST['id_apto'];
    }
}
?>