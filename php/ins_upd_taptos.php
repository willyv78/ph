<?php session_start();
require_once ("../conexion/conexion.php");
require_once ("funciones.php");
$tabla = "rmb_taptos";
if(isset($_POST['id_sup'])){
    // SQL para borrar el registro de la tabla de tipo de apartamento
    $sql_borrar = "DELETE FROM $tabla WHERE ".$tabla."_id = ".$_POST['id_sup']."";
    $res_borrar = mysql_query($sql_borrar, conexion());
    // SQL para borrar todos los registros de la tabla que une los apartamentos con los tipos de apartamento
    $sql_borrar_axt = "DELETE FROM rmb_aptos_x_taptos WHERE rmb_taptos_id = ".$_POST['id_sup']; 
    $res_borrar_axt = mysql_query($sql_borrar_axt, conexion());
    // SQL para actualizar la tabla de los apartamentos y dejar en 0 los valores de los campos que se relacionan con el tipo de apartamento
    $sql_upd_aptos = "UPDATE rmb_aptos SET rmb_aptos_area = 0, rmb_aptos_priv = 0, rmb_aptos_banos = 0, rmb_aptos_coc = 0, rmb_aptos_hab = 0, rmb_aptos_balc = 0, rmb_aptos_coef = 0, rmb_aptos_est = 0, rmb_aptos_serv = 0, rmb_aptos_terr = 0, rmb_taptos_id = 0 WHERE rmb_taptos_id = ".$_POST['id_sup'];
    $res_upd_aptos = mysql_query($sql_upd_aptos, conexion());

    if(($res_borrar) && ($res_borrar_axt) && ($res_upd_aptos)){
        $nom_id = $_POST['id_sup'];
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
    // SQL para actualizar la tabla de los apartamentos y dejar en 0 los valores de los campos que se relacionan con el tipo de apartamento
    $sql_upd_aptos = "UPDATE rmb_aptos SET rmb_aptos_area = ".$_POST['rmb_taptos_area'].", rmb_aptos_priv = ".$_POST['rmb_taptos_priv'].", rmb_aptos_banos = ".$_POST['rmb_taptos_banos'].", rmb_aptos_hab = ".$_POST['rmb_taptos_hab'].", rmb_aptos_balc = ".$_POST['rmb_taptos_balc'].", rmb_aptos_coef = ".$_POST['rmb_taptos_coef'].", rmb_aptos_est = ".$_POST['rmb_taptos_est'].", rmb_aptos_serv = ".$_POST['rmb_taptos_serv'].", rmb_aptos_terr = ".$_POST['rmb_taptos_terr']." WHERE rmb_taptos_id = ".$_POST['id_upd'];
    $res_upd_aptos = mysql_query($sql_upd_aptos, conexion());
    if(!$res_upd_aptos){$sw ++;}
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
            if(!$sql_aptos){$sw ++;}
            // SQL para actualizar la tabla de los apartamentos y dejar en 0 los valores de los campos que se relacionan con el tipo de apartamento
            $sql_upd_aptos = "UPDATE rmb_aptos SET rmb_aptos_area = ".$_POST['rmb_taptos_area'].", rmb_aptos_priv = ".$_POST['rmb_taptos_priv'].", rmb_aptos_banos = ".$_POST['rmb_taptos_banos'].", rmb_aptos_hab = ".$_POST['rmb_taptos_hab'].", rmb_aptos_balc = ".$_POST['rmb_taptos_balc'].", rmb_aptos_coef = ".$_POST['rmb_taptos_coef'].", rmb_aptos_est = ".$_POST['rmb_taptos_est'].", rmb_aptos_serv = ".$_POST['rmb_taptos_serv'].", rmb_aptos_terr = ".$_POST['rmb_taptos_terr']." WHERE rmb_aptos_nom = '$value'";
            $res_upd_aptos = mysql_query($sql_upd_aptos, conexion());
            if(!$res_upd_aptos){$sw ++;}
        }
    }
    // si los sql en esta seccion se ejecutaron correctamente hace esto
    if($sw == 0){echo "Todo estuvo bien";}
}
?>