<?php session_start();
require_once ("../conexion/conexion.php");
require_once ("funciones.php");
$tabla = "rmb_pagos";
$id_apto = $_POST['id_apto2'];
if(isset($_POST['id_sup'])){
    $sql = "BEGIN;";
    $res_sql = mysql_query($sql, conexion());
    $sql_borrar = "DELETE FROM $tabla WHERE ".$tabla."_id = ".$_POST['id_sup']."";
    $res_borrar = mysql_query($sql_borrar, conexion());
    $valor_tes = 0;
    $sql_tes = "SELECT c.rmb_tes_concep_val, tp.rmb_tpago_ope FROM rmb_tes_concep c LEFT JOIN rmb_tpago tp USING(rmb_tpago_id) WHERE c.rmb_pagos_id = '".$_POST['rmb_pagos_id']."'";
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
    $sql_upd_tes = "UPDATE rmb_pagos SET rmb_pagos_valor = $valor_tes WHERE rmb_pagos_id = '".$_POST['rmb_pagos_id']."'";
    $res_upd_tes = mysql_query($sql_upd_tes, conexion());

    if(($res_sql) && ($res_tes) && ($res_upd_tes)){
        $sql_ok = "COMMIT;";
        $res_ok = mysql_query($sql_ok, conexion());
        echo $sql."\n".$sql_borrar."\n".$sql_tes."\n".$sql_upd_tes."\n".$valor_tes;
    }
    else{
        $sql_ok = "ROLLBACK;";
        $res_ok = mysql_query($sql_ok, conexion());
    }
}
else if(isset($_POST['id_upd'])){
    $sql_upd_tes = "UPDATE rmb_pagos SET rmb_pagos_fpago = '".$_POST['rmb_pagos_fpago']."', rmb_fpago_id = '".$_POST['rmb_fpago_id']."', rmb_tesoreria_id = ".$_POST['rmb_tesoreria_id'].",  rmb_pagos_valor = ".$_POST['rmb_pagos_valor'].", rmb_pagos_obs = '".$_POST['rmb_pagos_obs']."', rmb_pagos_fecha = NOW(), rmb_pagos_user = ".$_SESSION['UsuID']." WHERE rmb_pagos_id = '".$_POST['id_upd']."'";
    echo $sql_upd_tes;
    $res_upd_tes = mysql_query($sql_upd_tes, conexion());
    if($res_upd_tes){
        $deuda_ant = 0;
        // Consultamos el valor de la deuda con fecha inferior a la fecha de este pago
        $res_deuda = registroCampo("rmb_tesoreria tes", "SUM(tes.rmb_tesoreria_val)", "WHERE tes.rmb_aptos_id = '$id_apto' AND DATE_FORMAT(tes.rmb_tesoreria_fpag,'%Y-%m-%d') <= '".$_POST['rmb_pagos_fpago']."'", "GROUP BY tes.rmb_aptos_id", "");
        if($res_deuda){
            if(mysql_num_rows($res_deuda) > 0){
                $row_deuda = mysql_fetch_array($res_deuda);
                $deuda_ant = $row_deuda[0];
            }
        }
        $pago_ant = 0;
        // consultamos el valor total pagado hasta la fecha de estre pago
        $res_pago = registroCampo("rmb_pagos p", "SUM(p.rmb_pagos_valor)", "LEFT JOIN rmb_tesoreria tes USING(rmb_tesoreria_id) WHERE tes.rmb_aptos_id = '$id_apto' AND DATE_FORMAT(p.rmb_pagos_fpago,'%Y-%m-%d') <= '".$_POST['rmb_pagos_fpago']."'", "GROUP BY tes.rmb_aptos_id", "");
        if($res_pago){
            if(mysql_num_rows($res_pago) > 0){
                $row_pago = mysql_fetch_array($res_pago);
                $pago_ant = $row_pago[0];
            }
        }
        $saldo = $deuda_ant - $pago_ant;
        if($saldo > 0){
            // Debe
            $sql_est_tes = "SELECT rmb_est_id FROM rmb_tesoreria WHERE rmb_tesoreria_id <> ".$_POST['rmb_tesoreria_id']." AND rmb_tesoreria_fpag,'%Y-%m-%d') <= '".$_POST['rmb_pagos_fpago']."' AND rmb_aptos_id = '$id_apto' ORDER BY rmb_tesoreria_fpag DESC LIMIT 1";
            $res_est_tes = mysql_query($sql_est_tes, conexion());
            if($res_est_tes){
                if(mysql_num_rows($res_est_tes) > 0){
                    $row_est_tes = mysql_fetch_array($sql_est_tes);
                    if($row_est_tes[0] == 17){
                        $new_est_tes = 18;
                    }
                    elseif($row_est_tes[0] == 18){
                        $new_est_tes = 19;
                    }
                    else{
                        $new_est_tes = 20;
                    }
                }
            }
        }
        else{
            // a favor
            $new_est_tes = 17;
        }
        $sql_upd_est_tes = "UPDATE rmb_tesoreria SET rmb_est_id = $new_est_tes WHERE rmb_tesoreria_id = ".$_POST['rmb_tesoreria_id'];
        $res_upd_est_tes = mysql_query($sql_upd_est_tes, conexion());
        if($res_upd_est_tes){
            echo $_POST['id_upd'];
        }
        
    }
}
else{
    $rmb_pagos_id = NextID('rmb_admon', 'rmb_pagos');
    $sql_pagos = "INSERT INTO $tabla (rmb_pagos_fpago, rmb_pagos_valor, rmb_pagos_obs, rmb_tesoreria_id, rmb_fpago_id, rmb_pagos_fecha, rmb_pagos_user) VALUES ('".$_POST['rmb_pagos_fpago']."', '".$_POST['rmb_pagos_valor']."', '".$_POST['rmb_pagos_obs']."', ".$_POST['rmb_tesoreria_id'].", ".$_POST['rmb_fpago_id'].", NOW(), ".$_SESSION['UsuID'].")";
    $res_pagos = mysql_query($sql_pagos, conexion());
    if($res_pagos){
        echo $rmb_pagos_id;
    }
}
?>