<?php session_start();
require_once ("../conexion/conexion.php");
require_once ("funciones.php");
$tabla = "rmb_tes_concep";
if(isset($_POST['id_sup'])){
    $sql = "BEGIN;";
    $res_sql = mysql_query($sql, conexion());
    $sql_borrar = "DELETE FROM $tabla WHERE ".$tabla."_id = ".$_POST['id_sup']."";
    $res_borrar = mysql_query($sql_borrar, conexion());
    $valor_tes = 0;
    $sql_tes = "SELECT c.rmb_tes_concep_val, tp.rmb_tpago_ope FROM rmb_tes_concep c LEFT JOIN rmb_tpago tp USING(rmb_tpago_id) WHERE c.rmb_tesoreria_id = '".$_POST['rmb_tesoreria_id']."'";
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
    $sql_upd_tes = "UPDATE rmb_tesoreria SET rmb_tesoreria_val = $valor_tes WHERE rmb_tesoreria_id = '".$_POST['rmb_tesoreria_id']."'";
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
    $sql_tes = "SELECT c.rmb_tes_concep_val, tp.rmb_tpago_ope FROM rmb_tes_concep c LEFT JOIN rmb_tpago tp USING(rmb_tpago_id) WHERE c.rmb_tesoreria_id = '".$_POST['rmb_tesoreria_id']."'";
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
    $sql_upd_tes = "UPDATE rmb_tesoreria SET rmb_tesoreria_val = $valor_tes WHERE rmb_tesoreria_id = '".$_POST['rmb_tesoreria_id']."'";
    $res_upd_tes = mysql_query($sql_upd_tes, conexion());

    if(($sw == $_POST['id_upd']) && ($res_upd_tes)){echo $_POST['id_upd'];}
}
else{
    $rmb_tesoreria_id = NextID('rmb_admon', 'rmb_tesoreria');
    $sql = "BEGIN;";
    $val_tes = 0;
    $rmb_est_id = 20;
    $sq = 0;$sw = 0;
    $campos = "";
    $sql_upd = "";
    $nom_campos = "";
    $nom_campo = "";
    $id_concepto = "";
    $rmb_aptos_id = $_POST['id_apto2'];
    $anio = $_POST['anio'];
    $mes = $_POST['mes'];
    if(strlen($mes) < 2){$mes = "0".$mes;}
    $sql_tes_concept = "";
    $rmb_tes_val = 0;
    $rmb_tesoreria_obs = $_POST['rmb_tesoreria_obs'];
    $rmb_tesoreria_fpag = date($anio.'-'.$mes.'-01');
    $rmb_tesoreria_fven = date($anio.'-'.$mes.'-30');

    // Se consulta si existe un cobro para el mes y el año
    $res_tes = registroCampo("rmb_tesoreria tes", "tes.rmb_tesoreria_id, tes.rmb_tesoreria_val, tes.rmb_est_id", "WHERE tes.rmb_aptos_id = '$rmb_aptos_id' AND DATE_FORMAT(tes.rmb_tesoreria_fpag,'%Y') = '$anio' AND DATE_FORMAT(tes.rmb_tesoreria_fpag,'%m') = '$mes'", "", "");
    if($res_tes){
        if(mysql_num_rows($res_tes) > 0){
            $row_tes = mysql_fetch_array($res_tes);
            $rmb_tesoreria_id = $row_tes[0];
            $val_tes = $row_tes[1];
            $rmb_est_id = $row_tes[2];
            $array_concept = array();
            $sp = 0;
            foreach($_POST as $key => $value){
                $id_concepto = "";
                $nom_campos = explode("-", $key);
                $nom_campo = $nom_campos[0];
                $id_concepto = $nom_campos[1];
                $id_concept = "";
                if(($nom_campo == "rmb_tpago_id") || ($nom_campo == "rmb_tes_concep_val")){
                    // validamos si el campo es el id del tipo de pago
                    if($nom_campo == "rmb_tpago_id"){
                        $rmb_tpago_id = $value;
                        // Consultamos si existe un concepto con un id de tesoreria y un tipo de pago enviado
                        $res_tes_concept = registroCampo("rmb_tes_concep tc", "tc.rmb_tes_concep_id", "WHERE tc.rmb_tesoreria_id = '$rmb_tesoreria_id' AND tc.rmb_tpago_id = '$value'", "", "");
                        if($res_tes_concept){
                            if(mysql_num_rows($res_tes_concept) > 0){
                                $row_tes_concept = mysql_fetch_array($res_tes_concept);
                                $rmb_tes_concep_id = $row_tes_concept[0];
                            }
                        }
                        // Consultamos si el tipo de pago es para sumar o para restar
                        $res_tpago = registroCampo("rmb_tpago tp", "tp.rmb_tpago_ope", "WHERE tp.rmb_tpago_id = $rmb_tpago_id", "", "");
                        if($res_tpago){
                            if(mysql_num_rows($res_tpago) > 0){
                                $row_tpago = mysql_fetch_array($res_tpago);
                                $rmb_tpago_ope = $row_tpago[0];
                            }
                        }
                    }
                    elseif($nom_campo == "rmb_tes_concep_val"){
                        $rmb_tes_concep_val = $value;
                        if($rmb_tes_concep_id <> 0){
                            $sql_tes_concept .= "UPDATE rmb_tes_concep SET rmb_tes_concep_val = $rmb_tes_concep_val WHERE rmb_tes_concep_id = $rmb_tes_concep_id";
                        }
                        else{
                            $sql_tes_concept .= "INSERT INTO rmb_tes_concep (rmb_tesoreria_id, rmb_tpago_id, rmb_tes_concep_cant, rmb_tes_concep_val) VALUES ($rmb_tesoreria_id, $rmb_tpago_id, 1, $rmb_tes_concep_val)";
                        }
                        $rmb_tes_concep_id = 0;
                        // Si la operacion es suma = 1 hace esto
                        if($rmb_tpago_ope == 1){
                            $rmb_tes_val += $rmb_tes_concep_val;
                        }
                        else{
                            $rmb_tes_val -= $rmb_tes_concep_val;
                        }
                    }
                }
            }
            $rmb_tesoreria_val = $rmb_tes_val + $val_tes;
            $sql_tes = "UPDATE rmb_tesoreria SET rmb_tesoreria_obs = '$rmb_tesoreria_obs', rmb_tesoreria_val = $rmb_tesoreria_val, rmb_tesoreria_fecha = NOW(), rmb_tesoreria_user = ".$_SESSION['UsuID']." WHERE rmb_tesoreria_id = $rmb_tesoreria_id";
        }
    }
    // validamos si no se realizo la consulta anterior o no habian resultados hace esto
    if($sql_tes_concept == ""){
        $rmb_tesoreria_id = NextID('rmb_admon', 'rmb_tesoreria');
        $val_tes = 0;
        $array_concept = array();
        $sp = 0;
        foreach($_POST as $key => $value){
            $id_concepto = "";
            $nom_campos = explode("-", $key);
            $nom_campo = $nom_campos[0];
            $id_concepto = $nom_campos[1];
            $id_concept = "";
            if(($nom_campo == "rmb_tpago_id") || ($nom_campo == "rmb_tes_concep_val")){
                // validamos si el campo es el id del tipo de pago
                if($nom_campo == "rmb_tpago_id"){
                    $rmb_tpago_id = $value;
                    // Consultamos si el tipo de pago es para sumar o para restar
                    $res_tpago = registroCampo("rmb_tpago tp", "tp.rmb_tpago_ope", "WHERE tp.rmb_tpago_id = $rmb_tpago_id", "", "");
                    if($res_tpago){
                        if(mysql_num_rows($res_tpago) > 0){
                            $row_tpago = mysql_fetch_array($res_tpago);
                            $rmb_tpago_ope = $row_tpago[0];
                        }
                    }
                }
                else if($nom_campo == "rmb_tes_concep_val"){
                    $rmb_tes_concep_val = $value;
                    $sql_tes_concept .= "INSERT INTO rmb_tes_concep (rmb_tesoreria_id, rmb_tpago_id, rmb_tes_concep_cant, rmb_tes_concep_val) VALUES ($rmb_tesoreria_id, $rmb_tpago_id, 1, $rmb_tes_concep_val";
                    // Si la operacion es suma = 1 hace esto
                    if($rmb_tpago_ope == '1'){
                        $rmb_tes_val += $rmb_tes_concep_val;
                    }
                    else{
                        $rmb_tes_val -= $rmb_tes_concep_val;
                    }
                }
            }
        }
        $res_tes = registroCampo("rmb_tesoreria tes", "tes.rmb_est_id", "WHERE tes.rmb_aptos_id = '$rmb_aptos_id'", "", "ORDER BY tes.rmb_tesoreria_id DESC LIMIT 1");
        if($res_tes){
            if(mysql_num_rows($res_tes) > 0){
                $row_tes = mysql_fetch_array($res_tes);
                $rmb_est_id = $row_tes[0];
            }
        }
        // validamos que estado tiene el ultimo registro de tesoreria para ese apto
        if($rmb_est_id == '17'){
            $rmb_est_id = 18;
        }
        else if($rmb_est_id == '18'){
            $rmb_est_id = 19;
        }
        else if($rmb_est_id == '19'){
            $rmb_est_id = 20;
        }
        $rmb_tesoreria_val = $rmb_tes_val;
        $sql_tes = "INSERT INTO rmb_tesoreria (rmb_tesoreria_fpag, rmb_tesoreria_fven, rmb_tesoreria_obs, rmb_tesoreria_val, rmb_aptos_id, rmb_est_id, rmb_tesoreria_fecha, rmb_tesoreria_user) VALUES ($rmb_tesoreria_fpag, $rmb_tesoreria_fven, '$rmb_tesoreria_obs', $rmb_tesoreria_val, $rmb_aptos_id, $rmb_est_id, NOW(), ".$_SESSION['UsuID'].")";
    }
    $res_sql = mysql_query($sql, conexion());
    $res_tes_concept = mysql_query($sql_tes_concept, conexion());
    $res_sql_tes = mysql_query($sql_tes, conexion());
    if(($res_sql) && ($res_tes_concept) && ($res_sql_tes)){
        $sql_ok = "COMMIT;";
        $res_ok = mysql_query($sql_ok, conexion());
        echo $sql."\n".$sql_tes_concept."\n".$sql_tes."\n".$sql_ok;
    }
    else{
        $sql_ok = "ROLLBACK;";
        $res_ok = mysql_query($sql_ok, conexion());
    }
}
?>