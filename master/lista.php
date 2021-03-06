<?php session_start();
require_once ("../conexion/conexion.php");
require_once ("../php/funciones.php");
include_once ("../php/datatable.php");
//////////////////////////////////////////////////////////////////////////////////////
// Aplicación PHP usando Bootstrap, jquery, HTML5 y CSS - PH                        //
// Copyright 2014 Wilson Giovanny Velandia Barreto 3204274564 - willyv78@gmail.com  //
//////////////////////////////////////////////////////////////////////////////////////
$Tabla = "";
$nom = "";
if(isset($_GET['tabla'])){
	$Tabla = $_GET['tabla'];
}
if(isset($_GET['nom'])){
	$nom = $_GET['nom'];
}
$res_val = ColumnasTabla($Tabla);
$datos = "";
$table_ini = "";
$table_head = "";
$table_foot = "";
$table_body = "";
$table_fin = "";?>
<!-- Titulo de la pagina -->
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
   <input id="nom-tabla" type="hidden" value="<?php echo $_GET['tabla'];?>">
   <input id="nom" type="hidden" value="<?php echo $_GET['nom'];?>">
   <h3 class="text-left"><?php echo $_GET['nom'];?></h3>
</div>
<div class="table-responsive">
<?php
if($res_val){
	if(mysql_num_rows($res_val) > 0){
		$table_ini .= "<table class='table table-hover' id='tabla'>";
        $table_head .= '<thead><tr>';
		for($i=0; $i<mysql_num_rows($res_val); $i++){
			list($nombre[$i], $titulo[$i]) = mysql_fetch_array($res_val);
			if($Tabla == 'rmb_contac'){
				if(($nombre[$i] <> 'rmb_residente_id') && ($nombre[$i] <> 'rmb_tcont_id') && ($nombre[$i] <> 'rmb_context_id')){
					$table_head .= "<th>".$titulo[$i]."</th>";
					if($i == 0){
						$datos .= $nombre[$i];
					}
					else{
						$datos .= ",".$nombre[$i];
					}
				}
			}
			elseif($Tabla == 'rmb_proyecto'){
				if(($nombre[$i] == 'rmb_proyecto_id') || ($nombre[$i] == 'rmb_proyecto_nom') || ($nombre[$i] == 'rmb_proyecto_finiadmin') || ($nombre[$i] == 'rmb_proyecto_ffinadmin') || ($nombre[$i] == 'rmb_proyecto_fdescadmin')){
					$table_head .= "<th>".$titulo[$i]."</th>";
					if($i == 0){
						$datos .= $nombre[$i];
					}
					else{
						$datos .= ",".$nombre[$i];
					}
				}
			}
			elseif($Tabla == 'rmb_depos'){
				if($nombre[$i] <> 'rmb_depos_obs'){
					$table_head .= "<th>".$titulo[$i]."</th>";
					if($i == 0){
						$datos .= $nombre[$i];
					}
					else{
						$datos .= ",".$nombre[$i];
					}
				}
			}
			elseif($Tabla == 'rmb_parq'){
				if($nombre[$i] <> 'rmb_parq_obs'){
					$table_head .= "<th>".$titulo[$i]."</th>";
					if($i == 0){
						$datos .= $nombre[$i];
					}
					else{
						$datos .= ",".$nombre[$i];
					}
				}
			}
			elseif($Tabla == 'rmb_taptos'){
				if(($nombre[$i] == 'rmb_taptos_id') || ($nombre[$i] == 'rmb_taptos_nom') || ($nombre[$i] == 'rmb_taptos_area') || ($nombre[$i] == 'rmb_taptos_priv') || ($nombre[$i] == 'rmb_taptos_coef')){
					$table_head .= "<th>".$titulo[$i]."</th>";
					if($i == 0){
						$datos .= $nombre[$i];
					}
					else{
						$datos .= ",".$nombre[$i];
					}
				}
			}
			elseif($Tabla == 'rmb_torres'){
				if(($nombre[$i] == 'rmb_torres_id') || ($nombre[$i] == 'rmb_torres_nom') || ($nombre[$i] == 'rmb_torres_nasc') || ($nombre[$i] == 'rmb_torres_nparqr') || ($nombre[$i] == 'rmb_torres_nparqv')){
					$table_head .= "<th>".$titulo[$i]."</th>";
					if($i == 0){
						$datos .= $nombre[$i];
					}
					else{
						$datos .= ",".$nombre[$i];
					}
				}
			}
			elseif($Tabla == 'rmb_residente'){
				if(($nombre[$i] == 'rmb_residente_id') || ($nombre[$i] == 'rmb_residente_nom') || ($nombre[$i] == 'rmb_residente_ape') || ($nombre[$i] == 'rmb_carg_id')){
					$table_head .= "<th>".$titulo[$i]."</th>";
					if($i == 0){
						$datos .= $nombre[$i];
					}
					else{
						$datos .= ",".$nombre[$i];
					}
				}
			}
			elseif($Tabla == 'rmb_banner'){
				if(($nombre[$i] == 'rmb_banner_id') || ($nombre[$i] == 'rmb_banner_nom') || ($nombre[$i] == 'rmb_banner_img') || ($nombre[$i] == 'rmb_est_id') || ($nombre[$i] == 'rmb_banner_ord')){
					$table_head .= "<th>".$titulo[$i]."</th>";
					if($i == 0){
						$datos .= $nombre[$i];
					}
					else{
						$datos .= ",".$nombre[$i];
					}
				}
			}
			else{
				$table_head .= "<th>".$titulo[$i]."</th>";
				if($i == 0){
					$datos .= $nombre[$i];
				}
				else{
					$datos .= ",".$nombre[$i];
				}
			}			
		}
		$table_head .= "<th><span class='btn btn-warning new-reg'>Nuevo</span><span class='btn btn-primary new-reg'>Volver</span></th>";
		$table_head .= "</tr></thead>";
		if($Tabla == 'rmb_residente'){
			$where_res = " WHERE rmb_residente_pers > 0";
			$res_dat = DatosTabla($Tabla.$where_res, $datos);
		}
		else{
			$res_dat = DatosTabla($Tabla, $datos);
		}
		
		if($res_dat){
			$num_dat = explode(",", $datos);
			if(mysql_num_rows($res_dat) > 0){
				// footer de la tabla son los campos para hacer filtros y busqueda por columna
				$table_foot .= '<tfoot style="display: table-header-group;"><tr>';
		        for($e=0; $e<count($num_dat); $e++){
		        	if($Tabla == 'rmb_proyecto'){
						if(($num_dat[$e] == 'rmb_proyecto_id') || ($num_dat[$e] == 'rmb_proyecto_nom') || ($num_dat[$e] == 'rmb_proyecto_finiadmin') || ($num_dat[$e] == 'rmb_proyecto_ffinadmin') || ($num_dat[$e] == 'rmb_proyecto_fdescadmin')){
							$table_foot .= '<th></th>';
						}
					}
		        	else{
		        		$table_foot .= '<th></th>';
		        	}
		        }
		        $table_foot .= '</tfoot>';
		        // cuerpo de la lista de registros
				$table_body .= "<tbody>";
				while($row_dat = mysql_fetch_array($res_dat)){
					$table_body .= "<tr>";
					for($i=0; $i<count($num_dat); $i++){
						if($i == 0){$id_registro = $row_dat[$i];}
						if($Tabla == 'rmb_tcont'){
							if($num_dat[$i] == 'rmb_tcont_icono'){
								if($row_dat[$i] != ''){$src = $row_dat[$i];}
								else{$src = imagenDefault();}
								$table_body .= '<td><img id="vistaPrevia" src="'.$src.'" width="50px" height="50px"/></td>';
							}
							else{$table_body .= "<td>".$row_dat[$i]."</td>";}
						}
						elseif($Tabla == 'rmb_contac'){
							if(($num_dat[$i] <> 'rmb_residente_id') && ($num_dat[$i] <> 'rmb_tcont_id') && ($num_dat[$i] <> 'rmb_context_id')){
								$table_body .= "<td>".$row_dat[$i]."</td>";
							}
						}
						elseif($Tabla == 'rmb_proyecto'){
							if(($num_dat[$i] == 'rmb_proyecto_id') || ($num_dat[$i] == 'rmb_proyecto_nom') || ($num_dat[$i] == 'rmb_proyecto_finiadmin') || ($num_dat[$i] == 'rmb_proyecto_ffinadmin') || ($num_dat[$i] == 'rmb_proyecto_fdescadmin')){
								$table_body .= "<td>".$row_dat[$i]."</td>";
							}
						}
						elseif($Tabla == 'rmb_est'){
							if($num_dat[$i] == 'rmb_est_mod'){
								$table_body .= "<td>".Nombre_Registro($row_dat[$i], 'rmb_mod')."</td>";
							}
							else{$table_body .= "<td>".$row_dat[$i]."</td>";}
						}
						elseif($Tabla == 'rmb_icono'){
							if($num_dat[$i] == 'rmb_icono_img'){
								if($row_dat[$i] <> ''){$src = $row_dat[$i];}
								else{$src = imagenDefault();}
								$table_body .= '<td><img id="vistaPrevia" src="'.$src.'" width="50px" height="50px" style="background-color:#288B34; padding:10px;border-radius:5px;"/></td>';
							}
							else{$table_body .= "<td>".$row_dat[$i]."</td>";}
						}
						elseif($Tabla == 'rmb_depos'){
							if($num_dat[$i] <> 'rmb_depos_obs'){
								if($num_dat[$i] == 'rmb_aptos_id'){
									$table_body .= "<td>".nombreCampo($row_dat[$i], "rmb_aptos")."</td>";
								}
								elseif($num_dat[$i] == 'rmb_zonas_id'){
									$table_body .= "<td>".nombreCampo($row_dat[$i], "rmb_zonas")."</td>";
								}
								else{
									$table_body .= "<td>".$row_dat[$i]."</td>";
								}
							}
						}
						elseif($Tabla == 'rmb_parq'){
							if($num_dat[$i] <> 'rmb_parq_obs'){
								if($num_dat[$i] == 'rmb_aptos_id'){
									$table_body .= "<td>".nombreCampo($row_dat[$i], "rmb_aptos")."</td>";
								}
								elseif($num_dat[$i] == 'rmb_zonas_id'){
									$table_body .= "<td>".nombreCampo($row_dat[$i], "rmb_zonas")."</td>";
								}
								else{
									$table_body .= "<td>".$row_dat[$i]."</td>";
								}
							}
						}
						elseif($Tabla == 'rmb_taptos'){
							if(($num_dat[$i] == 'rmb_taptos_id') || ($num_dat[$i] == 'rmb_taptos_nom') || ($num_dat[$i] == 'rmb_taptos_area') || ($num_dat[$i] == 'rmb_taptos_priv') || ($num_dat[$i] == 'rmb_taptos_coef')){
								$table_body .= "<td>".$row_dat[$i]."</td>";
							}
						}
						elseif($Tabla == 'rmb_tpago'){
							if($num_dat[$i] == 'rmb_tpago_ope'){
								if($row_dat[$i] == '1'){$valor_campo = "Suma";}
								else{$valor_campo = "Resta";}
								$table_body .= "<td>".$valor_campo."</td>";
							}
							else{
								$table_body .= "<td>".$row_dat[$i]."</td>";
							}
						}
						elseif($Tabla == 'rmb_torres'){
							if(($num_dat[$i] == 'rmb_torres_id') || ($num_dat[$i] == 'rmb_torres_nom') || ($num_dat[$i] == 'rmb_torres_nasc') || ($num_dat[$i] == 'rmb_torres_nparqr') || ($num_dat[$i] == 'rmb_torres_nparqv')){
								$table_body .= "<td>".$row_dat[$i]."</td>";
							}
						}
						elseif($Tabla == 'rmb_tvulnera'){
							if($num_dat[$i] == 'rmb_cvulnera_id'){
								$table_body .= "<td>".nombreCampo($row_dat[$i], "rmb_cvulnera")."</td>";
							}
							else{
								$table_body .= "<td>".$row_dat[$i]."</td>";
							}
						}
						elseif($Tabla == 'rmb_zonas'){
							if($num_dat[$i] == 'rmb_torres_id'){
								$table_body .= "<td>".nombreCampo($row_dat[$i], "rmb_torres")."</td>";
							}
							else{
								$table_body .= "<td>".$row_dat[$i]."</td>";
							}
						}
						elseif($Tabla == 'rmb_residente'){
							if($num_dat[$i] == 'rmb_carg_id'){
								$table_body .= "<td>".nombreCampo($row_dat[$i], "rmb_carg")."</td>";
							}
							else{
								$table_body .= "<td>".$row_dat[$i]."</td>";
							}
						}
						elseif($Tabla == 'rmb_banner'){
							if(($num_dat[$i] == 'rmb_banner_id') || ($num_dat[$i] == 'rmb_banner_nom') || ($num_dat[$i] == 'rmb_banner_img') || ($num_dat[$i] == 'rmb_est_id') || ($num_dat[$i] == 'rmb_banner_ord')){
								if($num_dat[$i] == 'rmb_est_id'){
									$table_body .= "<td>".nombreCampo($row_dat[$i], "rmb_est")."</td>";
								}
								else if($num_dat[$i] == 'rmb_banner_img'){
									$src = "../images/banners/default.png";
									if($row_dat[$i] != ''){$src = $row_dat[$i];}
									$table_body .= '<td><img id="vistaPrevia" src="'.$src.'" width="80px" height="50px"/></td>';
								}
								else{$table_body .= "<td>".$row_dat[$i]."</td>";}

							}
						}
						else{$table_body .= "<td>".utf8_decode($row_dat[$i])."</td>";}
						
					}
					$table_body .= "<td><span class='acciones' id='".$id_registro."'>Editar</span><span class='acciones' id='".$id_registro."'>Borrar</span></td>";
					$table_body .= "</tr>";
				}
			}
			else{$table_body .= "<tr><td colspan='".(count($num_dat) + 1)."'>No hay datos en la tabla</td></tr>";}
		}
		$table_body .= "</tbody>";
		$table_fin .= "</table>";
		echo $table_ini.$table_foot.$table_head.$table_body.$table_fin;
	}
	else{
		echo "";
	}
}
else{
	echo "";
}
?>
</div>
<script>cargaLista();</script>