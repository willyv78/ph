<?php session_start();
require_once ("../conexion/conexion.php");
require_once ("funciones.php");
$tabla = "rmb_residente";
if(isset($_POST['id_sup'])){
    $sql_borrar = "DELETE FROM rmb_residente WHERE rmb_residente_id = ".$_POST['id_sup']."";
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
        if(($key <> 'id_upd') && ($key <> 'id_apto')){
            if($sq == 0){
                $campos .= $key."='".mysql_escape_string($value)."'";  
            }
            else{
                $campos .= ", ".$key."='".mysql_escape_string($value)."'";
            }
            $sq += 1;
        }
    }

    $campos .= ", rmb_residente_fecha = NOW(), rmb_residente_user = '".$_SESSION['UsuID']."'";

    $sql_upd = "UPDATE rmb_residente SET ".$campos." WHERE rmb_residente_id = '".$_POST['id_upd']."'";
    $res_upd = mysql_query($sql_upd, conexion());
    if($res_upd){echo $_POST['id_upd'];}
    else{echo "";}
}
else{
    $nex_id = NextID('rmb_admon', 'rmb_residente');
    $sq = 0;$sw = 0;
    $campo = "";
    $valor = "";
    foreach($_POST as $key=>$value){
        if(($key <> 'ins') && ($key <> 'id_apto')){
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
    $campo .= ", rmb_residente_fecha, rmb_residente_user";
    $valor .= ", NOW(), ".$_SESSION['UsuID'];

    mysql_query("SET AUTOCOMMIT=0", conexion());
    mysql_query("START TRANSACTION", conexion());

    $sql_ins = "INSERT INTO rmb_residente (".$campo.") VALUES (".$valor.");";
    $res_ins = mysql_query($sql_ins, conexion());
    $sql_ins2 = "INSERT INTO rmb_residente_x_aptos (rmb_residente_id, rmb_aptos_id, rmb_tres_id) VALUES ('$nex_id', '".$_POST['id_apto']."', '6');";
    $res_ins = mysql_query($sql_ins2, conexion());
    if($res_ins and $sql_ins2){
        mysql_query("COMMIT", conexion());
        echo $_POST['id_apto'];
    }
    else{
        mysql_query("ROLLBACK", conexion());
        echo "";
    }


}
?>