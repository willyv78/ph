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
<table width="100%" aling="center">
<?php if($res_val){
	if(mysql_num_rows($res_val)>0){		
		$sq = 0;$sw = 0;
		while($row_val = mysql_fetch_assoc($res_val)){
			if($row_val['COLUMN_KEY'] != 'PRI'){
				if($sq == 0){$campos .= $row_val['COLUMN_NAME'];}
				else{$campos .= ",".$row_val['COLUMN_NAME'];}
				if($row_val['IS_NULLABLE'] == 'NO'){
					if($sw == 0){$requeridos .= $row_val['COLUMN_NAME'];}
					else{$requeridos .= ",".$row_val['COLUMN_NAME'];}
					$sw += 1;
				}
				?>
				<tr>
					<td width="40%" align="right"><?php echo $row_val['COLUMN_COMMENT'];?> : </td>
					<td width="60%"><?php 
						if($tabla == 'rmb_tcont'){
							if($row_val['COLUMN_NAME'] == 'rmb_tcont_icono'){
								$type = "file";
								if($row_sql[$row_val['COLUMN_NAME']] != ''){
									$src = $row_sql[$row_val['COLUMN_NAME']];
								}
								else{

									$src = imagenDefault();
								}?>
								<img id="vistaPrevia" src="<?php echo $src;?>" width="230px" height="230px"/>
								<input id="<?php echo $row_val['COLUMN_NAME'];?>" type="<?php echo $type;?>" name="<?php echo $row_val['COLUMN_NAME'];?>" class="fileimagen" value="" ><?php 
							}
							else{
								if($row_val['COLUMN_NAME'] == 'rmb_residente_pass'){$type = "password";}?>
								<input id="<?php echo $row_val['COLUMN_NAME'];?>" type="<?php echo $type;?>" name="<?php echo $row_val['COLUMN_NAME'];?>" class="log" value="<?php echo $row_sql[$row_val['COLUMN_NAME']];?>" ><?php 
							}
						}
						elseif($tabla == 'rmb_contac'){
							if($row_val['COLUMN_NAME'] == 'rmb_residente_id'){
								echo UserRegistrados($row_sql[$row_val['COLUMN_NAME']]);
							}
							elseif($row_val['COLUMN_NAME'] == 'rmb_tcont_id'){
								echo TipoContacto($row_sql[$row_val['COLUMN_NAME']]);
							}
							elseif($row_val['COLUMN_NAME'] == 'rmb_context_id'){
								echo TipoContextForm($row_sql[$row_val['COLUMN_NAME']]);
							}
							else{?>
								<input id="<?php echo $row_val['COLUMN_NAME'];?>" type="<?php echo $type;?>" name="<?php echo $row_val['COLUMN_NAME'];?>" class="log" value="<?php echo $row_sql[$row_val['COLUMN_NAME']];?>" ><?php 
							}
						}
						elseif($tabla == 'rmb_icono'){
							if($row_val['COLUMN_NAME'] == 'rmb_icono_img'){
								$type = "file";
								if($row_sql[$row_val['COLUMN_NAME']] <> ''){
									$src = $row_sql[$row_val['COLUMN_NAME']];
								}
								else{

									$src = imagenDefault();
								}?>
								<img id="vistaPrevia" src="<?php echo $src;?>" width="130px" height="130px"/>
								<input id="<?php echo $row_val['COLUMN_NAME'];?>" type="<?php echo $type;?>" name="<?php echo $row_val['COLUMN_NAME'];?>" class="fileimagen" value="" ><?php 
							}
							else{
								if($row_val['COLUMN_NAME'] == 'rmb_residente_pass'){$type = "password";}?>
								<input id="<?php echo $row_val['COLUMN_NAME'];?>" type="<?php echo $type;?>" name="<?php echo $row_val['COLUMN_NAME'];?>" class="log" value="<?php echo $row_sql[$row_val['COLUMN_NAME']];?>" ><?php 
							}
						}
						else{?>
							<input id="<?php echo $row_val['COLUMN_NAME'];?>" type="<?php echo $type;?>" name="<?php echo $row_val['COLUMN_NAME'];?>" class="log" value="<?php echo $row_sql[$row_val['COLUMN_NAME']];?>" ><?php 
						}?>
					</td>
				</tr><?php 
				$sq += 1;
			}
		}?>
			<input id="id" type="hidden" name="id" value="<?php echo $_GET['id'];?>" ><?php 
	}
	else{?>
		<tr>
			<td colspan="2" align="left">No se encontraron campos en la tabla maestro seleccionada</td>
		</tr>
	<?php }
}
else{?>
	<tr>
		<td colspan="2" align="left">No se encontro la tabla maestro seleccionada</td>
	</tr>
<?php }?>
	<tr>
		<td colspan="2" align="center">
			<input id="campos" type="hidden" name="campos" value="<?php echo $campos;?>" >
			<input id="requeridos" type="hidden" name="requeridos" value="<?php echo $requeridos;?>" >
			<div class="bienvenida">
				<?php 
				if(isset($_GET['id'])){?>
					<div id="actualizar" name="actualizar" class="button">Actualizar Registro</div>
				<?php }
				else{?>
					<div id="ingresar" name="ingresar" class="button">Ingresar Registro</div>
				<?php }
				?>
				<div id="cancel" name="cancel" class="button">Cancelar</div>
			</div>			
		</td>
	</tr>
</table>
<script type="text/javascript" src="../js/maestros.js"></script>