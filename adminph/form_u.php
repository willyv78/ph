<?php 
require ("../conexion/conexion.php");
require_once ("../php/funciones.php");
//////////////////////////////////////////////////////////////////////////////////////
// Aplicación PHP usando Bootstrap, jquery, HTML5 y CSS - PH                        //
// Copyright 2014 Wilson Giovanny Velandia Barreto 3204274564 - willyv78@gmail.com  //
//////////////////////////////////////////////////////////////////////////////////////
$tabla = $_GET['tabla'];
if(isset($_GET['id'])){
	$sql = "SELECT * FROM $tabla WHERE ".$tabla."_id = '".$_GET['id']."'";
	$query_sql = mysql_query($sql, conexion());
	if(mysql_num_rows($query_sql)>0){$row_sql = mysql_fetch_assoc($query_sql);}
}
$res_val = ColumnasTabla2($tabla);
$campos = "";
$requeridos = "";
?>

<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
	<form enctype="multipart/form-data" class="formulario"><?php 
		if($res_val){
			if(mysql_num_rows($res_val)>0){		
				$sq = 0;$sw = 0;
				while($row_val = mysql_fetch_assoc($res_val)){
					if($row_val['COLUMN_KEY'] != 'PRI'){
						if(($row_val['COLUMN_NAME'] != 'rmb_calendario_fecha')&&($row_val['COLUMN_NAME'] != 'rmb_calendario_user')){
							//guarda en una variable los campos del formulario
							if($sq == 0){$campos .= $row_val['COLUMN_NAME'];}
							else{$campos .= ",".$row_val['COLUMN_NAME'];}
							//guarda en una variable los campos del formulario que son requeridos
							if($row_val['IS_NULLABLE'] == 'NO'){
								if($sw == 0){$requeridos .= $row_val['COLUMN_NAME'];}
								else{$requeridos .= ",".$row_val['COLUMN_NAME'];}
								$sw += 1;
							}
							//determinar el tipo de datos que se va a pedir
							if($row_val['DATA_TYPE'] == 'int'){$type = "number";}
							elseif($row_val['DATA_TYPE'] == 'varchar'){$type = "text";}
							elseif($row_val['DATA_TYPE'] == 'date'){$type = "date";}
							elseif($row_val['DATA_TYPE'] == 'datetime'){$type = "datetime-local";}
							elseif($row_val['DATA_TYPE'] == 'blob'){$type = "file";}
							else{$type = "text";}
							?>
							<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
								<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 text-right"><?php 
									echo utf8_encode($row_val['COLUMN_COMMENT']);?> : <span id="err_pal"></span>
								</div>
								<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8"><?php 
									if($tabla == 'rmb_residente'){
										if($row_val['COLUMN_NAME'] == 'rmb_carg_id'){
											if($row_sql[$row_val['COLUMN_NAME']] != ''){$id_cargo = $row_sql[$row_val['COLUMN_NAME']];}
											else{$id_cargo = "*";}
											echo CargosResidente($id_cargo);
										}
										elseif($row_val['COLUMN_NAME'] == 'rmb_perf_id'){
											if($row_sql[$row_val['COLUMN_NAME']] != ''){$id_perfil = $row_sql[$row_val['COLUMN_NAME']];}
											else{$id_perfil = "*";}
											echo PerfilResidente($id_perfil);
										}
										elseif($row_val['COLUMN_NAME'] == 'rmb_tdoc_id'){
											if($row_sql[$row_val['COLUMN_NAME']] != ''){$id_tdoc = $row_sql[$row_val['COLUMN_NAME']];}
											else{$id_tdoc = "*";}
											echo TipoDocResidente($id_tdoc);
										}
										elseif($row_val['COLUMN_NAME'] == 'rmb_est_id'){
											if($row_sql[$row_val['COLUMN_NAME']] != ''){$id_est = $row_sql[$row_val['COLUMN_NAME']];}
											else{$id_est = "*";}
											echo EstadoResidente($id_est);
										}
										elseif($row_val['COLUMN_NAME'] == 'rmb_residente_obs'){
											echo "<textarea class='form-control' name='".$row_val['COLUMN_NAME']."' id='".$row_val['COLUMN_NAME']."' rows='5'>".$row_sql[$row_val['COLUMN_NAME']]."</textarea>";
										}
										elseif($row_val['COLUMN_NAME'] == 'rmb_residente_foto'){
											$type = "file";
											if($row_sql[$row_val['COLUMN_NAME']] != ''){
												$src = $row_sql[$row_val['COLUMN_NAME']];
											}
											else{$src = imagenDefault();}?>
											<img id="vistaPrevia" src="<?php echo $src;?>" width="230px" height="230px"/>
											<input id="<?php echo $row_val['COLUMN_NAME'];?>" type="<?php echo $type;?>" name="<?php echo $row_val['COLUMN_NAME'];?>" class="form-control fileimagen" value="" ><?php 
										}
										else{
											if($row_val['COLUMN_NAME'] == 'rmb_residente_pass'){$type = "password";}?>
											<input id="<?php echo $row_val['COLUMN_NAME'];?>" type="<?php echo $type;?>" name="<?php echo $row_val['COLUMN_NAME'];?>" class="form-control log" value="<?php echo $row_sql[$row_val['COLUMN_NAME']];?>" ><?php 
										} 
									}
									elseif($tabla == 'rmb_document'){
										if($row_val['COLUMN_NAME'] == 'rmb_cdoc_id'){
											if($row_sql[$row_val['COLUMN_NAME']] != ''){$id_est = $row_sql[$row_val['COLUMN_NAME']];}
											else{$id_est = "*";}
											echo TipoDocForm($id_est);
										}
										elseif($row_val['COLUMN_NAME'] == 'rmb_document_desc'){
											echo "<textarea class='form-control' name='".$row_val['COLUMN_NAME']."' id='".$row_val['COLUMN_NAME']."' rows='5'>".$row_sql[$row_val['COLUMN_NAME']]."</textarea>";
										}
										elseif($row_val['COLUMN_NAME'] == 'rmb_context_id'){
											if($row_sql[$row_val['COLUMN_NAME']] != ''){$id_est = $row_sql[$row_val['COLUMN_NAME']];}
											else{$id_est = "*";}
											echo TipoContextForm($id_est);
										}
										elseif($row_val['COLUMN_NAME'] == 'rmb_context_id'){
											if($row_sql[$row_val['COLUMN_NAME']] != ''){$id_context = $row_sql[$row_val['COLUMN_NAME']];}
											else{$id_context = "*";}
											echo TipoContextForm($id_context);
										}
										elseif($row_val['COLUMN_NAME'] == 'rmb_document_img'){
											$type = "file";
											if($row_sql[$row_val['COLUMN_NAME']] != ''){?>
												<a href="<?php echo $row_sql[$row_val['COLUMN_NAME']];?>" target="_blank">
													<img src="../images/descarga.png" alt="placeholder+image" width="70px" style="background-image:-webkit-linear-gradient(270deg,rgb(40,118,24) 0%,rgb(40,118,24) 100%);border-radius:100%;border:0;" title="Descargar">
												</a><?php 
											}?>
											<input id="tabla" type="hidden" name="tabla" value="<?php echo $tabla;?>" >
											<input id="<?php echo $row_val['COLUMN_NAME'];?>" type="<?php echo $type;?>" name="<?php echo $row_val['COLUMN_NAME'];?>" class="form-control filedoc" value="" ><?php 
										}
										elseif($row_val['COLUMN_NAME'] == 'rmb_est_id'){
											if($row_sql[$row_val['COLUMN_NAME']] != ''){$id_est = $row_sql[$row_val['COLUMN_NAME']];}
											else{$id_est = "*";}
											echo Estados($id_est, 4);
										}
										else{?>
											<input id="<?php echo $row_val['COLUMN_NAME'];?>" type="<?php echo $type;?>" name="<?php echo $row_val['COLUMN_NAME'];?>" class="form-control log" value="<?php echo $row_sql[$row_val['COLUMN_NAME']];?>" ><?php 
										}
									}
									elseif($tabla == 'rmb_calendario'){
										if($row_val['COLUMN_NAME'] == 'rmb_context_id'){
											if($row_sql[$row_val['COLUMN_NAME']] != ''){$id_context = $row_sql[$row_val['COLUMN_NAME']];}
											else{$id_context = "*";}
											echo TipoContextForm($id_context);
										}
										elseif($row_val['COLUMN_NAME'] == 'rmb_tcal_id'){
											if($row_sql[$row_val['COLUMN_NAME']] != ''){$id_tcal = $row_sql[$row_val['COLUMN_NAME']];}
											else{$id_tcal = "*";}
											echo TipoCalendar($id_tcal);
										}
										elseif($row_val['COLUMN_NAME'] == 'rmb_calendario_desc'){
											echo "<textarea class='form-control' name='".$row_val['COLUMN_NAME']."' id='".$row_val['COLUMN_NAME']."' rows='5'>".$row_sql[$row_val['COLUMN_NAME']]."</textarea>";
										}
										elseif($row_val['COLUMN_NAME'] == 'rmb_est_id'){
											if($row_sql[$row_val['COLUMN_NAME']] != ''){$id_est = $row_sql[$row_val['COLUMN_NAME']];}
											else{$id_est = "*";}
											echo Estados($id_est, 2);
										}
										elseif($row_val['COLUMN_NAME'] == 'rmb_calendario_img'){
											$type = "file";
											if($row_sql[$row_val['COLUMN_NAME']] != ''){
												$src = $row_sql[$row_val['COLUMN_NAME']];
											}
											else{$src = imagenDefault();}?>
											<img id="vistaPrevia" src="<?php echo $src;?>" width="230px" height="230px"/>
											<input id="<?php echo $row_val['COLUMN_NAME'];?>" type="<?php echo $type;?>" name="<?php echo $row_val['COLUMN_NAME'];?>" class="form-control fileimagen" value="" ><?php 
										}
										elseif($row_val['COLUMN_NAME'] == 'rmb_mod_id'){
											if($row_sql[$row_val['COLUMN_NAME']] != ''){$id_est = $row_sql[$row_val['COLUMN_NAME']];}
											else{$id_est = "*";}
											echo Modulos($id_est);
										}
										elseif(($row_val['COLUMN_NAME'] == 'rmb_calendario_fini')||($row_val['COLUMN_NAME'] == 'rmb_calendario_ffin')){?>
											<input id="<?php echo $row_val['COLUMN_NAME'];?>" type="text" name="<?php echo $row_val['COLUMN_NAME'];?>" class="form-control datepicker" value="<?php echo $row_sql[$row_val['COLUMN_NAME']];?>" ><?php 
										}
										else{?>
											<input id="<?php echo $row_val['COLUMN_NAME'];?>" type="<?php echo $type;?>" name="<?php echo $row_val['COLUMN_NAME'];?>" class="form-control log" value="<?php echo $row_sql[$row_val['COLUMN_NAME']];?>" ><?php 
										}
									}
									else{?>
										<input id="<?php echo $row_val['COLUMN_NAME'];?>" type="<?php echo $type;?>" name="<?php echo $row_val['COLUMN_NAME'];?>" class="form-control log" value="<?php echo $row_sql[$row_val['COLUMN_NAME']];?>" ><?php 
									}?>								
								</div>
							</div><?php 
							$sq += 1;
						}
					}
				}?>
				<input id="id" type="hidden" name="id" value="<?php echo $_GET['id'];?>" ><?php 
			}
			else{?>
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
						No se encontraron campos en la tabla maestro seleccionada
					</div>
				</div>
			<?php }
		}
		else{?>
			<tr>
				<td colspan="2" align="left">No se encontro la tabla maestro seleccionada</td>
			</tr><?php 
		}?>
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<input id="campos" type="hidden" name="campos" value="<?php echo $campos;?>" >
				<input id="requeridos" type="hidden" name="requeridos" value="<?php echo $requeridos;?>" >
				<div class="bienvenida">
					<?php 
					if(isset($_GET['id'])){
						if($tabla == 'rmb_document'){?>
							<input id="id_upd" type="hidden" name="id_upd" value="<?php echo $_GET['id'];?>" ><?php 
						}?>
						<div id="actualizar" name="actualizar" class="button_u">Actualizar Registro</div>
					<?php }
					else{
						if($tabla == 'rmb_document'){?>
							<input id="ins" type="hidden" name="ins" value="1"><?php 
						}?>
						<div id="ingresar" name="ingresar" class="button_u">Ingresar Registro</div>
					<?php }
					?>
					<div id="cancel" name="cancel" class="button_u">Cancelar</div>
				</div>			
			</div>
		</div>
	</form>
</div>
<script type="text/javascript" src="../js/maestros.js"></script>