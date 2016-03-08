<?php session_start();
require_once ("../conexion/conexion.php");
require_once ("funciones.php");
$tabla = "rmb_mant";
if(isset($_POST['id_sup'])){
    $sql_borrar = "DELETE FROM $tabla WHERE ".$tabla."_id = ".$_POST['id_sup']."";
    $res_borrar = mysql_query($sql_borrar, conexion());
    if($res_borrar){
        $nom_id = $_POST['id_sup'];
        echo "Se borro el registro";
    }
}
else if(isset($_POST['id_upd'])){
    $sq = 0;$sw = 0;
    $campos = "";
    $sql_upd = "";
    foreach($_POST as $key => $value){
        if($key <> 'id_upd'){
            if($sq == 0){$campos .= $key."='".mysql_escape_string($value)."'";}
            else{$campos .= ", ".$key."='".mysql_escape_string($value)."'";}
            $sq += 1;
        }
    }

    // Agregamos los campos fecha y user y le asignamos los valores correspondientes
    $campos .= ", rmb_mant_fecha = NOW(), rmb_mant_user = ".$_SESSION['UsuID'];
    // construimos el sql update con los campos enviados
    $sql_upd = "UPDATE ".$tabla." SET ".$campos." WHERE ".$tabla."_id = '".$_POST['id_upd']."';";
    // ejecutamos la consulta en la base de datos
    $res_upd = mysql_query($sql_upd, conexion());
    // si el sql se realizo correctamente hace esto
    if($res_upd){echo $_POST['id_upd'];}
}
else{
    $nex_id = NextID('rmb_admon', 'rmb_mant');
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
    
    $campo .= ", rmb_mant_fecha, rmb_mant_user";
    $valor .= ", NOW(), ".$_SESSION['UsuID'];
    
    $sql_ins = "INSERT INTO ".$tabla." (".$campo.") VALUES (".$valor.")";
    
    $res_ins = mysql_query($sql_ins, conexion());
    // $used_id = mysql_insert_id(conexion());
    if($res_ins){echo $nex_id;}
}
?>