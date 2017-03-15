<?php session_start();
require_once ("../conexion/conexion.php");
require_once ("funciones.php");
$tabla = "rmb_pagos";
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
    $sq = 0;$sw = 0;
    $campos = "";
    $sql_upd = "";
    $nom_campos = "";
    $nom_campo = "";
    $id_concepto = "";
    foreach($_POST as $key => $value){
        $id_concepto = "";
        $nom_campos = explode("-", $key);
        $nom_campo = $nom_campos[0];
        $id_concepto = $nom_campos[1];

        if(($nom_campo == "rmb_tpago_id") || ($nom_campo == "rmb_tes_concep_val")){
            if($sq == 0){
                $campos .= $nom_campo."=".mysql_escape_string($value);
            }
            else{
                $campos .= ", ".$nom_campo."=".mysql_escape_string($value);
            }
            if($nom_campo == "rmb_tes_concep_val"){
                $sql_upd = "UPDATE ".$tabla." SET ".$campos." WHERE ".$tabla."_id = '".$id_concepto."'";
                $res_upd = mysql_query($sql_upd, conexion());
                if($res_upd){$sw += 1;}
            }
            $sq += 1;
        }
    }
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

    if(($sw == $_POST['id_upd']) && ($res_upd_tes)){echo $_POST['id_upd'];}
}
else{
    $rmb_pagos_id = NextID('rmb_admon', 'rmb_pagos');
    $sql_pagos = "INSERT INTO $tabla (rmb_pagos_fpago, rmb_pagos_valor, rmb_pagos_obs, rmb_tesoreria_id, rmb_fpago_id, rmb_pagos_fecha, rmb_pagos_user) VALUES ('".$_POST['rmb_pagos_fpago']."', '".$_POST['rmb_pagos_valor']."', '".$_POST['rmb_pagos_obs']."', ".$_POST['rmb_tesoreria_id'].", ".$_POST['rmb_fpago_id'].", NOW(), ".$_SESSION['UsuID'].")";
    $res_pagos = mysql_query($sql_pagos, conexion());
    if($res_pagos){
        echo $rmb_pagos_id;
    }
    else{
        echo "INSERT INTO $tabla (rmb_pagos_fpago, rmb_pagos_valor, rmb_pagos_obs, rmb_tesoreria_id, rmb_fpago_id, rmb_pagos_fecha, rmb_pagos_user) VALUES ('".$_POST['rmb_pagos_fpago']."', '".$_POST['rmb_pagos_valor']."', '".$_POST['rmb_pagos_obs']."', ".$_POST['rmb_tesoreria_id'].", ".$_POST['rmb_fpago_id'].", NOW(), ".$_SESSION['UsuID'].")";
    }
}
?>