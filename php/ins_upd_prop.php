<?php session_start();
require_once ("../conexion/conexion.php");
require_once ("funciones.php");
$tabla = "rmb_residente";
$path = "../images/fotos/";
$path2 = "../images/residentes/";
if(isset($_POST['id_sup'])){
    $nom_id = $_POST['id_sup'];
    // Se usa una transaccion para asegurarnos de que se borran los registros de todas las tablas
    // Inciamos la transaccion
    $sql_beg = "BEGIN;";
    $res_beg = mysql_query($sql_beg, conexion());
    // Borramos el registro de la tabla del residente
    $sql_borrar = "DELETE FROM $tabla WHERE ".$tabla."_id = ".$_POST['id_sup']."";
    $res_borrar = mysql_query($sql_borrar, conexion());
    // Borramos el registro de la tabla de residentes por apartamento
    $sql_borrar_rxa = "DELETE FROM rmb_residente_x_aptos WHERE ".$tabla."_id = ".$_POST['id_sup']."";
    $res_borrar_rxa = mysql_query($sql_borrar_rxa, conexion());
    // Si se envia el tipo de residente hace esto
    if(isset($_POST['tipo_res'])){
        // si el residente es de tipo empleado se borran los registros por horio que se encuentren
        if($_POST['tipo_res'] == '5'){
            $sql_del_h = "DELETE FROM rmb_horarios WHERE rmb_residente_id = ".$_POST['id_sup']."";
            $res_del_h = mysql_query($sql_del_h, conexion());
        }
        // S iel tipo de residente es propietario se borran los archivos que se tengan por certificado de tradicion de ese residente
        if($_POST['tipo_res'] == '1'){
            foreach (scandir($path2) as $item3) {
                if ($item3 == '.' || $item3 == '..'){continue;}
                else{
                    $nom_arch3 = explode(".", $item3);
                    if($nom_arch3[0] == "certificado-tradicion-".$nom_id){unlink($path2.$item3);}
                }       
            }
        }
    }
    if(($res_beg) && ($res_borrar) && ($res_borrar_rxa)){
        foreach (scandir($path) as $item) {
            if ($item == '.' || $item == '..'){continue;}
            else{
                $nom_arch = explode(".", $item);
                if($nom_arch[0] == $nom_id."_foto"){unlink($path.$item);}
            }       
        }
        foreach (scandir($path2) as $item2) {
            if ($item2 == '.' || $item2 == '..'){continue;}
            else{
                $nom_arch2 = explode(".", $item2);
                if($nom_arch2[0] == "pasado-judicial-".$nom_id){unlink($path2.$item2);}
            }       
        }
        $sql_com = "COMMIT;";
        $res_com = mysql_query($sql_com, conexion());
        echo "Se borro el registro";
    }
    else{
        $sql_rol = "ROLLBACK;";
        $res_rol = mysql_query($sql_rol, conexion());
    }
}
else if(isset($_POST['id_upd'])){
    $sq = 0;$sw = 0;
    $campos = "";
    $sql_upd = "";
    foreach($_POST as $key => $value){
        if(($key <> 'id_upd') && ($key <> 'id_apto') && ($key <> 'tipo_res') && ($key <> 'rmb_residente_foto') && ($key <> 'rmb_residente_perm') && ($key <> 'tipo_nom') && ($key <> 'rmb_residente_cert') && ($key <> 'rmb_horarios_dia') && ($key <> 'rmb_horarios_hent_1') && ($key <> 'rmb_horarios_hsal_1') && ($key <> 'rmb_horarios_hent_2') && ($key <> 'rmb_horarios_hsal_2') && ($key <> 'rmb_horarios_hent_3') && ($key <> 'rmb_horarios_hsal_3') && ($key <> 'rmb_horarios_hent_4') && ($key <> 'rmb_horarios_hsal_4') && ($key <> 'rmb_horarios_hent_5') && ($key <> 'rmb_horarios_hsal_5') && ($key <> 'rmb_horarios_hent_6') && ($key <> 'rmb_horarios_hsal_6') && ($key <> 'rmb_horarios_hent_7') && ($key <> 'rmb_horarios_hsal_7') && ($key <> 'rmb_horarios_obs')){
            if($sq == 0){
                if(($key == 'rmb_residente_hijo') || ($key == 'rmb_residente_vive')){
                    $campos .= $key."=".mysql_escape_string($value);
                }
                else{
                    $campos .= $key."='".mysql_escape_string($value)."'";
                }
            }
            else{
                if(($key == 'rmb_residente_hijo') || ($key == 'rmb_residente_vive')){
                    $campos .= ", ".$key."=".mysql_escape_string($value);
                }
                else{
                    $campos .= ", ".$key."='".mysql_escape_string($value)."'";
                }
            }
            $sq += 1;
        }
    }

    //comprobamos que sea una petición ajax
    if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest'){
        //obtenemos el archivo de la foto a subir.
        $file = $_FILES['rmb_residente_foto']['name'];
        if($file){
            $nom_id = $_POST['id_upd']."_foto";
            $extension = pathinfo($file, PATHINFO_EXTENSION);
            $nom_file = $nom_id.".".$extension;
            //comprobamos si existe un directorio para subir el archivo si no es así, lo creamos
            if(!is_dir($path)){mkdir($path, 0777);}
            //si existe el archivo lo eliminamos
            if (file_exists($path.$nom_file)) {unlink($path.$nom_file);}                         
            //comprobamos si el archivo ha subido
            if ($file && move_uploaded_file($_FILES['rmb_residente_foto']['tmp_name'], $path.$nom_file)){              
                $campos .= ", rmb_residente_foto = '".$path.$nom_file."'";
            }
        }
        //obtenemos el archivo del pasado judicial a subir.
        $file2 = $_FILES['rmb_residente_perm']['name'];
        if($file2){
            $nom_id2 = "pasado-judicial-".$_POST['id_upd'];
            $extension2 = pathinfo($file2, PATHINFO_EXTENSION);
            $nom_file2 = $nom_id2.".".$extension2;
            //comprobamos si existe un directorio para subir el archivo si no es así, lo creamos
            if(!is_dir($path2)){mkdir($path2, 0777);}
            //si existe el archivo lo eliminamos
            if (file_exists($path2.$nom_file2)) {unlink($path2.$nom_file2);}                         
            //comprobamos si el archivo ha subido
            if ($file2 && move_uploaded_file($_FILES['rmb_residente_perm']['tmp_name'], $path2.$nom_file2)){              
                $campos .= ", rmb_residente_perm = '".$path2.$nom_file2."'";
            }
        }
        //obtenemos el archivo del pasado judicial a subir.
        $file3 = $_FILES['rmb_residente_cert']['name'];
        if($file3){
            $nom_id3 = "certificado-tradicion-".$_POST['id_upd'];
            $extension3 = pathinfo($file3, PATHINFO_EXTENSION);
            $nom_file3 = $nom_id3.".".$extension3;
            //comprobamos si existe un directorio para subir el archivo si no es así, lo creamos
            if(!is_dir($path2)){mkdir($path2, 0777);}
            //si existe el archivo lo eliminamos
            if (file_exists($path2.$nom_file3)) {unlink($path2.$nom_file3);}                         
            //comprobamos si el archivo ha subido
            if ($file3 && move_uploaded_file($_FILES['rmb_residente_cert']['tmp_name'], $path2.$nom_file3)){              
                $campos .= ", rmb_residente_cert = '".$path2.$nom_file3."'";
            }
        }
    }

    // Bloque de codigo que agrega los horarios de trabajo de las personas que trabajan en el apatarmento
    if(isset($_POST['tipo_res'])){
        // Si el tipo de residente es empleado hace esto
        if($_POST['tipo_res'] == '5'){
            // Borramos todos los registros de la tabla de horarios que esten realcionados con el usuario a actualizar
            $sql_upd_del = "DELETE FROM rmb_horarios WHERE rmb_residente_id = '".$_POST['id_upd']."'";
            $res_del = mysql_query($sql_upd_del, conexion());
            // Si se envian datos de dias para horarios hace esto
            if(isset($_POST['rmb_horarios_dia'])){
                // para cada dia enviado hace esto
                for($i = 0; $i < count($_POST['rmb_horarios_dia']); $i++){
                    $val_dia = $_POST['rmb_horarios_dia'][$i];
                    $nom_val_ing = "rmb_horarios_hent_".$val_dia;
                    $nom_val_sal = "rmb_horarios_hsal_".$val_dia;
                    // Se agregar los registros enviados
                    $sql_upd_h = "INSERT INTO rmb_horarios (rmb_horarios_dia, rmb_horarios_hent, rmb_horarios_hsal, rmb_residente_id, rmb_horarios_fecha, rmb_horarios_user, rmb_horarios_fini, rmb_horarios_ffin, rmb_horarios_obs) VALUES ('".$_POST['rmb_horarios_dia'][$i]."', '".$_POST[$nom_val_ing]."', '".$_POST[$nom_val_sal]."', '".$_POST['id_upd']."', NOW(), ".$_SESSION['UsuID'].", '".$_POST['rmb_horarios_fini']."', '".$_POST['rmb_horarios_ffin']."', '".$_POST['rmb_horarios_obs']."');";
                    $res_ins = mysql_query($sql_upd_h, conexion());
                    // si algo sale mal suma un valor a la variable
                    if(!$res_ins){$sw += 1;}
                }
            }
        }
    }
    

    $campos .= ", rmb_residente_fecha = NOW(), rmb_residente_user = '".$_SESSION['UsuID']."'";
    $sql_upd = "UPDATE ".$tabla." SET ".$campos." WHERE ".$tabla."_id = '".$_POST['id_upd']."'";
    $res_upd = mysql_query($sql_upd, conexion());
    if($res_upd && $sw == 0){echo $_POST['id_upd'];}
}
else{
    $nex_id = NextID('rmb_admon', 'rmb_residente');
    $sq = 0;$sw = 0;
    $campo = "";
    $valor = "";
    foreach($_POST as $key=>$value){
        if(($key <> 'ins') && ($key <> 'id_apto') && ($key <> 'tipo_res') && ($key <> 'tipo_nom') && ($key <> 'rmb_residente_foto') && ($key <> 'rmb_residente_perm') && ($key <> 'rmb_residente_cert') && ($key <> 'rmb_horarios_dia') && ($key <> 'rmb_horarios_hent_1') && ($key <> 'rmb_horarios_hsal_1') && ($key <> 'rmb_horarios_hent_2') && ($key <> 'rmb_horarios_hsal_2') && ($key <> 'rmb_horarios_hent_3') && ($key <> 'rmb_horarios_hsal_3') && ($key <> 'rmb_horarios_hent_4') && ($key <> 'rmb_horarios_hsal_4') && ($key <> 'rmb_horarios_hent_5') && ($key <> 'rmb_horarios_hsal_5') && ($key <> 'rmb_horarios_hent_6') && ($key <> 'rmb_horarios_hsal_6') && ($key <> 'rmb_horarios_hent_7') && ($key <> 'rmb_horarios_hsal_7') && ($key <> 'rmb_horarios_obs')){
            if($sq == 0){
                $campo .= $key;
                if(($key == 'rmb_residente_hijo') || ($key == 'rmb_residente_vive') || ($key == 'rmb_gen_id')){
                    $valor .= trim($value);
                }
                else{
                    $valor .= "'".trim($value)."'";
                }
            }
            else{
                $campo .= ",".$key;
                if(($key == 'rmb_residente_hijo') || ($key == 'rmb_residente_vive') || ($key == 'rmb_gen_id')){
                    $valor .= ",".trim($value);
                }
                else{
                    $valor .= ",'".trim($value)."'";
                }
            }            
            $sq += 1;
        }
    }
    //comprobamos que sea una petición ajax
    if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest'){
        //obtenemos el archivo de la foto a subir.
        $file = $_FILES['rmb_residente_foto']['name'];
        if($file){
            $nom_id = $nex_id."_foto";
            $extension = pathinfo($file, PATHINFO_EXTENSION);
            $nom_file = $nom_id.".".$extension;
            //comprobamos si existe un directorio para subir el archivo si no es así, lo creamos
            if(!is_dir($path)){mkdir($path, 0777);}
            //si existe el archivo lo eliminamos
            if (file_exists($path.$nom_file)) {unlink($path.$nom_file);}                         
            //comprobamos si el archivo ha subido
            if ($file && move_uploaded_file($_FILES['rmb_residente_foto']['tmp_name'], $path.$nom_file)){              
                $campo .= ", rmb_residente_foto";
                $valor .= ", '".$path.$nom_file."'";
                $docu = "Documento cargado correctamente.\n";
            }
        }
        //obtenemos el archivo del pasado judicial a subir.
        $file2 = $_FILES['rmb_residente_perm']['name'];
        if($file2){
            $nom_id2 = "pasado-judicial-".$nex_id;
            $extension2 = pathinfo($file2, PATHINFO_EXTENSION);
            $nom_file2 = $nom_id2.".".$extension2;
            //comprobamos si existe un directorio para subir el archivo si no es así, lo creamos
            if(!is_dir($path2)){mkdir($path2, 0777);}
            //si existe el archivo lo eliminamos
            if (file_exists($path2.$nom_file2)) {unlink($path2.$nom_file2);}                         
            //comprobamos si el archivo ha subido
            if ($file2 && move_uploaded_file($_FILES['rmb_residente_perm']['tmp_name'], $path2.$nom_file2)){              
                $campos .= ", rmb_residente_perm = '".$path2.$nom_file2."'";
            }
        }
        //obtenemos el archivo del pasado judicial a subir.
        $file3 = $_FILES['rmb_residente_cert']['name'];
        if($file3){
            $nom_id3 = "certificado-tradicion-".$nex_id;
            $extension3 = pathinfo($file3, PATHINFO_EXTENSION);
            $nom_file3 = $nom_id3.".".$extension3;
            //comprobamos si existe un directorio para subir el archivo si no es así, lo creamos
            if(!is_dir($path2)){mkdir($path2, 0777);}
            //si existe el archivo lo eliminamos
            if (file_exists($path2.$nom_file3)) {unlink($path2.$nom_file3);}                         
            //comprobamos si el archivo ha subido
            if ($file3 && move_uploaded_file($_FILES['rmb_residente_cert']['tmp_name'], $path2.$nom_file3)){              
                $campos .= ", rmb_residente_cert = '".$path2.$nom_file3."'";
            }
        }
    }

    // Bloque de codigo que agrega los horarios de trabajo de las personas que trabajan en el apatarmento
    if(isset($_POST['tipo_res'])){
        // Si el tipo de residente es empleado hace esto
        if($_POST['tipo_res'] == '5'){
            // Borramos todos los registros de la tabla de horarios que esten realcionados con el usuario a actualizar
            $sql_upd_del = "DELETE FROM rmb_horarios WHERE rmb_residente_id = '".$nex_id."')";
            $res_del = mysql_query($sql_upd_del, conexion());
            // Si se envian datos de dias para horarios hace esto
            if(isset($_POST['rmb_horarios_dia'])){
                // para cada dia enviado hace esto
                for($i = 0; $i < count($_POST['rmb_horarios_dia']); $i++){
                    $val_dia = $_POST['rmb_horarios_dia'][$i];
                    $nom_val_ing = "rmb_horarios_hent_".$val_dia;
                    $nom_val_sal = "rmb_horarios_hsal_".$val_dia;
                    // Se agregar los registros enviados
                    $sql_upd_h = "INSERT INTO rmb_horarios (rmb_horarios_dia, rmb_horarios_hent, rmb_horarios_hsal, rmb_residente_id, rmb_horarios_fecha, rmb_horarios_user, rmb_horarios_fini, rmb_horarios_ffin, rmb_horarios_obs) VALUES ('".$_POST['rmb_horarios_dia'][$i]."', '".$_POST[$nom_val_ing]."', '".$_POST[$nom_val_sal]."', '".$nex_id."', NOW(), ".$_SESSION['UsuID'].", '".$_POST['rmb_horarios_fini']."', '".$_POST['rmb_horarios_ffin']."', '".$_POST['rmb_horarios_obs']."');";
                    // echo $sql_upd_h."";
                    $res_ins = mysql_query($sql_upd_h, conexion());
                    // si algo sale mal suma un valor a la variable
                    if(!$res_ins){$sw += 1;}
                }
            }
        }
    }

    $campo .= ", rmb_residente_fecha, rmb_residente_user";
    $valor .= ", NOW(), ".$_SESSION['UsuID'];

    mysql_query("SET AUTOCOMMIT=0", conexion());
    mysql_query("START TRANSACTION", conexion());

    $sql_ins2 = "INSERT INTO rmb_residente_x_aptos (rmb_residente_id, rmb_aptos_id, rmb_tres_id) VALUES ('$nex_id', '".$_POST['id_apto']."', '".$_POST['tipo_res']."')";
    $res_ins2 = mysql_query($sql_ins2, conexion());
    $sql_ins = "INSERT INTO ".$tabla." (".$campo.") VALUES (".$valor.")";
    $res_ins = mysql_query($sql_ins, conexion());
    if($res_ins && $res_ins2){
        mysql_query("COMMIT", conexion());
        // echo $sql_ins ." - ". $sql_ins2;
        echo $_POST['id_apto'];
    }
    else{
        mysql_query("ROLLBACK", conexion());
        // echo $sql_ins ." - ". $sql_ins2;
    }
}
?>