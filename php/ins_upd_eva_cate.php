<?php session_start();
require_once ("../conexion/conexion.php");
require_once ("funciones.php");
$tabla = "rmb_eva_cate_x_eva";
if(isset($_POST['id_sup'])){
    $sql_sel_cat = "SELECT rmb_eva_id, rmb_eva_cate_id FROM rmb_eva_tema_x_cate WHERE rmb_eva_tema_x_cate_id = ".$_POST['id_sup'];
    $res_sel_cat = mysql_query($sql_sel_cat, conexion());
    if($res_sel_cat){
        if(mysql_num_rows($res_sel_cat) > 0){
            $row_sel_cat = mysql_fetch_array($res_sel_cat);
            $id_eva = $row_sel_cat[0];
            $id_cat = $row_sel_cat[1];
            $sql_temas = "DELETE FROM rmb_eva_tema_x_cate WHERE rmb_eva_cate_id = ".$id_cat." AND rmb_eva_id = ".$id_eva;
            $res_temas = mysql_query($sql_temas, conexion());
        }
    }
    $sql_borrar = "DELETE FROM $tabla WHERE ".$tabla."_id = ".$_POST['id_sup']."";
    $res_borrar = mysql_query($sql_borrar, conexion());
    if($res_borrar){
        echo "Se borro el registro Nº ".$nom_id;
    }
}
else if(isset($_POST['id_upd'])){
    $sql_upd = "UPDATE ".$tabla." SET rmb_eva_cate_x_eva_peso = ".$_POST['rmb_eva_cate_x_eva_peso'].", rmb_eva_cate_x_eva_punt = ".$_POST['rmb_eva_cate_x_eva_punt'].", rmb_eva_cate_id = ".$_POST['rmb_eva_cate_id'].", rmb_eva_cate_x_eva_fecha = NOW(), rmb_eva_cate_x_eva_user = ".$_SESSION['UsuID']." WHERE ".$tabla."_id = '".$_POST['id_upd']."'";
    $res_upd = mysql_query($sql_upd, conexion());
    if($res_upd){echo $_POST['id_upd'];}
}
else{
    $nex_id = NextID('rmb_admon', 'rmb_eva_cate_x_eva');
    $sql_ins = "INSERT INTO ".$tabla." (rmb_eva_cate_x_eva_peso, rmb_eva_cate_x_eva_punt, rmb_eva_id, rmb_eva_cate_id, rmb_eva_cate_x_eva_fecha, rmb_eva_cate_x_eva_user) VALUES (".$_POST['rmb_eva_cate_x_eva_peso'].", ".$_POST['rmb_eva_cate_x_eva_punt'].", ".$_POST['rmb_eva_id'].", ".$_POST['rmb_eva_cate_id'].", NOW(), ".$_SESSION['UsuID'].")";
    $res_ins = mysql_query($sql_ins, conexion());
    if($res_ins){echo $nex_id;}
}?>