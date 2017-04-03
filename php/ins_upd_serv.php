<?php session_start();
require_once ("../conexion/conexion.php");
require_once ("funciones.php");
$tabla = "rmb_servicios";
if(isset($_POST['id_sup'])){
    $sql_del = "DELETE FROM $tabla WHERE rmb_servicios_id = '".$_POST['id_sup']."'";
    $res_del = mysql_query($sql_del, conexion());
    if($res_del){
        echo "Borrado correcto";
    }
}
else if(isset($_POST['id_upd'])){
    $sql_upd = "UPDATE $tabla SET rmb_serviciostipo_id = ".$_POST['rmb_serviciostipo_id'].", rmb_servicios_valor = '".$_POST['rmb_servicios_valor']."', rmb_servicios_fini = '".$_POST['rmb_servicios_fini']."', rmb_servicios_ffin = '".$_POST['rmb_servicios_ffin']."', rmb_servicios_fopo = '".$_POST['rmb_servicios_fopo']."', rmb_servicios_fult = '".$_POST['rmb_servicios_fult']."', rmb_servicios_fpag = '".$_POST['rmb_servicios_fpag']."', rmb_servicios_consumo = '".$_POST['rmb_servicios_consumo']."', rmb_servicios_fecha = NOW(), rmb_servicios_user = '".$_SESSION['UsuID']."' WHERE rmb_servicios_id = '".$_POST['id_upd']."'";
    $res_ins = mysql_query($sql_upd, conexion());
    if($res_ins){
        echo "Actualización correcta";
    }
}
else{
    $sql_ins = "INSERT INTO $tabla (rmb_serviciostipo_id, rmb_servicios_valor, rmb_servicios_fini, rmb_servicios_ffin, rmb_servicios_fopo, rmb_servicios_fult, rmb_servicios_fpag, rmb_servicios_consumo, rmb_servicios_fecha, rmb_servicios_user) VALUES (".$_POST['rmb_serviciostipo_id'].", '".$_POST['rmb_servicios_valor']."', '".$_POST['rmb_servicios_fini']."', '".$_POST['rmb_servicios_ffin']."', '".$_POST['rmb_servicios_fopo']."', '".$_POST['rmb_servicios_fult']."', '".$_POST['rmb_servicios_fpag']."', '".$_POST['rmb_servicios_consumo']."', NOW(), '".$_SESSION['UsuID']."' )";
    $res_ins = mysql_query($sql_ins, conexion());
    if($res_ins){
        echo "Ingreso correcto";
    }
}
?>