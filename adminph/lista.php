<?php session_start();
require_once ("../conexion/conexion.php");
require_once ("../php/funciones.php");
//////////////////////////////////////////////////////////////////////////////////////
// Aplicación PHP usando Bootstrap, jquery, HTML5 y CSS - PH                        //
// Copyright 2014 Wilson Giovanny Velandia Barreto 3204274564 - willyv78@gmail.com  //
//////////////////////////////////////////////////////////////////////////////////////
$Tabla = $_GET['tabla'];
$res_val = ColumnasTabla($Tabla);
$datos = "";
$table = "";
if($res_val){
	if(mysql_num_rows($res_val) > 0){
		$table .= "<table width='100%'><tr>";
		for($i=0; $i<mysql_num_rows($res_val); $i++){
			list($nombre[$i], $titulo[$i]) = mysql_fetch_array($res_val);
			if($Tabla == 'rmb_contac'){
				if(($nombre[$i] <> 'rmb_residente_id')&&($nombre[$i] <> 'rmb_tcont_id')&&($nombre[$i] <> 'rmb_context_id')){
					$table .= "<td class='titulo-tabla'>".$titulo[$i]."</td>";
				}
			}
			else{$table .= "<td class='titulo-tabla'>".$titulo[$i]."</td>";}			
			if($i == 0){
				$datos .= $nombre[$i];
			}
			else{
				$datos .= ",".$nombre[$i];
			}
		}
		$table .= "<td class='titulo-tabla'>Acciones</td>";
		$table .= "</tr>";
		$res_dat = DatosTabla($Tabla, $datos);
		if($res_dat){
			if(mysql_num_rows($res_dat) > 0){
				$num_dat = explode(",", $datos);
				while($row_dat = mysql_fetch_array($res_dat)){
					$table .= "<tr>";
					for($i=0; $i<count($num_dat); $i++){
						if($i == 0){$id_registro = $row_dat[$i];}
						if($Tabla == 'rmb_tcont'){
							if($num_dat[$i] == 'rmb_tcont_icono'){
								if($row_dat[$i] != ''){$src = $row_dat[$i];}
								else{$src = imagenDefault();}
								$table .= '<td class="datos-tabla" style="text-align:center;"><img id="vistaPrevia" src="'.$src.'" width="50px" height="50px"/></td>';
							}
							else{$table .= "<td class='datos-tabla'>".$row_dat[$i]."</td>";}
						}
						elseif($Tabla == 'rmb_contac'){
							if(($num_dat[$i] <> 'rmb_residente_id')&&($num_dat[$i] <> 'rmb_tcont_id')&&($num_dat[$i] <> 'rmb_context_id')){
								$table .= "<td class='datos-tabla'>".$row_dat[$i]."</td>";
							}
						}
						elseif($Tabla == 'rmb_est'){
							if($num_dat[$i] == 'rmb_est_mod'){
								$table .= "<td class='datos-tabla'>".Nombre_Registro($row_dat[$i], 'rmb_mod')."</td>";
							}
							else{$table .= "<td class='datos-tabla'>".$row_dat[$i]."</td>";}
						}
						elseif($Tabla == 'rmb_icono'){
							if($num_dat[$i] == 'rmb_icono_img'){
								if($row_dat[$i] <> ''){$src = $row_dat[$i];}
								else{$src = imagenDefault();}
								$table .= '<td class="datos-tabla" style="text-align:center;"><img id="vistaPrevia" src="'.$src.'" width="50px" height="50px" style="background-color:#288B34; padding:10px;border-radius:5px;"/></td>';
							}
							else{$table .= "<td class='datos-tabla'>".$row_dat[$i]."</td>";}
						}
						else{$table .= "<td class='datos-tabla'>".utf8_decode($row_dat[$i])."</td>";}
						
					}
					$table .= "<td class='datos-tabla'><span class='acciones' id='".$id_registro."'>Editar</span><span class='acciones' id='".$id_registro."'>Borrar</span></td>";
					$table .= "</tr>";
				}
			}
			else{$table .= "<tr><td colspan='".(count($num_dat) + 1)."'>No hay datos en la tabla</td></tr>";}
			$table .= "<tr><td colspan='".(count($num_dat) + 1)."' align='center'><span class='new_reg_m'>Nuevo Registro</span><span class='new_reg_m'>Cancelar</span></td></tr>";
		}
		echo $table;
	}
	else{
		echo "";
	}
}
else{
	echo "";
}
?>
<script type="text/javascript" src="../js/maestros.js"></script>