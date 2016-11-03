<?php 
require ("../conexion/conexion.php");
require_once ("../php/funciones.php");
//////////////////////////////////////////////////////////////////////////////////////
// Aplicación PHP usando Bootstrap, jquery, HTML5 y CSS - PH                        //
// Copyright 2014 Wilson Giovanny Velandia Barreto 3204274564 - willyv78@gmail.com  //
//////////////////////////////////////////////////////////////////////////////////////
$tabla = "";
$id = "";
$nom = "";
$deshabilitar = "";
if(isset($_GET['nom'])){
	$nom = $_GET['nom'];
}
if(isset($_GET['tabla'])){
    $tabla = $_GET['tabla'];
    if($tabla == 'rmb_depos'){
        $nom = "Depósitos";
    }
}
if(isset($_GET['id'])){
	$id = $_GET['id'];
	$sql = "SELECT * FROM $tabla WHERE ".$tabla."_id = '".$_GET['id']."'";
	$query_sql = mysql_query($sql, conexion());
	if(mysql_num_rows($query_sql)>0){$row_sql = mysql_fetch_assoc($query_sql);}
}
if(isset($_GET['ver'])){
    $deshabilitar = "disabled='disabled'";
}
$res_val = ColumnasTabla2($tabla);
$campos = "";
$requeridos = "";
$src = imagenDefault();
?>
<!-- Titulo de la pagina -->
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
   <input id="nom-tabla" type="hidden" value="<?php echo $tabla;?>">
   <input id="nom" type="hidden" value="<?php echo $_GET['nom'];?>">
   <h3 class="text-left"><?php echo $nom;?></h3>
</div>
<div class="col-xs-12 col-sm-10 col-md-10 col-lg-8 text-center" style="float:none;margin:auto;"><?php 
    if($res_val){
    	if(mysql_num_rows($res_val) > 0){		
    		$sq = 0;$sw = 0;?>
    		<form id="form_master" name="form_master" action="" method="POST" class="form-horizontal" role="form" enctype="multipart/form-data"><?php
    			while($row_val = mysql_fetch_assoc($res_val)){
    				if($row_val['COLUMN_KEY'] <> 'PRI'){
    					if($sq == 0){$campos .= $row_val['COLUMN_NAME'];}
    					else{$campos .= ",".$row_val['COLUMN_NAME'];}
    					if($row_val['IS_NULLABLE'] == 'NO'){
    						if($sw == 0){$requeridos .= $row_val['COLUMN_NAME'];}
    						else{$requeridos .= ",".$row_val['COLUMN_NAME'];}
    						$sw += 1;
    					}
    					$type = "text";
    					if((($tabla == 'rmb_residente') && (($row_val['COLUMN_NAME'] <> 'rmb_residente_pass') && ($row_val['COLUMN_NAME'] <> 'rmb_residente_nom2') && ($row_val['COLUMN_NAME'] <> 'rmb_residente_vive') && ($row_val['COLUMN_NAME'] <> 'rmb_vinculo_id') && ($row_val['COLUMN_NAME'] <> 'rmb_residente_fecha') && ($row_val['COLUMN_NAME'] <> 'rmb_residente_user') && ($row_val['COLUMN_NAME'] <> 'rmb_residente_perm') && ($row_val['COLUMN_NAME'] <> 'rmb_residente_pers'))) || (($tabla == 'rmb_proyecto') && (($row_val['COLUMN_NAME'] <> 'rmb_proyecto_fecha') && ($row_val['COLUMN_NAME'] <> 'rmb_proyecto_user'))) || (($tabla == 'rmb_contac') && (($row_val['COLUMN_NAME'] <> 'rmb_residente_id'))) || (($tabla == 'rmb_taptos') && (($row_val['COLUMN_NAME'] <> 'rmb_taptos_fecha') && ($row_val['COLUMN_NAME'] <> 'rmb_taptos_user'))) || (($tabla == 'rmb_torres') && (($row_val['COLUMN_NAME'] <> 'rmb_torres_fecha') && ($row_val['COLUMN_NAME'] <> 'rmb_torres_user') && ($row_val['COLUMN_NAME'] <> 'rmb_proyecto_id'))) || ($tabla == 'rmb_tcont') || ($tabla == 'rmb_icono') || (($tabla == 'rmb_depos') && ($row_val['COLUMN_NAME'] <> 'rmb_aptos_id')) || (($tabla == 'rmb_parq') && ($row_val['COLUMN_NAME'] <> 'rmb_aptos_id')) || ($tabla == 'rmb_est') || ($tabla == 'rmb_maestros') || ($tabla == 'rmb_tcal') || ($tabla == 'rmb_tpago') || ($tabla == 'rmb_tvulnera') || ($tabla == 'rmb_zonas') || ($tabla == 'rmb_carg') || ($tabla == 'rmb_cdoc') || ($tabla == 'rmb_cvulnera') || ($tabla == 'rmb_context') || ($tabla == 'rmb_fpago') || ($tabla == 'rmb_gen') || ($tabla == 'rmb_mod') || ($tabla == 'rmb_perf') || ($tabla == 'rmb_perm') || ($tabla == 'rmb_tbitacora') || ($tabla == 'rmb_tmascotas') || ($tabla == 'rmb_tproyecto') || ($tabla == 'rmb_tres') || ($tabla == 'rmb_tveh') || ($tabla == 'rmb_tdoc') || ($tabla == 'rmb_temp') || ($tabla == 'rmb_teq') || ($tabla == 'rmb_vinculo') || (($tabla == 'rmb_banner') && (($row_val['COLUMN_NAME'] <> 'rmb_banner_fecha') && ($row_val['COLUMN_NAME'] <> 'rmb_banner_user')))){?>
    						<div class="form-group">
    							<label for="<?php echo $row_val['COLUMN_NAME'];?>" class="col-xs-12 col-sm-5 col-md-5 col-lg-5 control-label"><?php echo $row_val['COLUMN_COMMENT'];?> : </label>
    							<div class="col-xs-12 col-sm-7 col-md-7 col-lg-7"><?php 
    								if($tabla == 'rmb_tcont'){
    									if($row_val['COLUMN_NAME'] == 'rmb_tcont_icono'){
    										$type = "file";
    										if($row_sql[$row_val['COLUMN_NAME']] != ''){
    											$src = $row_sql[$row_val['COLUMN_NAME']];
    										}?>
    										<img id="vistaPrevia" src="<?php echo $src;?>" width="230px" height="230px"/>
    										<input id="<?php echo $row_val['COLUMN_NAME'];?>" type="<?php echo $type;?>" name="<?php echo $row_val['COLUMN_NAME'];?>" class="fileimagen" value="" <?php echo $deshabilitar;?>><?php 
    									}
    									else{
    										if($row_val['COLUMN_NAME'] == 'rmb_residente_pass'){$type = "password";}?>
    										<input id="<?php echo $row_val['COLUMN_NAME'];?>" type="<?php echo $type;?>" name="<?php echo $row_val['COLUMN_NAME'];?>" class="form-control" value="<?php echo $row_sql[$row_val['COLUMN_NAME']];?>" <?php echo $deshabilitar;?>><?php 
    									}
    								}
    								elseif($tabla == 'rmb_contac'){
    									if($row_val['COLUMN_NAME'] == 'rmb_residente_id'){?>
    										<input type="hidden" name="rmb_residente_id" id="rmb_residente_id" class="form-control" value="1" <?php echo $deshabilitar;?>><?php 
    									}
    									elseif($row_val['COLUMN_NAME'] == 'rmb_tcont_id'){
    										echo TipoContacto($row_sql[$row_val['COLUMN_NAME']]);
    									}
    									elseif($row_val['COLUMN_NAME'] == 'rmb_context_id'){
    										echo TipoContextForm($row_sql[$row_val['COLUMN_NAME']]);
    									}
    									else{?>
    										<input id="<?php echo $row_val['COLUMN_NAME'];?>" type="<?php echo $type;?>" name="<?php echo $row_val['COLUMN_NAME'];?>" class="form-control" value="<?php echo $row_sql[$row_val['COLUMN_NAME']];?>" <?php echo $deshabilitar;?>><?php 
    									}
    								}
    								elseif($tabla == 'rmb_icono'){
    									if($row_val['COLUMN_NAME'] == 'rmb_icono_img'){
    										$type = "file";
    										if($row_sql[$row_val['COLUMN_NAME']] <> ''){
    											$src = $row_sql[$row_val['COLUMN_NAME']];
    										}?>
    										<img id="vistaPrevia" src="<?php echo $src;?>" width="130px" height="130px" style="background: #588430;"/>
    										<input id="<?php echo $row_val['COLUMN_NAME'];?>" type="<?php echo $type;?>" name="<?php echo $row_val['COLUMN_NAME'];?>" class="fileimagen" value="" <?php echo $deshabilitar;?>><?php 
    									}
    									else{
    										if($row_val['COLUMN_NAME'] == 'rmb_residente_pass'){$type = "password";}?>
    										<input id="<?php echo $row_val['COLUMN_NAME'];?>" type="<?php echo $type;?>" name="<?php echo $row_val['COLUMN_NAME'];?>" class="form-control" value="<?php echo $row_sql[$row_val['COLUMN_NAME']];?>" <?php echo $deshabilitar;?>><?php 
    									}
    								}
    								elseif($tabla == 'rmb_proyecto'){
    									if($row_val['COLUMN_NAME'] == 'rmb_proyecto_foto'){
    										$type = "file";
    										if($row_sql[$row_val['COLUMN_NAME']] != ''){
    											$src = $row_sql[$row_val['COLUMN_NAME']];
    										}?>
    										<img id="vistaPrevia" src="<?php echo $src;?>" width="230px" height="230px"/>
    										<input id="<?php echo $row_val['COLUMN_NAME'];?>" type="<?php echo $type;?>" name="<?php echo $row_val['COLUMN_NAME'];?>" class="fileimagen" value="" <?php echo $deshabilitar;?>><?php 
    									}
    									elseif($row_val['COLUMN_NAME'] == 'rmb_tproyecto_id'){
    										echo TipoProyecto($row_sql[$row_val['COLUMN_NAME']]);
    									}
    									elseif($row_val['COLUMN_NAME'] == 'rmb_proyecto_tdoc'){
    										echo TipoDocumento($row_sql[$row_val['COLUMN_NAME']]);
    									}
    									elseif($row_val['COLUMN_NAME'] == 'rmb_proyecto_plantilla'){?>
    										<select class="form-control" name="rmb_proyecto_plantilla" id="rmb_proyecto_plantilla" <?php echo $deshabilitar;?>>
    											<option value="" <?php if($row_sql[$row_val['COLUMN_NAME']] == ''){echo "selected";} ?>>Seleccione...</option>
    											<option value="1" <?php if($row_sql[$row_val['COLUMN_NAME']] == '1'){echo "selected";} ?>>Plantilla 1</option>
    											<option value="2" <?php if($row_sql[$row_val['COLUMN_NAME']] == '2'){echo "selected";} ?>>Plantilla 2</option>
    											<option value="3" <?php if($row_sql[$row_val['COLUMN_NAME']] == '3'){echo "selected";} ?>>Plantilla 3</option>
    										</select><?php 
    									}
    									elseif($row_val['COLUMN_NAME'] == 'rmb_proyecto_obs'){?>
    										<textarea class="form-control" name="<?php echo $row_val['COLUMN_NAME'];?>" id="<?php echo $row_val['COLUMN_NAME'];?>" rows="5" cols="10" <?php echo $deshabilitar;?>><?php echo $row_sql[$row_val['COLUMN_NAME']];?></textarea><?php 
    									}
    									elseif(($row_val['COLUMN_NAME'] <> 'rmb_proyecto_fecha') && ($row_val['COLUMN_NAME'] <> 'rmb_proyecto_user')){?>
    										<input id="<?php echo $row_val['COLUMN_NAME'];?>" type="<?php echo $type;?>" name="<?php echo $row_val['COLUMN_NAME'];?>" class="form-control" value="<?php echo $row_sql[$row_val['COLUMN_NAME']];?>" <?php echo $deshabilitar;?>><?php 
    									}
    								}
    								elseif($tabla == 'rmb_depos'){
    									if($row_val['COLUMN_NAME'] == 'rmb_zonas_id'){
    										echo campoSelect($row_sql[$row_val['COLUMN_NAME']], "rmb_zonas", $deshabilitar);
    									}
    									elseif($row_val['COLUMN_NAME'] == 'rmb_depos_obs'){?>
    										<textarea class="form-control" name="<?php echo $row_val['COLUMN_NAME'];?>" id="<?php echo $row_val['COLUMN_NAME'];?>" rows="5" cols="10" <?php echo $deshabilitar;?>><?php echo $row_sql[$row_val['COLUMN_NAME']];?></textarea><?php 
    									}
    									else{?>
    										<input id="<?php echo $row_val['COLUMN_NAME'];?>" type="<?php echo $type;?>" name="<?php echo $row_val['COLUMN_NAME'];?>" class="form-control" value="<?php echo $row_sql[$row_val['COLUMN_NAME']];?>" <?php echo $deshabilitar;?>><?php 
    									}
    								}
    								elseif($tabla == 'rmb_parq'){
    									if($row_val['COLUMN_NAME'] == 'rmb_zonas_id'){
    										echo campoSelect($row_sql[$row_val['COLUMN_NAME']], "rmb_zonas", $deshabilitar);
    									}
    									elseif($row_val['COLUMN_NAME'] == 'rmb_parq_obs'){?>
    										<textarea class="form-control" name="<?php echo $row_val['COLUMN_NAME'];?>" id="<?php echo $row_val['COLUMN_NAME'];?>" rows="5" cols="10" <?php echo $deshabilitar;?>><?php echo $row_sql[$row_val['COLUMN_NAME']];?></textarea><?php 
    									}
    									else{?>
    										<input id="<?php echo $row_val['COLUMN_NAME'];?>" type="<?php echo $type;?>" name="<?php echo $row_val['COLUMN_NAME'];?>" class="form-control" value="<?php echo $row_sql[$row_val['COLUMN_NAME']];?>" <?php echo $deshabilitar;?>><?php 
    									}
    								}
    								elseif($tabla == 'rmb_est'){
    									if($row_val['COLUMN_NAME'] == 'rmb_est_mod'){
    										echo campoSelect($row_sql[$row_val['COLUMN_NAME']], "rmb_mod", $deshabilitar);
    									}
    									else{?>
    										<input id="<?php echo $row_val['COLUMN_NAME'];?>" type="<?php echo $type;?>" name="<?php echo $row_val['COLUMN_NAME'];?>" class="form-control" value="<?php echo $row_sql[$row_val['COLUMN_NAME']];?>" <?php echo $deshabilitar;?>><?php 
    									}
    								}
    								elseif($tabla == 'rmb_maestros'){
    									if($row_val['COLUMN_NAME'] == 'rmb_maestros_tabla'){
    										echo TablasBaseDatos($row_sql[$row_val['COLUMN_NAME']]);
    									}
    									else{?>
    										<input id="<?php echo $row_val['COLUMN_NAME'];?>" type="<?php echo $type;?>" name="<?php echo $row_val['COLUMN_NAME'];?>" class="form-control" value="<?php echo $row_sql[$row_val['COLUMN_NAME']];?>" <?php echo $deshabilitar;?>><?php 
    									}
    								}
    								elseif($tabla == 'rmb_tcal'){
    									if($row_val['COLUMN_NAME'] == 'rmb_tcal_color'){?>
    										<input type="color" name="rmb_tcal_color" id="rmb_tcal_color" class="form-control" value="<?php echo $row_sql[$row_val['COLUMN_NAME']];?>" title="Seleccione un color para mostrar en el calendario" <?php echo $deshabilitar;?>><?php }
    									else{?>
    										<input id="<?php echo $row_val['COLUMN_NAME'];?>" type="<?php echo $type;?>" name="<?php echo $row_val['COLUMN_NAME'];?>" class="form-control" value="<?php echo $row_sql[$row_val['COLUMN_NAME']];?>" <?php echo $deshabilitar;?>><?php 
    									}
    								}
    								elseif($tabla == 'rmb_taptos'){
    									if(($row_val['COLUMN_NAME'] <> 'rmb_taptos_fecha') && ($row_val['COLUMN_NAME'] <> 'rmb_taptos_user')){?>
    										<input id="<?php echo $row_val['COLUMN_NAME'];?>" type="<?php echo $type;?>" name="<?php echo $row_val['COLUMN_NAME'];?>" class="form-control" value="<?php echo $row_sql[$row_val['COLUMN_NAME']];?>" <?php echo $deshabilitar;?>><?php 
    									}
    								}
    								elseif($tabla == 'rmb_tpago'){
    									if($row_val['COLUMN_NAME'] == 'rmb_tpago_ope'){?>
    										<select class="form-control" name="rmb_tpago_ope" id="rmb_tpago_ope" <?php echo $deshabilitar;?>>
    											<option value="" <?php if($row_sql[$row_val['COLUMN_NAME']] == ''){echo "selected";} ?>>Seleccione...</option>
    											<option value="1" <?php if($row_sql[$row_val['COLUMN_NAME']] == '1'){echo "selected";} ?>>Suma</option>
    											<option value="2" <?php if($row_sql[$row_val['COLUMN_NAME']] == '2'){echo "selected";} ?>>Resta</option>
    										</select><?php 
    									}
    									else{?>
    										<input id="<?php echo $row_val['COLUMN_NAME'];?>" type="<?php echo $type;?>" name="<?php echo $row_val['COLUMN_NAME'];?>" class="form-control" value="<?php echo $row_sql[$row_val['COLUMN_NAME']];?>" <?php echo $deshabilitar;?>><?php 
    									}
    								}
    								elseif($tabla == 'rmb_torres'){
    									if(($row_val['COLUMN_NAME'] <> 'rmb_torres_fecha') && ($row_val['COLUMN_NAME'] <> 'rmb_torres_user') && ($row_val['COLUMN_NAME'] <> 'rmb_proyecto_id')){?>
    										<input id="<?php echo $row_val['COLUMN_NAME'];?>" type="<?php echo $type;?>" name="<?php echo $row_val['COLUMN_NAME'];?>" class="form-control" value="<?php echo $row_sql[$row_val['COLUMN_NAME']];?>" <?php echo $deshabilitar;?>><?php 
    									}
    								}
    								elseif($tabla == 'rmb_tvulnera'){
    									if($row_val['COLUMN_NAME'] == 'rmb_cvulnera_id'){
    										echo campoSelect($row_sql[$row_val['COLUMN_NAME']], "rmb_cvulnera", $deshabilitar);
    									}
    									else{?>
    										<input id="<?php echo $row_val['COLUMN_NAME'];?>" type="<?php echo $type;?>" name="<?php echo $row_val['COLUMN_NAME'];?>" class="form-control" value="<?php echo $row_sql[$row_val['COLUMN_NAME']];?>" <?php echo $deshabilitar;?>><?php 
    									}
    								}
    								elseif($tabla == 'rmb_zonas'){
    									if($row_val['COLUMN_NAME'] == 'rmb_torres_id'){
    										echo campoSelect($row_sql[$row_val['COLUMN_NAME']], "rmb_torres", $deshabilitar);
    									}
    									else{?>
    										<input id="<?php echo $row_val['COLUMN_NAME'];?>" type="<?php echo $type;?>" name="<?php echo $row_val['COLUMN_NAME'];?>" class="form-control" value="<?php echo $row_sql[$row_val['COLUMN_NAME']];?>" <?php echo $deshabilitar;?>><?php 
    									}
    								}
    								elseif($tabla == 'rmb_residente'){
    									if($row_val['COLUMN_NAME'] == 'rmb_tdoc_id'){
    										echo campoSelect($row_sql[$row_val['COLUMN_NAME']], "rmb_tdoc", $deshabilitar);
    									}
    									elseif($row_val['COLUMN_NAME'] == 'rmb_residente_obs'){?>
    										<textarea class="form-control" name="<?php echo $row_val['COLUMN_NAME'];?>" id="<?php echo $row_val['COLUMN_NAME'];?>" rows="5" cols="10" <?php echo $deshabilitar;?>><?php echo $row_sql[$row_val['COLUMN_NAME']];?></textarea><?php 
    									}
    									elseif($row_val['COLUMN_NAME'] == 'rmb_residente_foto'){
    										$type = "file";
    										if($row_sql[$row_val['COLUMN_NAME']] != ''){
    											$src = $row_sql[$row_val['COLUMN_NAME']];
    										}?>
    										<img id="vistaPrevia" src="<?php echo $src;?>" width="230px" height="230px"/>
    										<input id="<?php echo $row_val['COLUMN_NAME'];?>" type="<?php echo $type;?>" name="<?php echo $row_val['COLUMN_NAME'];?>" class="fileimagen" value="" <?php echo $deshabilitar;?>><?php 
    									}
    									elseif($row_val['COLUMN_NAME'] == 'rmb_gen_id'){
    										echo campoSelect($row_sql[$row_val['COLUMN_NAME']], "rmb_gen", $deshabilitar);
    									}
    									elseif($row_val['COLUMN_NAME'] == 'rmb_perf_id'){
    										echo campoSelect($row_sql[$row_val['COLUMN_NAME']], "rmb_perf", $deshabilitar);
    									}
    									elseif($row_val['COLUMN_NAME'] == 'rmb_carg_id'){
    										echo campoSelect($row_sql[$row_val['COLUMN_NAME']], "rmb_carg", $deshabilitar);
    									}
    									elseif($row_val['COLUMN_NAME'] == 'rmb_est_id'){
    										echo campoSelect($row_sql[$row_val['COLUMN_NAME']], "rmb_est", $deshabilitar);
    									}
    									elseif($row_val['COLUMN_NAME'] == 'rmb_residente_hijo'){?>
    										<div class="radio">
    											<label>
    												<input type="radio" name="rmb_residente_hijo" id="rmb_residente_hijo1" value="1" checked="checked" <?php echo $deshabilitar;?>>
    												SI&nbsp;&nbsp;&nbsp;&nbsp;
    											</label>
    											<label>
    												<input type="radio" name="rmb_residente_hijo" id="rmb_residente_hijo0" value="0" checked="checked" <?php echo $deshabilitar;?>>
    												NO
    											</label>
    										</div><?php 
    									}
    									else{?>
    										<input type="hidden" name="rmb_residente_pers" id="rmb_residente_pers" class="form-control" value="1">
    										<input id="<?php echo $row_val['COLUMN_NAME'];?>" type="<?php echo $type;?>" name="<?php echo $row_val['COLUMN_NAME'];?>" class="form-control" value="<?php echo $row_sql[$row_val['COLUMN_NAME']];?>" <?php echo $deshabilitar;?>><?php 
    									}
    								}
                                    elseif($tabla == 'rmb_banner'){
                                        if($row_val['COLUMN_NAME'] == 'rmb_banner_img'){
                                            $src = "../images/banners/default.png";
                                            $type = "file";
                                            if($row_sql[$row_val['COLUMN_NAME']] != ''){
                                                $src = $row_sql[$row_val['COLUMN_NAME']];
                                            }?>
                                            <img id="vistaPrevia" src="<?php echo $src;?>" width="100%"/>
                                            <input id="<?php echo $row_val['COLUMN_NAME'];?>" type="<?php echo $type;?>" name="<?php echo $row_val['COLUMN_NAME'];?>" class="fileimagen" value="" <?php echo $deshabilitar;?>><?php 
                                        }
                                        elseif($row_val['COLUMN_NAME'] == 'rmb_banner_desc'){?>
                                            <textarea class="form-control" name="<?php echo $row_val['COLUMN_NAME'];?>" id="<?php echo $row_val['COLUMN_NAME'];?>" rows="5" cols="10" <?php echo $deshabilitar;?>><?php echo $row_sql[$row_val['COLUMN_NAME']];?></textarea><?php 
                                        }
                                        elseif($row_val['COLUMN_NAME'] == 'rmb_est_id'){
                                            echo campoSelectEst($row_sql[$row_val['COLUMN_NAME']], "rmb_est", 11, $deshabilitar);
                                        }
                                        elseif(($row_val['COLUMN_NAME'] <> 'rmb_banner_fecha') && ($row_val['COLUMN_NAME'] <> 'rmb_banner_user')){?>
                                            <input id="<?php echo $row_val['COLUMN_NAME'];?>" type="<?php echo $type;?>" name="<?php echo $row_val['COLUMN_NAME'];?>" class="form-control" value="<?php echo $row_sql[$row_val['COLUMN_NAME']];?>" <?php echo $deshabilitar;?>><?php 
                                        }
                                    }
    								else{?>
    									<input id="<?php echo $row_val['COLUMN_NAME'];?>" type="<?php echo $type;?>" name="<?php echo $row_val['COLUMN_NAME'];?>" class="form-control" value="<?php echo $row_sql[$row_val['COLUMN_NAME']];?>" <?php echo $deshabilitar;?>><?php 
    								}?>
    							</div>
    						</div><?php 
    					}
    					$sq += 1;
    				}
    			}?>
                <input id="tabla" type="hidden" name="tabla" value="<?php echo $tabla;?>">
    			<input id="id" type="hidden" name="id" value="<?php echo $id;?>">
                <input id="campos" type="hidden" name="campos" value="<?php echo $campos;?>">
                <input id="requeridos" type="hidden" name="requeridos" value="<?php echo $requeridos;?>"><?php 
                if(isset($_GET['id'])){?>
                    <input type="hidden" name="id_upd" id="id_upd" class="form-control" value="<?php echo $id;?>"><?php 
                }
                else{?>
                    <input type="hidden" name="ins" id="ins" class="form-control" value="1"><?php 
                }?>
    		</form><?php 
    	}
    	else{?>
    		<div class="form-group">
    		    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-left">
    		        <div class="widget">
    		            <div class="alert alert-warning">
    		                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    		                <strong>Atención!</strong> No se encontraron campos en la tabla maestro seleccionada.
    		            </div>
    		        </div>
    		    </div>
    		</div><?php 
    	}
    }
    else{?>
    	<div class="form-group">
    	    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-left">
    	        <div class="widget">
    	            <div class="alert alert-warning">
    	                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    	                <strong>Atención!</strong> No se encontraron campos en la tabla maestro seleccionada.
    	            </div>
    	        </div>
    	    </div>
    	</div><?php 
    }?>
	<div class="clearfix">&nbsp;</div>
	<div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center"><?php 
			if(isset($_GET['id'])){?>
    			<button id="actualizar" type="button" class="btn btn-default"><i class="glyphicon glyphicon-save"></i> Actualizar</button><?php }
			else{?>
				<button id="ingresar" type="button" class="btn btn-default"><i class="glyphicon glyphicon-save"></i> Ingresar</button><?php 
			}?>
        	<button id="cancel" type="button" class="btn btn-default"><i class="glyphicon glyphicon-arrow-left"></i> Regresar</button>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        cargaForm();
    });
</script>
