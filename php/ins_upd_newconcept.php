<?php session_start();
require_once ("../conexion/conexion.php");
require_once ("funciones.php");
$rmb_tesoreria_id = $_POST['rmb_tesoreria_id'];
$rmb_tpago_id = $_POST['rmb_tpago_id'];
$rmb_tes_concep_val = $_POST['rmb_tes_concep_val'];
$sq = 0;$sw = 0;
$sql_tes_concept .= "INSERT INTO rmb_tes_concep (rmb_tesoreria_id, rmb_tpago_id, rmb_tes_concep_cant, rmb_tes_concep_val) VALUES ($rmb_tesoreria_id, $rmb_tpago_id, 1, $rmb_tes_concep_val)";
$res_upd_tes_concept = mysql_query($sql_tes_concept, conexion());

$valor_tes = 0;
    $sql_tes = "SELECT c.rmb_tes_concep_val, tp.rmb_tpago_ope FROM rmb_tes_concep c LEFT JOIN rmb_tpago tp USING(rmb_tpago_id) WHERE c.rmb_tesoreria_id = '".$rmb_tesoreria_id."'";
    $res_tes = mysql_query($sql_tes, conexion());
    if($res_tes){
        if(mysql_num_rows($res_tes) > 0){
            while($row_tes = mysql_fetch_array($res_tes)){
                $valor = $row_tes[0];
                $opera = $row_tes[1];
                if($opera == "1"){
                    $valor_tes += $valor;
                }
                else{
                    if($valor_tes >= $valor){
                        $valor_tes = $valor_tes - $valor;
                    }
                    else{
                        $valor_tes = $valor - $valor_tes;
                    }
                }
            }
        }
    }
    $sql_upd_tes = "UPDATE rmb_tesoreria SET rmb_tesoreria_val = $valor_tes WHERE rmb_tesoreria_id = '".$rmb_tesoreria_id."'";
    $res_upd_tes = mysql_query($sql_upd_tes, conexion());

if(($res_upd_tes_concept) && ($res_upd_tes)){echo "OK";}
?>