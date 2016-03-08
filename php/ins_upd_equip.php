<?php session_start();
require_once ("../conexion/conexion.php");
require_once ("funciones.php");
$tabla = "rmb_equipos";
$path = "../images/equipos/";
if(isset($_POST['id_sup'])){
    $sql_borrar = "DELETE FROM $tabla WHERE ".$tabla."_id = ".$_POST['id_sup']."";
    $res_borrar = mysql_query($sql_borrar, conexion());
    if($res_borrar){
        $nom_id = $_POST['id_sup'];
        foreach (scandir($path) as $item) {
            if ($item == '.' || $item == '..'){continue;}
            else{
                $nom_arch = explode(".", $item);
                if($nom_arch[0] == $nom_id){unlink($path.$item);}
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
        if(($key <> 'id_upd') && ($key <> 'rmb_equipos_foto')){
            if($sq == 0){$campos .= $key."='".mysql_escape_string($value)."'";}
            else{$campos .= ", ".$key."='".mysql_escape_string($value)."'";}
            $sq += 1;
        }
    }

    //obtenemos el archivo de la foto a subir.
    $file = $_FILES['rmb_equipos_foto']['name'];
    if($file){
        $nom_id = $_POST['id_upd'];
        $extension = pathinfo($file, PATHINFO_EXTENSION);
        $nom_file = $nom_id.".".$extension;
        //comprobamos si existe un directorio para subir el archivo si no es así, lo creamos
        if(!is_dir($path)){mkdir($path, 0777);}
        //si existe el archivo lo eliminamos
        if (file_exists($path.$nom_file)) {unlink($path.$nom_file);}                         
        //comprobamos si el archivo ha subido
        if ($file && move_uploaded_file($_FILES['rmb_equipos_foto']['tmp_name'], $path.$nom_file)){              
            $campos .= ", rmb_equipos_foto = '".$path.$nom_file."'";
            $docu = "Documento cargado correctamente.\n";
        }
    }

    // Agregamos los campos fecha y user y le asignamos los valores correspondientes
    $campos .= ", rmb_equipos_fecha = NOW(), rmb_equipos_user = ".$_SESSION['UsuID'];
    // construimos el sql update con los campos enviados
    $sql_upd = "UPDATE ".$tabla." SET ".$campos." WHERE ".$tabla."_id = '".$_POST['id_upd']."';";
    // ejecutamos la consulta en la base de datos
    $res_upd = mysql_query($sql_upd, conexion());
    // si el sql se realizo correctamente hace esto
    if($res_upd){echo $_POST['id_upd'];}
}
else{
    $nex_id = NextID('rmb_admon', 'rmb_equipos');
    $sq = 0;$sw = 0;
    $campo = "";
    $valor = "";
    foreach($_POST as $key=>$value){
        if($key <> 'rmb_equipos_foto'){
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
    //obtenemos el archivo a subir
    $file = $_FILES['rmb_equipos_foto']['name'];
    if($file){
        $nom_id = $nex_id;
        $extension = pathinfo($file, PATHINFO_EXTENSION);
        $nom_file = $nom_id.".".$extension;
        //comprobamos si existe un directorio para subir el archivo si no es así, lo creamos
        if(!is_dir($path)){mkdir($path, 0777);}
        //si existe el archivo lo eliminamos
        if (file_exists($path.$nom_file)) {unlink($path.$nom_file);}                         
        //comprobamos si el archivo ha subido
        if ($file && move_uploaded_file($_FILES['rmb_equipos_foto']['tmp_name'], $path.$nom_file)){              
            $campo .= ", rmb_equipos_foto";
            $valor .= ", '".$path.$nom_file."'";
            $docu = "Documento cargado correctamente.\n";
        }
    }
    $campo .= ", rmb_equipos_fecha, rmb_equipos_user";
    $valor .= ", NOW(), ".$_SESSION['UsuID'];
    
    $sql_ins = "INSERT INTO ".$tabla." (".$campo.") VALUES (".$valor.")";
    
    $res_ins = mysql_query($sql_ins, conexion());
    // $used_id = mysql_insert_id(conexion());
    if($res_ins){echo $nex_id;}
}
?>