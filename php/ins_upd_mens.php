<?php session_start();
require_once ("../conexion/conexion.php");
require_once ("funciones.php");
$tabla = "rmb_mens";
$nex_id = NextID('rmb_admon', 'rmb_mens');
if(isset($_POST['id_sup'])){
    $sql_borrar = "DELETE FROM $tabla WHERE ".$tabla."_id = ".$_POST['id_sup']."";
    $res_borrar = mysql_query($sql_borrar, conexion());
    if($res_borrar){
        $nom_id = $_POST['id_sup'];
        echo "Se borro el registro Nº ".$nom_id;
    }
}
else if(isset($_POST['id_upd_respuesta'])){
    // $campos .= ", rmb_residente_fecha = NOW(), rmb_residente_user = '".$_SESSION['UsuID']."'";
    $campo = "";
    $valor = "";
    $sq = 0;
    foreach($_POST as $key=>$value){
        if(($key <> 'id_upd_respuesta') && ($key <> 'rmb_residente_id')){
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

    $campo .= ",rmb_est_id,rmb_mens_fenv";
    $valor .= ",5,NOW()";

    mysql_query("SET AUTOCOMMIT=0", conexion());
    mysql_query("START TRANSACTION", conexion());

    $sql_ins = "INSERT INTO ".$tabla." (".$campo.") VALUES (".$valor.")";
    $res_ins = mysql_query($sql_ins, conexion());
    if($res_ins){
        if (isset($_POST['rmb_residente_id'])) {
            $sql_ins_de = "INSERT INTO rmb_mens_dest (rmb_mens_id, rmb_residente_id, rmb_mens_dest_tipo) VALUES (".$nex_id.", ".$_SESSION['UsuID'].", 'de')";
            $res_ins_de = mysql_query($sql_ins_de, conexion());
            if($res_ins_de){
                $sql_ins_dest = "INSERT INTO rmb_mens_dest (rmb_mens_id, rmb_residente_id, rmb_mens_dest_tipo) VALUES (".$nex_id.", ".$_POST['rmb_residente_id'].", 'para')";
                $res_ins_dest = mysql_query($sql_ins_dest, conexion());
            }
            // echo $sql_ins." - ".$sql_ins_dest."\n";
        }
        $sql_upd = "UPDATE $tabla SET rmb_est_id = '6' WHERE rmb_mens_id = '".$_POST['id_upd_respuesta']."'";
        $res_upd = mysql_query($sql_upd, conexion());
        mysql_query("COMMIT", conexion());
        echo $nex_id;
    }
    else{
        mysql_query("ROLLBACK", conexion());
    }
}
else if(isset($_POST['id_upd_reenvío'])){
    // $campos .= ", rmb_residente_fecha = NOW(), rmb_residente_user = '".$_SESSION['UsuID']."'";
    $campo = "";
    $valor = "";
    $sq = 0;
    foreach($_POST as $key=>$value){
        if(($key <> 'id_upd_reenvío') && ($key <> 'rmb_residente_id') && ($key <> 'destinatarios-para') && ($key <> 'rmb_mens_todo_original') && ($key <> 'rmb_mens_mens')){
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

    $campo .= ",rmb_est_id,rmb_mens_fenv,rmb_mens_mens";
    $valor .= ",5,NOW(),'".$_POST['rmb_mens_mens']."<br>".$_POST['rmb_mens_todo_original']."'";

    mysql_query("SET AUTOCOMMIT=0", conexion());
    mysql_query("START TRANSACTION", conexion());

    $sql_ins = "INSERT INTO ".$tabla." (".$campo.") VALUES (".$valor.")";
    $res_ins = mysql_query($sql_ins, conexion());
    if($res_ins){
        if (isset($_POST['destinatarios-para'])) {
            $sql_ins_de = "INSERT INTO rmb_mens_dest (rmb_mens_id, rmb_residente_id, rmb_mens_dest_tipo) VALUES (".$nex_id.", ".$_SESSION['UsuID'].", 'de')";
            $res_ins_de = mysql_query($sql_ins_de, conexion());
            $exp_para = explode(",", $_POST['destinatarios-para']);
            if(count($exp_para) > 1){
                for ($i = 0; $i < count($exp_para); $i++) { 
                    $sql_ins_dest = "INSERT INTO rmb_mens_dest (rmb_mens_id, rmb_residente_id, rmb_mens_dest_tipo) VALUES (".$nex_id.", ".$exp_para[$i].", 'para')";
                    $res_ins_dest = mysql_query($sql_ins_dest, conexion());
                }
            }
            else{
                $sql_ins_dest = "INSERT INTO rmb_mens_dest (rmb_mens_id, rmb_residente_id, rmb_mens_dest_tipo) VALUES (".$nex_id.", ".$_POST['destinatarios-para'].", 'para')";
                $res_ins_dest = mysql_query($sql_ins_dest, conexion());
            }
        }
        mysql_query("COMMIT", conexion());
        echo $nex_id;
    }
    else{
        mysql_query("ROLLBACK", conexion());
    }
}
else{
    $campo = "";
    $valor = "";
    $sq = 0;
    foreach($_POST as $key=>$value){
        if(($key <> 'rmb_residente_id') && ($key <> 'destinatarios-para')){
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

    $campo .= ",rmb_est_id,rmb_mens_fenv";
    $valor .= ",5,NOW()";

    mysql_query("SET AUTOCOMMIT=0", conexion());
    mysql_query("START TRANSACTION", conexion());

    $sql_ins = "INSERT INTO ".$tabla." (".$campo.") VALUES (".$valor.")";
    $res_ins = mysql_query($sql_ins, conexion());
    if($res_ins){
        if (isset($_POST['destinatarios-para'])) {
            $sql_ins_de = "INSERT INTO rmb_mens_dest (rmb_mens_id, rmb_residente_id, rmb_mens_dest_tipo) VALUES (".$nex_id.", ".$_SESSION['UsuID'].", 'de')";
            $res_ins_de = mysql_query($sql_ins_de, conexion());
            $exp_para = explode(",", $_POST['destinatarios-para']);
            if(count($exp_para) > 1){
                for ($i = 0; $i < count($exp_para); $i++) { 
                    $sql_ins_dest = "INSERT INTO rmb_mens_dest (rmb_mens_id, rmb_residente_id, rmb_mens_dest_tipo) VALUES (".$nex_id.", ".$exp_para[$i].", 'para')";
                    $res_ins_dest = mysql_query($sql_ins_dest, conexion());
                    // echo "es mayor a 0".$sql_ins_dest."\n";
                }
            }
            else{
                $sql_ins_dest = "INSERT INTO rmb_mens_dest (rmb_mens_id, rmb_residente_id, rmb_mens_dest_tipo) VALUES (".$nex_id.", ".$_POST['destinatarios-para'].", 'para')";
                $res_ins_dest = mysql_query($sql_ins_dest, conexion());
                // echo $sql_ins_dest;
            }
            // echo $sql_ins." - ".$sql_ins_dest."\n";
        }
        mysql_query("COMMIT", conexion());
        echo $nex_id;
    }
    else{
        mysql_query("ROLLBACK", conexion());
    }
}?>