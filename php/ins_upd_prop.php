<?php session_start();
require_once ("../conexion/conexion.php");
require_once ("funciones.php");
$tabla = "rmb_residente";
$path = "../images/fotos/";
$path2 = "../images/residentes/";
if(isset($_POST['id_sup'])){
    $sql_borrar = "DELETE FROM $tabla WHERE ".$tabla."_id = ".$_POST['id_sup']."";
    $res_borrar = mysql_query($sql_borrar, conexion());
    if($res_borrar){
        $nom_id = $_POST['id_sup'];
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
        echo "Se borro el registro";
    }
}
else if(isset($_POST['id_upd'])){
    $sq = 0;$sw = 0;
    $campos = "";
    $sql_upd = "";
    foreach($_POST as $key => $value){
        if(($key <> 'id_upd') && ($key <> 'id_apto') && ($key <> 'tipo_res') && ($key <> 'rmb_residente_foto') && ($key <> 'rmb_residente_perm')){
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
    }   
    $campos .= ", rmb_residente_fecha = NOW(), rmb_residente_user = '".$_SESSION['UsuID']."'";
    $sql_upd = "UPDATE ".$tabla." SET ".$campos." WHERE ".$tabla."_id = '".$_POST['id_upd']."'";
    $res_upd = mysql_query($sql_upd, conexion());
    if($res_upd){echo $_POST['id_upd'];}
}
else{
    $nex_id = NextID('rmb_admon', 'rmb_residente');
    $sq = 0;$sw = 0;
    $campo = "";
    $valor = "";
    foreach($_POST as $key=>$value){
        if(($key <> 'ins') && ($key <> 'id_apto') && ($key <> 'tipo_res') && ($key <> 'rmb_residente_foto') && ($key <> 'rmb_residente_perm')){
            if($sq == 0){
                $campo .= $key;
                if(($key == 'rmb_residente_hijo') || ($key == 'rmb_residente_vive')){
                    $valor .= trim($value);
                }
                else{
                    $valor .= "'".trim($value)."'";
                }
            }
            else{
                $campo .= ",".$key;
                if(($key == 'rmb_residente_hijo') || ($key == 'rmb_residente_vive')){
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
    }


    $campo .= ", rmb_residente_fecha, rmb_residente_user";
    $valor .= ", NOW(), ".$_SESSION['UsuID'];

    mysql_query("SET AUTOCOMMIT=0", conexion());
    mysql_query("START TRANSACTION", conexion());

    $sql_ins = "INSERT INTO ".$tabla." (".$campo.") VALUES (".$valor.")";
    $res_ins = mysql_query($sql_ins, conexion());
    $sql_ins2 = "INSERT INTO rmb_residente_x_aptos (rmb_residente_id, rmb_aptos_id, rmb_tres_id) VALUES ('$nex_id', '".$_POST['id_apto']."', '".$_POST['tipo_res']."')";
    $res_ins2 = mysql_query($sql_ins2, conexion());
    if($res_ins and $res_ins2){
        mysql_query("COMMIT", conexion());
        echo $_POST['id_apto'];
    }
    else{
        mysql_query("ROLLBACK", conexion());
        echo $sql_ins ." - ". $sql_ins2;
    }
}
?>