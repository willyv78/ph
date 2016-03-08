<?php session_start();
require_once ("../conexion/conexion.php");
require_once ("funciones.php");
$num = $_POST['id_apto'];
$sql = "SELECT t.rmb_taptos_nom FROM rmb_aptos_x_taptos axt LEFT JOIN rmb_taptos t USING(rmb_taptos_id) WHERE axt.rmb_aptos_nom = '$num'";
$res = mysql_query($sql, conexion());
// echo $sql;
if($res){
    if(mysql_num_rows($res) > 0){
        $row_sql = mysql_fetch_array($res);
        echo $row_sql[0];
    }
}
?>