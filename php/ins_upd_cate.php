<?php session_start();
require_once ("../conexion/conexion.php");
require_once ("funciones.php");
$tabla = "rmb_eva_cate";
if(isset($_POST['id_sup'])){
    $sql_borrar = "DELETE FROM $tabla WHERE ".$tabla."_id = ".$_POST['id_sup']."";
    $res_borrar = mysql_query($sql_borrar, conexion());
    if($res_borrar){
        echo "Se borro el registro Nº ".$nom_id;
    }
}
else if(isset($_POST['id_upd'])){
    $sql_upd = "UPDATE ".$tabla." SET rmb_eva_cate_nom = '".$_POST['rmb_eva_cate_nom']."', rmb_eva_cate_fecha = NOW(), rmb_eva_cate_user = ".$_SESSION['UsuID']." WHERE ".$tabla."_id = ".$_POST['id_upd'];
    $res_upd = mysql_query($sql_upd, conexion());
    if($res_upd){echo $_POST['id_upd'];}
}
else{
    $nex_id = NextID('rmb_admon', 'rmb_eva_cate');
    $sql_ins = "INSERT INTO ".$tabla." (rmb_eva_cate_nom, rmb_eva_cate_fecha, rmb_eva_cate_user) VALUES ('".$_POST['rmb_eva_cate_nom']."', NOW(), ".$_SESSION['UsuID'].")";
    $res_ins = mysql_query($sql_ins, conexion());
    if($res_ins){echo $nex_id;}
}?>