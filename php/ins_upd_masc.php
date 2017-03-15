<?php session_start();
require_once ("../conexion/conexion.php");
require_once ("funciones.php");
$tabla = "rmb_mascotas";
$path = "../images/mascotas/";
if(isset($_POST['id_sup'])){
    $sql_borrar = "DELETE FROM $tabla WHERE ".$tabla."_id = ".$_POST['id_sup']."";
    $res_borrar = mysql_query($sql_borrar, conexion());
    if($res_borrar){
        $nom_id = $_POST['id_sup']."_vac";
        foreach (scandir($path) as $item) {
            if ($item == '.' || $item == '..'){continue;}
            else{
                $nom_arch = explode(".", $item);
                if($nom_arch[0] == $nom_id){unlink($path.$item);}
            }       
        }
        echo "Se borro el registro Nº ".$nom_id;
    }
}
else if(isset($_POST['id_upd'])){
    $sq = 0;$sw = 0;
    $campos = "";
    $sql_upd = "";
    foreach($_POST as $key => $value){
        if(($key <> 'id_upd') && ($key <> 'id_apto') && ($key <> 'tipo_res') && ($key <> 'rmb_mascotas_vac')){
            if($sq == 0){
                if($key == 'rmb_mascotas_aplica'){
                    $campos .= $key."=".mysql_escape_string($value);
                }
                else{
                    $campos .= $key."='".mysql_escape_string($value)."'";
                }
            }
            else{
                if($key == 'rmb_mascotas_aplica'){
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
        $file = $_FILES['rmb_mascotas_vac']['name'];
        if($file){
            $nom_id = $_POST['id_upd']."_vac";
            $extension = pathinfo($file, PATHINFO_EXTENSION);
            $nom_file = $nom_id.".".$extension;
            //comprobamos si existe un directorio para subir el archivo si no es así, lo creamos
            if(!is_dir($path)){mkdir($path, 0777);}
            //si existe el archivo lo eliminamos
            if (file_exists($path.$nom_file)) {unlink($path.$nom_file);}                         
            //comprobamos si el archivo ha subido
            if ($file && move_uploaded_file($_FILES['rmb_mascotas_vac']['tmp_name'], $path.$nom_file)){              
                $campos .= ", rmb_mascotas_vac = '".$path.$nom_file."'";
                $docu = "Documento cargado correctamente.\n";
            }
        }
    }
    $campos .= ", rmb_mascotas_fecha = NOW(), rmb_mascotas_user = '".$_SESSION['UsuID']."'";
    $sql_upd = "UPDATE ".$tabla." SET ".$campos." WHERE ".$tabla."_id = '".$_POST['id_upd']."'";
    $res_upd = mysql_query($sql_upd, conexion());
    if($res_upd){echo $sql_upd;}
    else{echo "";}
}
else{
    $nex_id = NextID('rmb_admon', 'rmb_mascotas');
    $sq = 0;
    $campo = "";
    $valor = "";
    foreach($_POST as $key=>$value){
        if(($key <> 'id_apto')&&($key <> 'id_upd') && ($key <> 'rmb_mascotas_vac')){
            if($sq == 0){
                if($key == 'rmb_mascotas_aplica'){
                    $campo .= $key;
                    $valor .= trim($value);
                }
                else{
                    $campo .= $key;
                    $valor .= "'".trim($value)."'";
                }
            }
            else{
                if($key == 'rmb_mascotas_aplica'){
                    $campo .= ",".$key;
                    $valor .= ",".trim($value);
                }
                else{
                    $campo .= ",".$key;
                    $valor .= ",'".trim($value)."'";
                }
            }            
            $sq += 1;
        }
    }
    //comprobamos que sea una petición ajax
    if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest'){
        //obtenemos el archivo de la foto a subir.
        $file = $_FILES['rmb_mascotas_vac']['name'];
        if($file){
            $nom_id = $nex_id."_vac";
            $extension = pathinfo($file, PATHINFO_EXTENSION);
            $nom_file = $nom_id.".".$extension;
            //comprobamos si existe un directorio para subir el archivo si no es así, lo creamos
            if(!is_dir($path)){mkdir($path, 0777);}
            //si existe el archivo lo eliminamos
            if (file_exists($path.$nom_file)) {unlink($path.$nom_file);}                         
            //comprobamos si el archivo ha subido
            if ($file && move_uploaded_file($_FILES['rmb_mascotas_vac']['tmp_name'], $path.$nom_file)){              
                $campo .= ", rmb_mascotas_vac";
                $valor .= ", '".$path.$nom_file."'";
                $docu = "Documento cargado correctamente.\n";
            }
        }
    }
    $campo .= ", rmb_aptos_id, rmb_mascotas_fecha, rmb_mascotas_user";
    $valor .= ", ".$_POST['id_apto'].", NOW(), ".$_SESSION['UsuID'];
    $sql_ins = "INSERT INTO ".$tabla." (".$campo.") VALUES (".$valor.")";
    $res_ins = mysql_query($sql_ins, conexion());
    if($res_ins){echo $_POST['id_apto'];}
    else{echo $sql_ins;}
}
?>