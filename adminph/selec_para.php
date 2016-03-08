<?php session_start();
require_once ("../conexion/conexion.php");
require_once ("../php/funciones.php");
$id_res = "";
$where = "";
if(isset($_GET['id_res'])){
    $id_res = $_GET['id_res'];
    $id_res_exp = explode(",", $id_res);
    if(count($id_res_exp) > 0){
      for($i = 0; $i < count($id_res_exp); $i++){
          $where .= " AND para.rmb_residente_id <> '".$id_res_exp[$i]."'";
      }  
    }
    else{
        $where .= " AND para.rmb_residente_id <> '".$id_res."'";
    }
    
}
// Campo select que se actualiza en el form de nuevo mensaje 
echo campoSelectMaster("rmb_residente para", "", "para.rmb_residente_id, a.rmb_aptos_nom, para.rmb_residente_nom, para.rmb_residente_ape", "LEFT JOIN rmb_residente_x_aptos rxa USING(rmb_residente_id) LEFT JOIN rmb_aptos a USING(rmb_aptos_id)", "WHERE (rxa.rmb_tres_id = '1' OR para.rmb_perf_id = '2') $where", "", "ORDER BY a.rmb_aptos_nom ASC");?>
<span id="new_para" class="input-group-addon" alt="Agregar destinatario para" title="Agregar destinatario para"><i class="glyphicon glyphicon-plus"></i></span>
<script>editDocumento();</script>